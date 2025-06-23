<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\WorkoutContact;
use App\Services\GymServiceService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GymServiceController extends Controller
{
    use RedirectHelperTrait;
    private GymServiceService $gymServiceService;
    public function __construct(GymServiceService $gymServiceService)
    {
        $this->gymServiceService = $gymServiceService;
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('service.view');
        $services = $this->gymServiceService->getGymServices();
        return view('admin.pages.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('service.create');
        return view('admin.pages.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        checkAdminHasPermissionAndThrowException('service.store');
        DB::beginTransaction(); // Start transaction!
        try {
            $gymService = $this->gymServiceService->createGymService($request);
            DB::commit(); // Commit transaction!

            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.service.edit', ['service' => $gymService->id, 'code' => getSessionLanguage()], [
                'message' => 'Service created successfully',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack(); // Rollback transaction!

            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.service.index', [], [
                'message' => 'Service creation failed',
                'alert-type' => 'error'
            ]);
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
        checkAdminHasPermissionAndThrowException('service.edit');
        $service = $this->gymServiceService->getGymService($id);
        return view('admin.pages.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('service.update');
        DB::beginTransaction(); // Start transaction!
        $this->gymServiceService->updateGymService($request, $id);
        try {
            DB::commit(); // Commit transaction!

            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.service.index', [], [
                'message' => 'Service updated successfully',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack(); // Rollback transaction!

            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.service.index', [], [
                'message' => 'Service update failed',
                'alert-type' => 'error'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('service.delete');
        DB::beginTransaction(); // Start transaction!
        try {
            $this->gymServiceService->deleteGymService($id);
            DB::commit(); // Commit transaction!

            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.service.index', [], [
                'message' => 'Service deleted successfully',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack(); // Rollback transaction!

            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.service.index', [], [
                'message' => 'Service deletion failed',
                'alert-type' => 'error'
            ]);
        }
    }

    public function statusUpdate(string $id)
    {
        checkAdminHasPermissionAndThrowException('service.update');
        DB::beginTransaction(); // Start transaction!
        try {
            $this->gymServiceService->statusUpdate($id);
            DB::commit(); // Commit transaction!

            if (request()->ajax()) {
                return response()->json(['message' => 'Service status updated successfully', 'success' => true]);
            }
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.service.index', [], [
                'message' => 'Service status updated successfully',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack(); // Rollback transaction!

            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.service.index', [], [
                'message' => 'Service status update failed',
                'alert-type' => 'error'
            ]);
        }
    }

    public function contact()
    {
        $messages = WorkoutContact::orderBy('id', 'desc')->where('service_id', '!=', null)->paginate(20);;
        return view('admin.pages.service.messages', compact('messages'));
    }
}
