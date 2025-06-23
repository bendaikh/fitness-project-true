<?php

namespace App\Http\Controllers;

use App\Enums\RedirectType;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;

class CityController extends Controller
{
    use RedirectHelperTrait;
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        checkAdminHasPermissionAndThrowException('city.view');
        $cities = City::query();
        $cities = $cities->with(['state']);
        if (request('keyword')) {
            $cities = $cities->where('name', 'like', '%' . request('keyword') . '%');
        }
        if (request('order_by')) {
            $cities = $cities->orderBy('id', request('order_by'));
        }

        if (request('par-page')) {
            $cities = $cities->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $cities = $cities->paginate(20);
        }
        $cities->appends(request()->query());

        return view('admin.pages.locations.cities.index', compact('cities'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('city.create');

        $states = State::all();

        return view('admin.pages.locations.cities.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        checkAdminHasPermissionAndThrowException('city.store');
        $request->validate([
            'name' => 'required|unique:cities,name',
            "state_id" => "required",
        ], [
            'name.required' => 'Name is Required',
            'name.unique' => 'Name is Already Exists',
            'state_id.required' => 'State is Required',
        ]);

        $city = new City();
        $city->name = trim($request->name);
        $city->state_id = $request->state_id;
        $city->save();

        $notification = __('Created Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.city.edit', ['city' => $city->id], $notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        checkAdminHasPermissionAndThrowException('city.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        checkAdminHasPermissionAndThrowException('city.edit');
        $city = City::find($id);
        $states = State::all();

        if (!$city) {
            $notification = __('city Not Found');
            $notification = array('message' => $notification, 'alert-type' => 'error');
            return redirect()->route('admin.city.index')->with($notification);
        }
        return view('admin.pages.locations.cities.edit', compact('city', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('city.update');
        $city = City::find($id);
        if (!$city) {
            $notification = __('city Not Found');
            $notification = array('message' => $notification, 'alert-type' => 'error');
            return redirect()->route('admin.city.index')->with($notification);
        }
        $request->validate([
            'name' => 'required|unique:cities,name,' . $id,
            "state_id" => "required",
        ], [
            'name.required' => 'Name is Required',
            'name.unique' => 'Name is Already Exists',
            'state_id.required' => 'Country is Required',
        ]);

        $city->name = trim($request->name);
        $city->state_id = $request->state_id;
        $city->save();

        $notification = __('Updated Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.city.index')->with($notification);
        return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.city.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('city.delete');
        $city = City::find($id);
        if (!$city) {
            $notification = __('City Not Found');
            $notification = array('message' => $notification, 'alert-type' => 'error');
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.city.index');
        } else {
            $city->delete();
            $notification = __('Delete Successfully');
            $notification = array('message' => $notification, 'alert-type' => 'success');
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.city.index');
        }
    }
    /**
     * Get all resources By State Id from storage.
     */
    public function getAllCitiesByState(string $id)
    {
        $cities = State::find($id)->cities;
        if ($cities->count() > 0) {
            return ['status' => 200, 'data' => $cities];
        } else {
            return ['status' => 404, 'message' => 'States Not Found', 'data' => []];
        }
    }
}
