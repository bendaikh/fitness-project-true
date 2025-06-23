<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\WorkoutContact;
use App\Rules\CustomRecaptcha;
use App\Services\WorkoutService;
use App\Traits\MailSenderTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\GlobalSetting\app\Models\CustomPagination;

class WorkoutController extends Controller
{
    use MailSenderTrait;
    public function __construct(private WorkoutService $workoutService) {}
    public function index()
    {
        $paginate = CustomPagination::where('section_name', 'Workout List')->first();
        $workouts = $this->workoutService->getActiveWorkouts();
        if (request()->search) {
            $workouts = $workouts->whereHas('translation', function ($q) {
                $q->where('name', 'like', '%' . request()->search . '%');
            });
        }
        $workouts = $workouts->paginate($paginate->item_qty);
        return view('website.pages.workout.index', compact('workouts'));
    }

    public function details(string $slug)
    {
        $workout = $this->workoutService->getWorkoutBySlug($slug);

        if (!$workout) {
            return to_route('website.404');
        }
        $already_enrolled = false;

        if (auth()->user()) {
            $already_enrolled = auth()->user()->workouts->contains($workout->id);
        }

        // add to session
        $data['id'] = $workout->id;
        $data['name'] = $workout->name;
        $data['slug'] = $workout->slug;
        $data['image'] = $workout->image;
        $data['price'] = $workout->price;
        $data['qty'] = 1;
        $data['tax'] = 0;
        $data['sub_total'] = $data['price'];

        session()->put('cart_workout', [$data]);

        return view('website.pages.workout.details', compact('workout', 'already_enrolled'));
    }


    function contact(Request $request)
    {
        $setting = Cache::get('setting');
        $this->validate($request, [
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => $setting->recaptcha_status == 'active' ? ['required', new CustomRecaptcha()] : '',
        ]);
        $data = $request->except('_token');
        $data['status'] = 0;
        $contact = WorkoutContact::create($data);

        $this->sendContactMessageMailFromTrait($contact);
        if ($contact) {
            return response()->json(['status' => 200, 'message' => 'Message Send successfully']);
        } else {
            return response()->json(['status' => 400, 'message' => 'Something went wrong']);
        }
    }
}
