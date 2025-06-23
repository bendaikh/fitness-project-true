<?php

namespace App\Services;

use App\Enums\SubscriptionPlanType;
use App\Jobs\MemberSubscriptionJob;
use App\Models\Locker;
use App\Models\Member;
use App\Models\User;
use App\Jobs\DefaultMailJob;
use App\Mail\GlobalMail;
use App\Mail\MemberSubscriptionMail;
use App\Traits\MailSenderTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\GlobalSetting\app\Models\EmailTemplate;
use Modules\Subscription\app\Models\SubscriptionHistory;
use Modules\Subscription\app\Models\SubscriptionPlan;

class MemberService
{
    use  MailSenderTrait;
    /**
     * Get all Members
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function filteredMembers(): Builder
    {
        $query = Member::with('subscription', 'user', 'attendance');
        if (request('keyword')) {

            $query->where(function ($q) {
                $q->whereHas('user', function ($us) {
                    $us->where('name', 'like', '%' . request('keyword') . '%');
                })
                    ->orWhere('member_id', 'like', '%' . request('keyword') . '%')
                    ->orWhere('phone', 'like', '%' . request('keyword') . '%')
                    ->orWhere('locker_no', 'like', '%' . request('keyword') . '%');
            });
        }


        if (request()->get('status') != '') {
            $query->where('status', request('status'));
        }
        if (request('subscription_status') != '' && request('subscription_status') != 'all') {
            if (request('subscription_status') != 'no_plan') {
                $query->whereHas('subscription', function ($q) {
                    if (request('subscription_status') == 1) {
                        $q->where('end_date', '>=', now()->toDateTimeString());
                    } elseif (request('subscription_status') == 'expired') {
                        $q->where('end_date', '<', now()->toDateTimeString());
                    }
                });
            } else {
                $query->whereDoesntHave('subscription');
            }
        }

        if (request('order_by')) {
            $query->orderBy('id', request('order_by'));
        } else {
            $query->orderBy('id', 'desc');
        }
        return $query;
    }
    public function getAllMembers()
    {
        $query = $this->filteredMembers();


        if (request('par-page')) {
            $paginatedResult = $query->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $paginatedResult = $query->paginate(20);
        }
        $paginatedResult->appends(request()->query());

        return $paginatedResult;
    }

    /**
     * Get Member by id
     *
     * @param int $id
     * @return \App\Models\Member
     */
    public function getMemberById(int $id)
    {
        return Member::with('subscription', 'subscriptionHistory', 'user')->find($id);
    }

    /**
     * Create Member
     *
     * @param array<string, mixed> $data
     * @return \App\Models\Member
     */
    public function createMember(array $data)
    {
        // create user for member login

        $newData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'status' => 'active',
            'user_type' => 'member',
            'email_verified_at' => now(),
        ];

        if (isset($data['image'])) {
            $newData['image'] = $data['image'];
        }
        $user = User::create($newData);

        // store member details


        $member = $this->storeMember($user, $data);

        if ($data['is_trial'] == 1) {
            // create subscription for member
            $this->assignSubscription($member, $data);
        }

        // assign locker to member
        if (isset($data['locker_no'])) {
            $locker = Locker::where('locker_no', $data['locker_no'])->first();
            $lockerService = (new LockerService())->assignLocker($locker, ['member_id' => $member->id]);
        }

