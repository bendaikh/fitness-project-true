<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkoutClassRequest;
use App\Services\ActivityService;
use App\Services\ClassService;
use App\Services\TrainerService;
use App\Services\WorkoutService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WorkoutClassController extends Controller
{
    use RedirectHelperTrait;

    protected $classService;
    public function __construct(ClassService $classService, private TrainerService $trainers, private ActivityService $activities, private WorkoutService $workouts)
    {
        $this->middleware('auth:admin');
        $this->classService = $classService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('class.view');
        $classes = $this->classService->allClasses();

        if (request('par-page')) {
            $classes =  $classes->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $classes =  $classes->paginate(20);
        }


        $classes->appends(request()->query());
        return view('admin.pages.workout.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('class.create');
        $trainers = $this->trainers->activeTrainers()->get();
        $activities = $this->activities->getAllActivities()->get();
        $workouts = $this->workouts->getActiveWorkouts()->get();
        return view('admin.pages.workout.classes.create', compact('trainers', 'activities', 'workouts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkoutClassRequest $request)
    {
        checkAdminHasPermissionAndThrowException('class.store');
        DB::beginTransaction();
        try {
            $class = $this->classService->createClass($request);
            DB::commit();
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.class.edit', ['class' => $class->id], ['message' => 'Class created successfully', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollback();
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.class.index', [], ['message' => 'Class creation failed', 'alert-type' => 'error']);
        }
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
        checkAdminHasPermissionAndThrowException('class.edit');
        $class = $this->classService->getClassById($id);

        $trainers = $this->trainers->activeTrainers()->get();
        $activities = $this->activities->getAllActivities()->get();
        $workouts = $this->workouts->getActiveWorkouts()->get();

        $classActivities = $class->activities->pluck('id')->toArray();
        $classTrainers = $class->trainers->pluck('id')->toArray();
        return view('admin.pages.workout.classes.edit', compact('trainers', 'activities', 'workouts', 'class', 'classActivities', 'classTrainers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkoutClassRequest $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('class.update');
        DB::beginTransaction();
        try {
            $this->classService->updateClass($request, $id);
            DB::commit();
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.class.index', [], ['message' => 'Class updated successfully', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollback();
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.class.index', [], ['message' => 'Class update failed', 'alert-type' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('class.delete');
        DB::beginTransaction();
        try {
            $this->classService->deleteClass($id);
            DB::commit();
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.class.index', [], ['message' => 'Class deleted successfully', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollback();
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.class.index', [], ['message' => 'Class deletion failed', 'alert-type' => 'error']);
        }
    }

    public function status($id)
    {
        checkAdminHasPermissionAndThrowException('class.update');
        $class = $this->classService->getClassById($id);
        $status = $class->status == 1 ? 0 : 1;
        $class->status = $status;
        $class->save();
        return response()->json([
            'message' => 'Class status updated successfully',
            'success' => true,
        ]);
    }
}
