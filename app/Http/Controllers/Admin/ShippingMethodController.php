<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingMethodRequest;
use App\Services\ShippingMethodService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShippingMethodController extends Controller
{
    protected $shippingMethodService;
    public function __construct(ShippingMethodService $shippingMethodService)
    {
        $this->middleware('auth:admin');
        $this->shippingMethodService = $shippingMethodService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('shipping.view');
        $shippings = $this->shippingMethodService->getAll();
        return view('admin.pages.shipping.index', compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('shipping.create');
        return view('admin.pages.shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShippingMethodRequest $request)
    {
        checkAdminHasPermissionAndThrowException('shipping.store');

        try {
            $shipping = $this->shippingMethodService->create($request);

            $notification = ['message' => 'Shipping method created successfully', 'alert-type' => 'success'];
            return redirect()->route('admin.shipping.edit', $shipping->id)->with($notification);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());

            $notification = ['message' => 'Shipping method not created', 'alert-type' => 'error'];
            return back()->with($notification);
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
        checkAdminHasPermissionAndThrowException('shipping.edit');
        try {
            $shipping = $this->shippingMethodService->find($id);
            return view('admin.pages.shipping.edit', compact('shipping'));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            $notification = ['message' => 'Shipping method not found', 'alert-type' => 'error'];
            return back()->with($notification);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShippingMethodRequest $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('shipping.update');
        try {
            $shipping = $this->shippingMethodService->find($id);
            $this->shippingMethodService->update($request, $shipping);

            $notification = ['message' => 'Shipping method updated successfully', 'alert-type' => 'success'];
            return redirect()->route('admin.shipping.index')->with($notification);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());

            $notification = ['message' => 'Shipping method not updated', 'alert-type' => 'error'];
            return back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('shipping.delete');
        try {
            $shipping = $this->shippingMethodService->find($id);
            $shipping->delete();

            $notification = ['message' => 'Shipping method deleted successfully', 'alert-type' => 'success'];
            return redirect()->route('admin.shipping.index')->with($notification);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());

            $notification = ['message' => 'Shipping method not deleted', 'alert-type' => 'error'];
            return back()->with($notification);
        }
    }

    public function shippingStatus(string $id)
    {

        checkAdminHasPermissionAndThrowException('shipping.update');
        try {
            $shipping = $this->shippingMethodService->find($id);
            $shipping->status = !$shipping->status;
            $shipping->save();

            return response()->json('Shipping method status updated successfully');
        } catch (Exception $ex) {
            Log::error($ex->getMessage());

            $notification = ['message' => 'Shipping method status not updated', 'alert-type' => 'error'];
            return back()->with($notification);
        }
    }
}
