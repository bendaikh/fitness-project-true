<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Services\LocationService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    private $locationService;
    public function __construct(LocationService $locationService)
    {
        $this->middleware('auth:admin');
        $this->locationService = $locationService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = $this->locationService->getAllLocations();
        return view('admin.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        $this->locationService->createLocation($request->validated());
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $location = $this->locationService->getLocationById($id);
        $this->locationService->updateLocation($location, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = $this->locationService->getLocationById($id);
        $this->locationService->deleteLocation($location);
    }
}
