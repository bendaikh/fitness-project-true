<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Services\ActivityService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ActivityController extends Controller
{
    use RedirectHelperTrait;
    protected $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('activity.view');
        $activities = $this->activityService->getAllActivities();

        if (request('keyword')) {
            $activities = $activities->whereHas('translations', function ($query) {
                $query->where('name', 'like', '%' . request('keyword') . '%');
            });
        }
        if (request('order_by')) {
            $activities = $activities->orderBy('id', request('order_by'));
        }
        if (request('par-page')) {

            $activities =  $activities->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $activities =  $activities->paginate(20);
        }

        $activities->appends(request()->query());
        return view('admin.pages.workout.activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('activity.create');
        return view('admin.pages.workout.activity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        checkAdminHasPermissionAndThrowException('activity.store');
        $request->validate([
            'name' => [
                'required',
                Rule::unique('activity_translations')->where('lang_code', getSessionLanguage()),
            ],
        ]);

        $activity = $this->activityService->createActivity($request);
        try {
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.activity.edit', ['activity' => $activity->id, 'code' => getSessionLanguage()]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.activity.index');
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
        checkAdminHasPermissionAndThrowException('activity.edit');
        $activity = $this->activityService->getActivity($id);
        return view('admin.pages.workout.activity.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('activity.update');
        $request->validate([
            'name' => [
                'required',
                Rule::unique('activity_translations')->ignore($id, 'activity_id')->where('lang_code', getSessionLanguage()),
            ],
        ]);

        $this->activityService->updateActivity($request, $id);
        try {
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.activity.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.activity.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('activity.delete');
        try {
            $this->activityService->getActivity($id)->delete();
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.activity.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.activity.index');
        }
    }
}
