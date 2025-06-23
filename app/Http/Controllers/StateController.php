<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('state.view');
        $states = State::query();
        if (request('keyword')) {
            $states = $states->where('name', 'like', '%' . request('keyword') . '%');
        }
        if (request('order_by')) {
            $states = $states->orderBy('id', request('order_by'));
        }

        if (request('par-page')) {
            $states = $states->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $states = $states->paginate(20);
        }


        $states->appends(request()->query());
        return view('admin.pages.locations.states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('state.create');
        return view('admin.pages.locations.states.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        checkAdminHasPermissionAndThrowException('state.store');
        $request->validate([
            'name' => 'required|unique:states,name',

        ], [
            'name.required' => 'Name is Required',
            'name.unique' => 'Name is Already Exists',
        ]);

        $state = new State();
        $state->name = trim($request->name);
        $state->save();

        $notification = __('Created Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.state.edit', $state->id)->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        checkAdminHasPermissionAndThrowException('state.edit');

        $state = State::find($id);
        if (!$state) {
            $notification = __('State Not Found');
            $notification = array('message' => $notification, 'alert-type' => 'error');
            return redirect()->route('admin.state.index')->with($notification);
        }
        return view('admin.pages.locations.states.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('state.update');
        $state = State::find($id);
        if (!$state) {
            $notification = __('State Not Found');
            $notification = array('message' => $notification, 'alert-type' => 'error');
            return redirect()->route('admin.state.index')->with($notification);
        }
        $request->validate([
            'name' => 'required|unique:states,name,' . $id,
        ], [
            'name.required' => 'Name is Required',
            'name.unique' => 'Name is Already Exists',
        ]);

        $state->name = trim($request->name);
        $state->save();

        $notification = __('Updated Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.state.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('state.delete');

        $state = State::find($id);
        if (!$state) {
            $notification = __('State Not Found');
            $notification = array('message' => $notification, 'alert-type' => 'error');
            return redirect()->route('admin.state.index')->with($notification);
        } else {
            $state->delete();
            $notification = __('Delete Successfully');
            $notification = array('message' => $notification, 'alert-type' => 'success');
            return redirect()->route('admin.state.index')->with($notification);
        }
    }
}
