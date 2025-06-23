<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Services\BrandService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    use RedirectHelperTrait;
    protected $brandService;
    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('product.brand.view');
        $brands = $this->brandService->getPaginateBrands();

        return view('admin.pages.products.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('product.brand.create');
        try {
            return view('admin.pages.products.brand.create');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return back()->with(['message' => 'Something Went Wrong', 'alert-type' => 'error']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        checkAdminHasPermissionAndThrowException('product.brand.store');
        try {
            $brand = $this->brandService->store($request);

            if ($brand->id) {
                return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.brand.edit', ['brand' => $brand->id, 'code' => getSessionLanguage()], [
                    'message' => 'Brand created successfully',
                    'alert-type' => 'success',
                ]);
            } else {
                return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.brand.create', [], [
                    'message' => 'Brand creation failed',
                    'alert-type' => 'error',
                ]);
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.brand.create', [], [
                'message' => 'Brand creation failed',
                'alert-type' => 'error',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        checkAdminHasPermissionAndThrowException('product.brand.edit');
        $brand = $this->brandService->find($id);
        try {
            return view('admin.pages.products.brand.edit', compact('brand'));
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return back()->with(['message' => 'Something Went Wrong', 'alert-type' => 'error']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('product.brand.update');
        try {
            $brand = $this->brandService->update($request, $id);

            if ($brand) {
                return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.brand.index', [], [
                    'message' => 'Brand updated successfully',
                    'alert-type' => 'success',
                ]);
            } else {
                return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.brand.index', [], [
                    'message' => 'Brand update failed',
                    'alert-type' => 'error',
                ]);
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.brand.index', [], [
                'message' => 'Brand update failed',
                'alert-type' => 'error',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('product.brand.delete');
        try {
            $isBrandUsed = $this->brandService->isBrandUsed($id);
            if ($isBrandUsed) {
                return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.brand.index', [], [
                    'message' => 'Brand has products',
                    'alert-type' => 'error',
                ]);
            }
            $brand = $this->brandService->delete($id);

            if ($brand) {
                return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.brand.index', [], [
                    'message' => 'Brand deleted successfully',
                    'alert-type' => 'success',
                ]);
            } else {
                return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.brand.index', [], [
                    'message' => 'Brand delete failed',
                    'alert-type' => 'error',
                ]);
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.brand.index', [], [
                'message' => 'Brand delete failed',
                'alert-type' => 'error',
            ]);
        }
    }

    public function status($id)
    {
        checkAdminHasPermissionAndThrowException('product.brand.update');
        $brand = $this->brandService->status($id);
        return response()->json(['success' => true, 'message' => __('Brand Status Changed Successfully')]);
    }
}
