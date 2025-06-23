<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainerRequest;
use App\Services\SpecialtyService;
use App\Services\TrainerService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TrainerController extends Controller
{
    use RedirectHelperTrait;
    protected $trainerService;
    protected $specialtyService;

    public function __construct(TrainerService $trainerService, SpecialtyService $specialtyService)
    {
        $this->trainerService = $trainerService;
        $this->specialtyService = $specialtyService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('trainer.view');
        $trainers = $this->trainerService->all();


        if (request('par-page')) {
            $trainers = $trainers->paginate(request('par-page') == 'all' ? null : request('par-page'));
        } else {
            $trainers = $trainers->paginate(20);
        }
        $trainers->appends(request()->query());
        return view('admin.pages.trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('trainer.create');
        $specialties = $this->specialtyService->all()->get();
        return view('admin.pages.trainers.create', compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainerRequest $request)
    {
        checkAdminHasPermissionAndThrowException('trainer.store');
        DB::beginTransaction();
        try {
            $trainer = $this->trainerService->storeTrainer($request);
            DB::commit();
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.trainer.edit', ['trainer' => $trainer->id], ['message' => 'Trainer created successfully', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.trainer.index', [], ['message' => 'Trainer creation failed', 'alert-type' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        checkAdminHasPermissionAndThrowException('trainer.view');
        $trainer = $this->trainerService->find($id);
        $user = $trainer->user;
        $workoutClasses = $trainer->workoutClasses()->orderBy('date', 'desc')->paginate(20);
        return view('admin.pages.trainers.show', compact('trainer', 'user', 'workoutClasses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        checkAdminHasPermissionAndThrowException('trainer.edit');
        $trainer = $this->trainerService->find($id);

        $specialties = $this->specialtyService->all()->get();

        return view('admin.pages.trainers.edit', compact('trainer', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainerRequest $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('trainer.update');
        DB::beginTransaction();
        try {
            $this->trainerService->updateTrainer($request, $id);
            DB::commit();
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.trainer.index', [], ['message' => 'Trainer updated successfully', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.trainer.index', [], ['message' => 'Trainer update failed', 'alert-type' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('trainer.delete');
        DB::beginTransaction();
        try {
            $this->trainerService->delete($id);
            DB::commit();
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.trainer.index', [], ['message' => 'Trainer deleted successfully', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.trainer.index', [], ['message' => 'Trainer deletion failed', 'alert-type' => 'error']);
        }
    }


    public function status($id)
    {
        $trainer = $this->trainerService->find($id);

        $trainer->status =  $trainer->status == '1' ? '0' : '1';
        $trainer->save();

        $trainer->user->status = $trainer->user->status == 'active' ? 'inactive' : 'active';
        $trainer->user->save();

        return response()->json(['message' => __('Status updated successfully'), 'success' => true]);
    }
}