        // create subscription history
        if (isset($data['plan_id'])) {
            $this->makeSubscription($member, $data);
        }
        return $member;
    }


    // store member details

    public function storeMember($user, array $data)
    {
        $member = Member::create([
            'user_id' => $user->id,
            'member_id' => isset($data['member_id']) ? $data['member_id'] : $this->getUniqueMemberId(),
            'locker_no' => isset($data['locker_no']) ? $data['locker_no'] : null,
            'gender' => isset($data['gender']) ? $data['gender'] : null,
            'dob' => isset($data['dob']) ? now()->parse($data['dob']) : null,
            'height' => isset($data['height']) ? $data['height'] : null,
            'weight' => isset($data['weight']) ? $data['weight'] : null,
            'chest' => isset($data['chest']) ? $data['chest'] : null,
            'referred_by' => isset($data['referred_by']) ? $data['referred_by'] : null,
            'created_by' => auth('admin')->id(),
            'blood_group' => isset($data['blood_group']) ? $data['blood_group'] : null,
            'phone' => isset($data['phone']) ? $data['phone'] : null,
            'emergency_contact' => isset($data['emergency_contact']) ? $data['emergency_contact'] : null,
            'emergency_phone' => isset($data['emergency_phone']) ? $data['emergency_phone'] : null,
            'emergency_relation' => isset($data['emergency_relation']) ? $data['emergency_relation'] : null,
            'profile_image' => isset($data['image']) ? $data['image'] : null,
            'status' => $data['status'],
        ]);

        return $member;
    }
    /**
     * Update Member
     *
     * @param \App\Models\Member $member
     * @param array<string, mixed> $data
     * @return \App\Models\Member
     */

    public function updateMember(Member $member, array $data)
    {
        $member->update([...$data, 'dob' => isset($data['dob']) ? now()->parse($data['dob']) : null]);
        if (isset($data['address'])) {
            $member->user->update(['address' => $data['address']]);
        }
        return $member;
    }

    /**
     * Delete Member
     *
     * @param \App\Models\Member $member
     * @return bool
     */

    public function deleteMember(Member $member)
    {
        // delete subscription
        if ($member->subscription) {
            $member->subscription->delete();
        }

        // update the  locker
        if ($member->locker) {
            (new LockerService())->updateLocker($member->locker, ['availability' => 'available']);
        }

        // delete lockerHistory
        if ($member->lockerHistory) {
            $member->lockerHistory()->delete();
        }

        // delete payments
        if ($member->payments) {
            $member->payments()->delete();
        }

        // subscriptionHistory
        if ($member->subscriptionHistory) {
            $member->subscriptionHistory()->delete();
        }

        // subscriptions
        if ($member->subscriptions) {
            $member->subscriptions()->delete();
        }

        // delete user
        $user = $member->user;

        if (file_exists($user->image)) {
            unlink($user->image);
        }

        $user->delete();

        return $member->delete();
    }

    public function getUniqueMemberId()
    {
        $number = 1;
        $prefix = 'M-';

        $member_id = $prefix . $number;

        $member = Member::latest()->first();

        if ($member) {
            $memberId = $member->member_id;
            $split_Id = explode('-', $memberId);
            $member_id = (int) $split_Id[1] + 1;
            $member_id = $prefix . $member_id;
        }
        return $member_id;
    }

    public function assignSubscription(Member $member, array $data)
    {
        DB::beginTransaction();
        try {
            $subscription = $member->subscription()->create([
                'subscription_plan_id' => $data['is_trial'] ? '' : $data['plan_id'],
                'subscription_status' => $data['is_trial'] ? 0 : 1,
                'payment_status' => $data['is_trial'] ? '' : ($data['due_amount'] > 0 ? 'due' : 'success'),
                'due_amount' => $data['is_trial'] ? 0 : $data['due_amount'],
                'due_at' => $data['is_trial'] ? null : ($data['due_amount'] ? $data['due_at'] : null),
                'is_trial' => $data['is_trial'],
                'trial_start_date' => $data['is_trial'] ? $data['trial_start_date'] : null,
                'trial_end_date' => $data['is_trial'] ? $data['trial_end_date'] : null,
                'available_trial' => 0,
                'status' => $data['status'],
            ]);

            DB::commit();

            if ($data['is_trial'] == 1) {
                $template = EmailTemplate::where('name', 'Trial Subscription')->first();
                $subject = $template->subject;

                $message = $template->message;

                $message = str_replace('{{user_name}}', $member->user->name, $message);
                $message = str_replace('{{subscription_start_date}}', make_date($subscription->trial_start_date), $message);
                $message = str_replace('{{subscription_end_date}}', make_date($subscription->trial_end_date), $message);

                dispatch(new MemberSubscriptionJob($message, $subject, $member->user->email));
            }
            return $subscription;
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollBack();
            return false;
        }
    }

    public function makeSubscription(Member $member, array $data)
    {
        if (isset($data['plan_id'])) {
            $subPlan = SubscriptionPlan::find($data['plan_id']);
        }

        DB::beginTransaction();

        try {
            // check if member has subscription
            $history = $member->subscriptionHistory;
            $additional = 0;
            if (is_null($history) && $subPlan->free_trial) {
                $additional  = $subPlan->free_trial;
            }

            $subscriptionHistory = [
                'member_id' => $member->id,
                "invoice_id" =>  'INV-' . mt_rand(10000000, 99999999),
                'subscription_plan_id' => $data['plan_id'],
                'plan_name' => $subPlan->plan_name,
                'plan_price' => isset($data['plan_type']) && $data['plan_type'] == 'annually' ? $subPlan->yearly_price : $subPlan->plan_price,
                'cancellation_reason' => null,
                'start_date' => now(),
                'end_date' => isset($data['plan_type']) && $data['plan_type'] == 'annually' ? now()->addDays(365 + $additional) : now()->addDays(SubscriptionPlanType::getDays($subPlan->expiration_date) + $additional),
                'renewal_date' => isset($data['plan_type']) && $data['plan_type'] == 'annually' ? now()->addDays(365 + $additional) : now()->addDays(SubscriptionPlanType::getDays($subPlan->expiration_date) + $additional),
                'status' => $data['status'],
                'payment_status' => isset($data['payment_status']) ? $data['payment_status'] : ($data['due_amount'] > 0 ? 'due' : 'success'),
                'payment_method' => $data['gateway'],
                'total_amount' => isset($data['total_amount']) ? $data['total_amount'] : $subPlan->plan_price,
                'subscription_type' => isset($data['plan_type']) ? $data['plan_type'] : 'monthly',
                'transaction' => $data['transaction'],
            ];

            $subscription = SubscriptionHistory::create($subscriptionHistory);

            DB::commit();

            $template = EmailTemplate::where('name', 'Subscription Success')->first();
            $subject = $template->subject;

            $message = $template->message;

            $message = str_replace('{{user_name}}', $member->user->name, $message);
            $message = str_replace('{{subscription_start_date}}', make_date($subscription->start_date), $message);
            $message = str_replace('{{subscription_end_date}}', make_date($subscription->end_date), $message);
            $message = str_replace('{{subscription_name}}', $subPlan->plan_name, $message);
            $message = str_replace('{{subscription_price}}', $subPlan->plan_price, $message);


            $this->sendOrderSuccessMailFromTrait($subject, $message, $member->user, null);
            return $subscription;
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            DB::rollBack();

            return false;
        }
    }

    public function getActiveMembers()
    {
        return Member::where('status', 1)->get();
    }

    // get members who has not locker_no
    public function getUnassignedMembers()
    {
        return Member::whereNull('locker_no')->where('status', 1)->get();
    }

    // get member who has not subscription
    public function getUnsubscribedMembers()
    {
        return Member::whereDoesntHave('subscription')->get();
    }

    public function changeStatus(Member $member)
    {
        $member->status = $member->status == 1 ? 0 : 1;
        $member->save();

        // update user status
        $user = $member->user;
        $user->status = $user->status == 'active' ? 'inactive' : 'active';
        $user->save();
    }
}
