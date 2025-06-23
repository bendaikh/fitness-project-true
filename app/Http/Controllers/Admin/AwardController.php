<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Http\Requests\AwardRequest;
use App\Services\AwardService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AwardController extends Controller
{
    use RedirectHelperTrait;
    public function __construct(private AwardService $awardService)
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('award.view');
        $awards = $this->awardService->all();

        if (request('par-page')) {
            $awards = $awards->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $awards = $awards->paginate(20);
        }


        $awards->appends(request()->query());
        return view('admin.pages.award.index', compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('award.create');
        return view('admin.pages.award.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AwardRequest $request)
    {
        checkAdminHasPermissionAndThrowException('award.store');
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $data['image'] = file_upload($request->file('image'), null);
            }
            $award = $this->awardService->store($data);

            if ($award) {
                return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.award.edit', ['award' => $award->id], ['message' => 'Award created successfully', 'alert-type' => 'success']);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.award.create', [], ['message' => 'Something went wrong', 'alert-type' => 'error']);
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
        checkAdminHasPermissionAndThrowException('award.edit');
        $award = $this->awardService->all()->find($id);
        return view('admin.pages.award.edit', compact('award'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AwardRequest $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('award.update');
        try {
            $award = $this->awardService->all()->find($id);
            if ($award) {
                $data = $request->validated();
                $data['image'] = $award->image;
                if ($request->hasFile('image')) {
                    $data['image'] = file_upload($request->file('image'), $award->image);
                }
                $award->update($data);
                return $this->redirectWithMessage(
                    RedirectType::UPDATE->value,
                    'admin.award.index',
                    [],
                    ['message' => 'Award updated successfully', 'alert-type' => 'success']
                );
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(
                RedirectType::UPDATE->value,
                'admin.award.edit',
                ['award' => $id],
                ['message' => 'Something went wrong', 'alert-type' => 'error']
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('award.delete');
        try {
            $award = $this->awardService->all()->find($id);
            if ($award) {
                file_delete($award->image);
                $award->delete();
                return $this->redirectWithMessage(
                    RedirectType::DELETE->value,
                    'admin.award.index',
                    [],
                    ['message' => 'Award deleted successfully', 'alert-type' => 'success']
                );
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(
                RedirectType::DELETE->value,
                'admin.award.index',
                [],
                ['message' => 'Something went wrong', 'alert-type' => 'error']
            );
        }
    }

    public function changeStatus(Request $request)
    {
        checkAdminHasPermissionAndThrowException('award.update');
        try {
            $award = $this->awardService->all()->find($request->id);
            $status = $award->status == 1 ? 0 : 1;
            if ($award) {
                $award->update(['status' => $status]);
                return response()->json('Status updated successfully');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}
