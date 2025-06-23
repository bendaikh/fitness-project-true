<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssignSubscriptionRequest;
use App\Http\Requests\MemberRequest;
use App\Services\LockerService;
use App\Services\MemberService;
use App\Traits\RedirectHelperTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    use RedirectHelperTrait;
    private $memberService;
    private $lockerService;
    public function __construct(MemberService $memberService, LockerService $lockerService)
    {
        $this->middleware('auth:admin');
        $this->memberService = $memberService;
        $this->lockerService = $lockerService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('member.list');
        $members = $this->memberService->getAllMembers();
        return view('admin.pages.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('member.create');
        $memberId = $this->memberService->getUniqueMemberId();
        $lockers = $this->lockerService->availableLockers();

        $paymentGateways = getPaymentGateway();
        $plans = getSubscriptionPlans();

        return view('admin.pages.members.create', compact('memberId', 'lockers', 'paymentGateways', 'plans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberRequest $request)
    {
        checkAdminHasPermissionAndThrowException('member.store');
        try {
            $data = $request->except('_token');
            if ($request->has('image')) {
                $data['image'] = file_upload($request->file('image'), null);
            }

            $member = $this->memberService->createMember($data);
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.members.edit', ['member' => $member->id], [
                'message' => __('Member Registered successfully'),
                'alert-type' => 'success',
            ]);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, notification: [
                'message' => __('Member Registration failed'),
                'alert-type' => 'error',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        checkAdminHasPermissionAndThrowException('member.view');
        $member = $this->memberService->getMemberById($id);
        $user = $member->user;
        $lockers = $this->lockerService->availableLockers();
        $paymentGateways = getPaymentGateway();
        $plans = getSubscriptionPlans();

        return view('admin.pages.members.show', compact('user', 'member', 'lockers', 'paymentGateways', 'plans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        checkAdminHasPermissionAndThrowException('member.edit');
        $member = $this->memberService->getMemberById($id);
        $lockers = $this->lockerService->availableLockers();
        return view('admin.pages.members.edit', compact('member', 'lockers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('member.update');
        $threeYearsAgo = Carbon::now()->subDays(356 * 3)->toDateString();
        $request->validate([
            'dob' => ['nullable', 'date', 'before_or_equal:' . $threeYearsAgo],
        ], [
            'dob.date' => __('Please enter a valid date of birth.'),
            'dob.before_or_equal' => __('The date must be a date before or equal to') . ' ' . $threeYearsAgo,
        ]);
        try {
            $member = $this->memberService->getMemberById($id);

            if ($request->has('image')) {
                $image = file_upload($request->file('image'), $member->user->image);
                $member->user->update(['image' => $image]);
            }

            $this->memberService->updateMember($member, $request->except('_token'));

            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.members.index', [], [
                'message' => __('Member Updated successfully'),
                'alert-type' => 'success',
            ]);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.members.index', [], [
                'message' => __('Member Update failed'),
                'alert-type' => 'error',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('member.delete');
        $member = $this->memberService->getMemberById($id);
        $this->memberService->deleteMember($member);

        return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.members.index', [], [
            'message' => __('Member Deleted successfully'),
            'alert-type' => 'success',
        ]);
    }

    public function assignSubscription(AssignSubscriptionRequest $request)
    {
        checkAdminHasPermissionAndThrowException('subscription.assign');
        try {
            $data = $request->except('_token');
            $data['status'] = 1;
            $member = $this->memberService->getMemberById($request->member_id);

            // assign subscription

            $makeSubscription = $this->memberService->makeSubscription($member, $data);
            if ($makeSubscription) {
                return redirect()->back()->with([
                    'message' => __('Assigned Subscription Plan successfully'),
                    'alert-type' => 'success',
                ]);
            } else {
                return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.members.index', [], [
                    'message' => __('Something Went Wrong'),
                    'alert-type' => 'error',
                ]);
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.members.index', [], [
                'message' => __('Something Went Wrong'),
                'alert-type' => 'error',
            ]);
        }

        // make subscription history

    }

    public function renewSubscription(AssignSubscriptionRequest $request)
    {
        checkAdminHasPermissionAndThrowException('subscription.assign');
        try {
            $data = $request->except('_token');
            $data['status'] = 1;
            $member = $this->memberService->getMemberById($request->member_id);


            // renew subscription
            $makeSubscription = $this->memberService->makeSubscription($member, $data);
            if ($makeSubscription) {
                return redirect()->back()->with([
                    'message' => __('Renewed Subscription Plan successfully'),
                    'alert-type' => 'success',
                ]);
            } else {
                return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.members.index', [], [
                    'message' => __('Something Went Wrong'),
                    'alert-type' => 'error',
                ]);
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.members.index', [], [
                'message' => __('Something Went Wrong'),
                'alert-type' => 'error',
            ]);
        }
    }

    public function assignLocker(Request $request)
    {
        checkAdminHasPermissionAndThrowException('locker.assign');
        // check if member has any subscription

        $member = $this->memberService->getMemberById($request->member_id);

        if (!$member->subscription) {
            return redirect()->back()->with([
                'message' => __('Member has no subscription'),
                'alert-type' => 'error',
            ]);
        }

        $locker = $this->lockerService->getLockerById($request->locker_no);

        $assignLocker = $this->lockerService->assignLocker($locker, ['member_id' => $request->member_id]);

        if ($assignLocker) {
            return redirect()->back()->with([
                'message' => __('Locker assigned successfully'),
                'alert-type' => 'success',
            ]);
        } else {
            return redirect()->back()->with([
                'message' => __('Something Went Wrong'),
                'alert-type' => 'error',
            ]);
        }
    }

    public function changeStatus(Request $request)
    {
        checkAdminHasPermissionAndThrowException('member.update');
        $member = $this->memberService->getMemberById($request->id);
        $this->memberService->changeStatus($member);
        return response()->json([
            'message' => __('Member Status changed successfully'),
            'success' => true,
        ]);
    }
}
