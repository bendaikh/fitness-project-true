<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Services\SpecialtyService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SpecialtyController extends Controller
{
    use RedirectHelperTrait;
    protected $specialtyService;

    public function __construct(SpecialtyService $specialtyService)
    {
        $this->specialtyService = $specialtyService;
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('specialty.view');
        $specialties = $this->specialtyService->all();
        if (request('par-page')) {
            $specialties = $specialties->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $specialties = $specialties->paginate(20);
        }


        $specialties->appends(request()->query());
        return view('admin.pages.specialty.index', compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('specialty.create');
        return view('admin.pages.specialty.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        checkAdminHasPermissionAndThrowException('specialty.store');
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $specialty = $this->specialtyService->store($request);
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.specialty.edit', ['specialty' => $specialty->id], ['message' => 'Specialty created successfully', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.specialty.index');
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
        checkAdminHasPermissionAndThrowException('specialty.edit');
        $specialty = $this->specialtyService->find($id);
        return view('admin.pages.specialty.edit', compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('specialty.update');
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $specialty = $this->specialtyService->update($request, $id);
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.specialty.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.specialty.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('specialty.delete');
        try {
            $specialty = $this->specialtyService->find($id);

            if ($specialty->trainers()->exists()) {
                return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.specialty.index', [], [
                    'message' => 'Specialty is used in trainer. Please remove trainer from this specialty first.',
                    'alert-type' => 'error'
                ]);
            }

            if (!$specialty) {
                return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.specialty.index', [], [
                    'message' => 'Specialty not found',
                    'alert-type' => 'error'
                ]);
            }

            $specialty->delete();
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.specialty.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.specialty.index');
        }
    }
}
