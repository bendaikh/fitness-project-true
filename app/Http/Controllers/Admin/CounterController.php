<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\Setting;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class CounterController extends Controller
{
    use GenerateTranslationTrait, RedirectHelperTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $counters = Counter::where('home', '1')->get();
        return view('admin.pages.counter.index', compact('counters'));
    }

    public function create()
    {
        return view('admin.pages.counter.create');
    }


    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'number' => 'required',
            'status' => 'required'
        ];
        $customMessages = [
            'title.required' => __('Title is required'),
            'title.unique' => __('Title already exist'),
            'number.required' => __('Number is required'),
        ];
        $this->validate($request, $rules, $customMessages);

        $counter = new Counter();
        $counter->number = $request->number;
        $counter->home = $request->home;
        $counter->status = $request->status;
        $counter->save();


        $this->generateTranslations(
            TranslationModels::Counter,
            $counter,
            'counter_id',
            $request,
        );

        $notification = __('Created Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.counter.edit', $counter->id)->with($notification);
    }


    public function edit($id)
    {
        $counter = Counter::find($id);
        return view('admin.pages.counter.edit', compact('counter'));
    }


    public function update(Request $request, $id)
    {
        $counter = Counter::find($id);

        if ($request->code == allLanguages()->first()->code) {
            $rules = [
                'title' => 'required',
                'number' => 'required',
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
        ];
        $this->validate($request, $rules, $customMessages);

        $data = $request->only('title', 'number', 'status');
        $counter->update($data);


        $this->updateTranslations(
            $counter,
            $request,
            $request->only('title'),
        );

        $notification = __('Update Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.counter.index')->with($notification);
    }


    public function destroy($id)
    {
        $counter = Counter::find($id);
        $counter->delete();

        $notification = __('Delete Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.counter.index')->with($notification);
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
