<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\SectionContent;
use App\Services\PageUtilityService;
use App\Services\TrainerService;
use App\Services\WorkoutService;
use Illuminate\Http\Request;
use Modules\GlobalSetting\app\Models\CustomPagination;
use Modules\Testimonial\app\Models\Testimonial;

class TrainerController extends Controller
{
    public function __construct(private TrainerService $trainerService) {}
    public function index()
    {
        $paginate = CustomPagination::where('section_name', 'Trainer List')->first();
        $trainers = $this->trainerService->activeTrainers()->paginate($paginate->item_qty);
        return view('website.pages.trainer.index', compact('trainers'));
    }

    public function details(string $slug, PageUtilityService $pageUtility)
    {
        $trainer = $this->trainerService->getTrainerBySlug($slug);
        if (!$trainer) {
            return to_route('website.404');
        }
        $testimonials = Testimonial::with('translation')->get();

        $workouts = $trainer->workouts;
        $content = SectionContent::first();
        $pageUtility = $pageUtility->getPageUtility();
        return view('website.pages.trainer.details', compact('trainer', 'testimonials', 'workouts', 'content', 'pageUtility'));
    }
}
