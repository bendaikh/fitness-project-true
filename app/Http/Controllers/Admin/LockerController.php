<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Http\Requests\LockerRequest;
use App\Services\LockerService;
use App\Services\MemberService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;

class LockerController extends Controller
{
    use RedirectHelperTrait;
    private $lockerService;
    private $memberService;
    public function __construct(LockerService $lockerService, MemberService $memberService)
    {
        $this->middleware('auth:admin');
        $this->lockerService = $lockerService;
        $this->memberService = $memberService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('locker.list');
        $lockers = $this->lockerService->getAllLockers();
        $members = $this->memberService->getUnassignedMembers();
        return view('admin.pages.lockers.index', compact('lockers', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LockerRequest $request)
    {
        checkAdminHasPermissionAndThrowException('locker.store');

        $this->lockerService->createLocker($request->except('_token'));

        return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.lockers.index', [], [
            'message' => __('Locker created successfully'),
            'alert-type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        checkAdminHasPermissionAndThrowException('locker.view');
        $locker = $this->lockerService->getLockerById($id);
        $lockerHistories = $locker->lockerHistory()->paginate(20);
        return view('admin.pages.lockers.history', compact('lockerHistories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LockerRequest $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('locker.update');
        $locker = $this->lockerService->getLockerById($id);
        $this->lockerService->updateLocker($locker, $request->except('_token'));

        return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.lockers.index', [], [
            'message' => __('Locker updated successfully'),
            'alert-type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('locker.delete');
        $locker = $this->lockerService->getLockerById($id);
        $response = $this->lockerService->deleteLocker($locker);

        if ($response) {
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.lockers.index', [], [
                'message' => __('Locker deleted successfully'),
                'alert-type' => 'success',
            ]);
        } else {
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.lockers.index', [], [
                'message' => __('Locker Already in use, cannot be deleted.'),
                'alert-type' => 'error',
            ]);
        }
    }
    public function changeStatus(string $id)
    {
        checkAdminHasPermissionAndThrowException('locker.update');
        $locker = $this->lockerService->getLockerById($id);
        $this->lockerService->changeStatus($locker);

        $transaction = [
            'message' => __('Locker status changed successfully'),
            'status' => 'success',
        ];

        return response()->json($transaction);
    }

    public function assignLockerView(string $id)
    {
        checkAdminHasPermissionAndThrowException('locker.update');
        $locker = $this->lockerService->getLockerById($id);
        $members = $this->memberService->getUnassignedMembers();
        return view('admin.pages.lockers.assign-locker', compact('locker', 'members'))->render();
    }

    public function assignLocker(Request $request)
    {
        checkAdminHasPermissionAndThrowException('locker.update');


        $this->validate($request, [
            'member_id' => 'required|numeric|exists:members,id',
        ], [
            'member_id.required' => __('Please select member'),
            'member_id.numeric' => __('Please select member'),
            'member_id.exists' => __('Please select member'),
        ]);

        $locker = $this->lockerService->getLockerByNo($request->locker_no);
        $this->lockerService->assignLocker($locker, $request->except('_token'));

        return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.lockers.index', [], [
            'message' => __('Locker assigned successfully'),
            'alert-type' => 'success',
        ]);
    }
    public function availableStatus(string $id)
    {
        checkAdminHasPermissionAndThrowException('locker.update');
        $status = $this->lockerService->availableStatus($id);
        return response()->json($status);
    }
}
