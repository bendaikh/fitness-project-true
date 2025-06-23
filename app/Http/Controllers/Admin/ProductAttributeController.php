<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Services\AttributeService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductAttributeController extends Controller
{
    use RedirectHelperTrait;
    private $attributeService;
    public function __construct(AttributeService $attributeService)
    {
        $this->attributeService = $attributeService;
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('product.attribute.view');
        $attributes = $this->attributeService->getAllAttributes();
        return view('admin.pages.products.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('product.attribute.create');
        return view('admin.pages.products.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttributeRequest $request)
    {
        checkAdminHasPermissionAndThrowException('product.attribute.store');
        DB::beginTransaction();
        try {
            $attribute = $this->attributeService->storeAttribute($request);
            DB::commit();
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.attribute.edit', ['attribute' => $attribute->id], ['message' => 'Attribute created successfully', 'alert-type' => 'success']);
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.attribute.index', [], ['message' => 'Something went wrong', 'alert-type' => 'error']);
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
        checkAdminHasPermissionAndThrowException('product.attribute.edit');
        $attribute = $this->attributeService->getById($id);
        return view('admin.pages.products.attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttributeRequest $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('product.attribute.update');
        DB::beginTransaction();
        try {
            $attribute = $this->attributeService->getById($id);
            $this->attributeService->updateAttribute($request, $attribute);
            DB::commit();
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.attribute.index', [], ['message' => 'Attribute Update successfully', 'alert-type' => 'success']);
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.attribute.index', [], ['message' => 'Something went wrong', 'alert-type' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('product.attribute.delete');
        DB::beginTransaction();
        try {
            $attribute = $this->attributeService->deleteAttribute($id);
            DB::commit();
            if ($attribute['status'] == true) {
                return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.attribute.index', [], ['message' => 'Attribute deleted successfully', 'alert-type' => 'success']);
            } else {
                return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.attribute.index', [], ['message' => $attribute['message'], 'alert-type' => 'error']);
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.attribute.index', [], ['message' => 'Something went wrong', 'alert-type' => 'error']);
        }
    }

    public function checkHasValue(Request $request)
    {
        checkAdminHasPermissionAndThrowException('product.attribute.view');
        $attribute = $this->attributeService->getById($request->attribute_id);
        if ($attribute->values->count() > 0) {
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }

    public function deleteValue(Request $request)
    {
        checkAdminHasPermissionAndThrowException('product.attribute.delete');
        DB::beginTransaction();
        try {
            $this->attributeService->deleteValue($request->all());
            DB::commit();
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.attribute.index', [], ['message' => 'Attribute value deleted successfully', 'alert-type' => 'success']);
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.attribute.index', [], ['message' => 'Something went wrong', 'alert-type' => 'error']);
        }
    }
    public function getValue(Request $request)
    {
        checkAdminHasPermissionAndThrowException('product.attribute.store');
        try {
            // get attributes values using array
            $values = $this->attributeService->getValues($request);
            if ($values) {
                return response()->json(['status' => true, 'data' => $values]);
            } else {
                return response()->json(['status' => false, 'message' => 'No values found']);
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return response()->json(['status' => false, 'message' => 'Something went wrong']);
        }
    }
}
