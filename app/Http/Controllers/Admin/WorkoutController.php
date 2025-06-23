<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkoutRequest;
use App\Services\WorkoutService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WorkoutController extends Controller
{
    use RedirectHelperTrait;
    private $workoutService;
    public function __construct(WorkoutService $workoutService)
    {
        $this->middleware('auth:admin');
        $this->workoutService = $workoutService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('workout.view');
        $workouts = $this->workoutService->getWorkouts();
        if (request('par-page')) {
            $workouts =  $workouts->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $workouts =  $workouts->paginate(20);
        }

        $workouts->appends(request()->query());
        return view('admin.pages.workout.index', compact('workouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('workout.create');
        $categories = $this->workoutService->getWorkoutCategories();
        $tools = $this->workoutService->getTools();
        return view('admin.pages.workout.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkoutRequest $request)
    {
        checkAdminHasPermissionAndThrowException('workout.store');
        try {
            $workout = $this->workoutService->createWorkout($request);
            if ($workout) {
                return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.workout.edit', ['workout' => $workout->id], ['message' => 'Workout Created Successfully', 'alert-type' => 'success']);
            } else {
                return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.workout.create', [], ['message' => 'Workout Not Created', 'alert-type' => 'danger']);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.workout.create', [], ['message' => 'Workout Not Created', 'alert-type' => 'danger']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        checkAdminHasPermissionAndThrowException('workout.view');
        $workout = $this->workoutService->getWorkout($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        checkAdminHasPermissionAndThrowException('workout.edit');
        $workout = $this->workoutService->getWorkout($id);
        return view('admin.pages.workout.edit', compact('workout'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkoutRequest $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('workout.update');
        try {
            $workout = $this->workoutService->updateWorkout($request, $id);
            if ($workout) {
                return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.workout.index');
            } else {
                return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.workout.edit', ['workout' => $id, 'code' => getSessionLanguage()]);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.workout.edit', ['workout' => $id, 'code' => getSessionLanguage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        checkAdminHasPermissionAndThrowException('workout.delete');
        try {
            $workout = $this->workoutService->deleteWorkout($id);
            if ($workout) {
                return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.workout.index');
            } else {
                return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.workout.index');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function status(string $id)
    {
        checkAdminHasPermissionAndThrowException('workout.update');
        try {
            $workout = $this->workoutService->changeStatus($id);
            if ($workout) {
                return [
                    'success' => true,
                    'message' => 'Status changed successfully'
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Status not changed'
                ];
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function deleteEnrollment($id)
    {
        checkAdminHasPermissionAndThrowException('workout.delete');
        $enrollment = $this->workoutService->deleteEnrollment($id);
        if ($enrollment) {
            return redirect()->back()->with([
                'alert-type' => 'success',
                'message' => 'Enrollment deleted successfully'
            ]);
        } else {
            return redirect()->back()->with([
                'alert-type' => 'danger',
                'message' => 'Enrollment not deleted'
            ]);
        }
    }

    public function updateEnrollmentStatus(Request $request, $id)
    {
        checkAdminHasPermissionAndThrowException('workout.update');
        $request->validate([
            'payment_status' => 'required'
        ]);
        $enrollment = $this->workoutService->updateEnrollmentStatus($request->payment_status, $id);
        if ($enrollment) {
            return redirect()->back()->with([
                'alert-type' => 'success',
                'message' => 'Enrollment updated successfully'
            ]);
        } else {
            return redirect()->back()->with([
                'alert-type' => 'danger',
                'message' => 'Enrollment not updated'
            ]);
        }
    }

    public function workoutHistory()
    {
        checkAdminHasPermissionAndThrowException('workout.view');
        $workoutHistories = $this->workoutService->getWorkoutHistories();
        $workouts = $this->workoutService->getActiveWorkouts()->get();
        return view('admin.pages.workout.history', compact('workoutHistories', 'workouts'));
    }

    public function messages()
    {
        checkAdminHasPermissionAndThrowException('workout.view');
        $messages = $this->workoutService->getMessages();
        return view('admin.pages.workout.messages', compact('messages'));
    }

    public function deleteMessage($id)
    {
        checkAdminHasPermissionAndThrowException('workout.delete');
        $message = $this->workoutService->deleteMessage($id);
        if ($message) {
            return redirect()->back()->with([
                'alert-type' => 'success',
                'message' => 'Message deleted successfully'
            ]);
        } else {
            return redirect()->back()->with([
                'alert-type' => 'danger',
                'message' => 'Message not deleted'
            ]);
        }
    }
}
