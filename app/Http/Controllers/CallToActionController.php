<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class CallToActionController extends Controller
{
    use GenerateTranslationTrait, RedirectHelperTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $counters = Counter::where('home', '2')->get();
        return view('admin.pages.call-to-action.index', compact('counters'));
    }

    public function create()
    {
        $counters = Counter::where('home', '2')->get();
        if ($counters->count() < 4) {
            return view('admin.pages.call-to-action.create');
        } else {
            return back()->with(['message' => 'You Can\'t Add more', 'alert-type' => 'warning']);
        }
    }


    public function store(Request $request)
    {
        $counters = Counter::where('home', '2')->get();

        if ($counters > 4) {
            return back()->with(['message' => 'You Can\'t Add more', 'alert-type' => 'warning']);
        }

        $rules = [
            'title' => 'required',
            'icon' => 'required|image',
            'status' => 'required'
        ];
        $customMessages = [
            'title.required' => __('Title is required'),
            'title.unique' => __('Title already exist'),
            'icon.required' => __('Icon is required'),
            'icon.image' => __('Icon must be an image'),
        ];
        $this->validate($request, $rules, $customMessages);

        $counter = new Counter();
        $counter->status = $request->status;
        $counter->home = $request->home;
        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $imageName = file_upload($image, null, 'uploads/custom-images/counter/');
            $counter->icon = $imageName;
        }
        $counter->save();


        $this->generateTranslations(
            TranslationModels::Counter,
            $counter,
            'counter_id',
            $request,
        );

        $notification = __('Created Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.call-to-action.index')->with($notification);
    }


    public function edit($id)
    {
        $counter = Counter::find($id);
        return view('admin.pages.call-to-action.edit', compact('counter'));
    }


    public function update(Request $request, $id)
    {
        $counter = Counter::find($id);
        $rules = [
            'title' => 'required',
            'icon' => 'image',
            'status' => 'required'
        ];

        if ($request->code == allLanguages()->first()->code) {
            $rules = [
                'title' => 'required',
                'icon' => 'image',
                'status' => 'required'
            ];
        } else {
            $rules = [
                'title' => 'required',
            ];
        }

        $customMessages = [
            'title.required' => __('Title is required'),
            'title.unique' => __('Title already exist'),
            'number.required' => __('Number is required'),
            'icon.image' => __('Icon must be an image'),
        ];
        $this->validate($request, $rules, $customMessages);

        $data = $request->only('title', 'status');
        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $imageName = file_upload($image, null, 'uploads/custom-images/counter/');
            $data['icon'] = $imageName;
        }
        $counter->update($data);

        $this->updateTranslations(
            $counter,
            $request,
            $request->only('title'),
        );

        $notification = __('Update Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.call-to-action.index')->with($notification);
    }


    public function destroy($id)
    {
        $counter = Counter::find($id);

        if ($counter->icon && file_exists($counter->icon)) unlink($counter->icon);
        $counter->delete();

        $notification = __('Delete Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.call-to-action.index')->with($notification);
    }

    public function changeStatus($id)
    {
        $counter = Counter::find($id);
        if ($counter->status == 1) {
            $counter->status = 0;
            $counter->save();
            $message = __('Inactive Successfully');
        } else {
            $counter->status = 1;
            $counter->save();
            $message = __('Active Successfully');
        }
        return response()->json($message);
    }
}
