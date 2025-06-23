<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceRequest;
use App\Services\AttendanceService;

class AttendanceController extends Controller
{
    private $attendanceService;
    public function __construct(AttendanceService $attendanceService)
    {
        $this->middleware('auth:admin');
        $this->attendanceService = $attendanceService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('attendance.view');

        $attendances = $this->attendanceService->getAllAttendance();
        return view('admin.attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttendanceRequest $request)
    {
        checkAdminHasPermissionAndThrowException('attendance.store');
        $this->attendanceService->createAttendance($request->all());
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
        checkAdminHasPermissionAndThrowException('attendance.edit');
        $attendance = $this->attendanceService->getAttendanceById($id);
        return view('admin.attendances.edit', compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttendanceRequest $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('attendance.update');
        $attendance = $this->attendanceService->getAttendanceById($id);
        $this->attendanceService->updateAttendance($attendance, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('attendance.delete');
        $attendance = $this->attendanceService->getAttendanceById($id);
        $this->attendanceService->deleteAttendance($attendance);
    }
}
