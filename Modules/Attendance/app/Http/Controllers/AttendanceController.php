<?php

namespace Modules\Attendance\app\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Member;
use App\Services\MemberService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Modules\Attendance\app\Models\Attendance;

class AttendanceController extends Controller
{
    public function __construct(protected MemberService $memberService)
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('attendance.list');


        $appMode = env('APP_MODE');
        if ($appMode == 'DEMO') {
            $todayDate = date('d');
            if ($todayDate % 2 == 0) {
                $currentMonth = date('m');
                $currentYear = date('Y');
                $today = date('Y-m-d');

                $currentMembers = $this->memberService->filteredMembers()->get();

                // Get the number of days in the current month
                $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

                // Collect all dates in the current month before today
                $availableDates = [];
                for ($day = 1; $day <= $daysInMonth; $day++) {
                    $date = sprintf('%04d-%02d-%02d', $currentYear, $currentMonth, $day);
                    if ($date < $today) {
                        $availableDates[] = $date;
                    }
                }


                if (!empty($availableDates)) {
                    // Calculate 50% of available dates (rounded down)
                    $numberOfDates = floor(count($availableDates) / 2);

                    // Randomly shuffle and select 50% of the dates
                    shuffle($availableDates);
                    $randomDates = array_slice($availableDates, 0, $numberOfDates);
                } else {
                    $randomDates = [];
                }

                // Loop through the selected dates and members
                foreach ($randomDates as $date) {
                    foreach ($currentMembers as $member) {
                        $attendance = $member->attendance->where('date', $date)->where('member_id', $member->id)->first();

                        $options = [
                            'present',
                            'absent',
                        ];
                        if (!$attendance) {
                            Attendance::create([
                                'date' => $date,
                                'member_id' => $member->id,
                                'status' => $options[array_rand($options, 1)],
                            ]);
                        }
                    }
                }
            }
        }

        $members = $this->memberService->getAllMembers();
        return view('attendance::index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('attendance.create');


        $members = $this->memberService->getAllMembers();
        return view('attendance::create', compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        checkAdminHasPermissionAndThrowException(['attendance.store', 'attendance.update']);

        $request->validate([
            'date' => 'required',
            'member_id' => 'required',
            'member_id.*' => 'required|numeric',
            'attendance' => 'required',
            'attendance.*' => 'required|in:absent,present',
        ], [
            'date.required' => __('Date is required'),
            'member_id.required' => __('Member is required'),
            'attendance.required' => __('Attendance is required'),
        ]);
        $date = $request->date;
        $members = $request->member_id;
        $attendances = $request->attendance;

        // get all attendances for the date
        $attendancesList = Attendance::where('date', now()->parse($date))->pluck('member_id')->toArray();



        foreach ($members as $key => $member) {
            // check if member has already taken attendance for the date
            if (in_array($member, $attendancesList)) {

                // update attendance
                $attendance = Attendance::where('date', now()->parse($date))->where('member_id', $member)->first();
                $attendance->update(['status' => $attendances[$key]]);
                continue;
            }

            Attendance::create([
                'date' => now()->parse($date),
                'attendance' => $attendances[$key],
                'member_id' => $member
            ]);
        }

        return response()->json(['message' => __('Attendance Taken'), 'success' => true]);
    }
}
