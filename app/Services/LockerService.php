<?php

namespace App\Services;

use App\Jobs\MemberLockerJob;
use App\Models\Locker;
use App\Models\LockerHistory;
use App\Models\Member;
use Modules\GlobalSetting\app\Models\EmailTemplate;

class LockerService
{
    /**
     * Get all lockers
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllLockers()
    {
        $query = Locker::with('member');
        if (request('keyword')) {
            $query->where(
                function ($q) {
                    $q->whereHas('member.user', function ($us) {
                        $us->where('name', 'like', '%' . request('keyword') . '%');
                    });
                    $q->orWhere('locker_no', 'like', '%' . request('keyword') . '%');
                }
            );
        }

        if (request()->get('status') != '') {
            $query->where('status', request('status'));
        }

        if (request('availability')) {
            $query->where('availability', request('availability'));
        }
        if (request('order_by')) {
            $query->orderBy('id', request('order_by'));
        }
        if (request('par-page')) {
            $paginatedResult = $query->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $paginatedResult = $query->paginate(20);
        }
        $paginatedResult->appends(request()->query());

        return $paginatedResult;
    }

    /**
     * Get locker by id
     *
     * @param int $id
     * @return \App\Models\Locker
     */
    public function getLockerById($id)
    {
        return Locker::find($id);
    }

    public function getLockerByNo($no)
    {
        return Locker::where('locker_no', $no)->first();
    }

    /**
     * Create locker
     *
     * @param array<string, mixed> $data
     * @return \App\Models\Locker
     */
    public function createLocker(array $data)
    {
        $data['created_by'] = auth('admin')->id();
        return Locker::create($data);
    }

    /**
     * Update locker
     *
     * @param \App\Models\Locker $locker
     * @param array<string, mixed> $data
     * @return \App\Models\Locker
     */
    public function updateLocker(Locker $locker, array $data)
    {
        $data['updated_by'] = auth('admin')->id();
        if (($data['availability'] == 'available' || $data['status'] == 0) && $locker->member) {
            // remove locker from member
            $locker->member->locker_no = null;
            $locker->member->save();

            // update locker history
            $lockerLatest = $locker->lockerLatest;

            $lockerLatest = $locker->lockerLatest;
            if ($lockerLatest) {
                $lockerLatest->return_date = now();
                $lockerLatest->updated_by = auth('admin')->id();
                $lockerLatest->save();
            }
            $data['availability'] = 'available';
        }

        // update locker
        $locker->update($data);
        return $locker;
    }

    /**
     * Delete locker
     *
     * @param \App\Models\Locker $locker
     * @return bool
     */
    public function deleteLocker(Locker $locker)
    {
        if ($locker->member) {
            return false;
        }
        $locker->lockerHistory()->delete();
        return $locker->delete();
    }

    /**
     * Change locker status
     *
     * @param \App\Models\Locker $locker
     * @param string $status
     * @return \App\Models\Locker
     */

    public function changeStatus(Locker $locker)
    {
        $status = $locker->status === 1 ? 0 : 1;
        $locker->update(['status' => $status]);
        return $locker;
    }
    public function assignLocker(Locker $locker, array $data)
    {
        if ($locker->lockerHistory()->whereNotNull('return_date')->exists()) {
            $locker->lockerHistory->return_date = now();
        }
        $memberId = $data['member_id'];

        $member = Member::find($memberId);
        // check if member already has locker
        if ($member->locker_no) {
            // check if locker is available
            if ($locker->availability === 'available') {
                $member->locker_no = null;
                $member->save();
            } else {
                return false;
            }
        }
        // check if locker is occupied
        if ($locker->availability === 'occupied') {
            return false;
        }
        $member->locker_no = $locker->locker_no;
        $member->save();
        $locker->update(
            [
                'availability' => 'occupied',
                'created_by' => auth('admin')->id(),
                'updated_by' => auth('admin')->id(),
            ]
        );
        $locker->lockerHistory()->create(
            [
                'member_id' => $memberId,
                'assign_date' => now(),
                'created_by' => auth('admin')->id(),
                'updated_by' => auth('admin')->id(),
            ]
        );

        // send email to member

        $template = EmailTemplate::where('name', 'Assign Locker')->first();
        $message = $template->message;
        $message = str_replace('{{user_name}}', $member->user->name, $message);
        $message = str_replace('{{locker_no}}', $locker->locker_no, $message);
        $subject = $template->subject;

        dispatch(new MemberLockerJob($member->user, $subject, $message));
        return $locker;
    }

    public function getMembers()
    {
        $members = Member::where('status', 1)->get();
        return $members;
    }

    public function availableLockers()
    {
        $lockers = Locker::where('status', 1)->where('availability', 'available')->get();
        return $lockers;
    }
    public function availableStatus(string $id)
    {
        $locker = Locker::where('id', $id)->select('availability')->first();
        return $locker;
    }
}
