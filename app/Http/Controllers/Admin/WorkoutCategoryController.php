<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkoutRequest;
use App\Services\WorkoutCategoryService;

class WorkoutCategoryController extends Controller
{
    private $workoutCategoryService;
    public function __construct(WorkoutCategoryService $workoutCategoryService)
    {
        $this->middleware('auth:admin');
        $this->workoutCategoryService = $workoutCategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workoutCategories = $this->workoutCategoryService->getAllWorkoutCategories();
        return view('admin.workoutCategories.index', compact('workoutCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkoutRequest $request)
    {
        $this->workoutCategoryService->createWorkoutCategory($request->all());
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
    public function update(WorkoutRequest $request, string $id)
    {
        $category = $this->workoutCategoryService->getWorkoutCategoryById($id);
        $this->workoutCategoryService->updateWorkoutCategory($category, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->workoutCategoryService->getWorkoutCategoryById($id);
        $this->workoutCategoryService->deleteWorkoutCategory($category);
    }
}
