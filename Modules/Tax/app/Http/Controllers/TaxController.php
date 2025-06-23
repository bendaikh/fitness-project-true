<?php

namespace Modules\Tax\app\Http\Controllers;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Traits\RedirectHelperTrait;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Modules\Tax\app\Http\Requests\TaxRequest;
use Modules\Tax\app\Services\TaxService;

class TaxController extends Controller
{
    use RedirectHelperTrait;
    protected $taxService;
    public function __construct(TaxService $taxService)
    {
        $this->middleware('auth:admin');
        $this->taxService = $taxService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('tax.view');
        $taxes = $this->taxService->all();
        return view('tax::index', compact('taxes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('tax.create');
        return view('tax::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaxRequest $request): RedirectResponse
    {
        checkAdminHasPermissionAndThrowException('tax.store');
        try {
            $tax = $this->taxService->store($request->except('_token'));

            if ($tax) {
                return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.tax.edit', ['tax' => $tax->id]);
            } else {
                return back()->with(['message' => __('Something Went Wrong'), 'alert-type' => "error"]);
            }
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return back()->with(['message' => __('Something Went Wrong'), 'alert-type' => "error"]);
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        checkAdminHasPermissionAndThrowException('tax.view');
        return view('tax::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        checkAdminHasPermissionAndThrowException('tax.edit');
        $tax = $this->taxService->find($id);
        return view('tax::edit', compact('tax'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaxRequest $request, $id): RedirectResponse
    {
        checkAdminHasPermissionAndThrowException('tax.update');
        try {
            $tax = $this->taxService->find($id);
            $tax = $this->taxService->update($tax, $request->except('_token'));
            if ($tax) {
                return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.tax.index');
            } else {
                return back()->with(['message' => __('Something Went Wrong'), 'alert-type' => "error"]);
            }
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return back()->with(['message' => __('Something Went Wrong'), 'alert-type' => "error"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        checkAdminHasPermissionAndThrowException('tax.delete');
        try {
            $tax = $this->taxService->find($id);
            $tax->delete();
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.tax.index');
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return back()->with(['message' => __('Something Went Wrong'), 'alert-type' => "error"]);
        }
    }


    // status update
    public function taxStatus($id)
    {
        checkAdminHasPermissionAndThrowException('tax.update');
        $tax = $this->taxService->find($id);
        $status = $tax->status == 1 ? 0 : 1;
        $tax->status = $status;
        $tax->save();
        return response()->json(['success' => 'Status Change Successfully.']);
    }
}
