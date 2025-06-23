<?php

namespace App\Services;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Collection;

class AttendanceService
{
    /**
     * Get all attendance
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllAttendance(): Collection
    {
        return Attendance::all();
    }

    /**
     * Get attendance by id
     *
     * @param int $id
     * @return \App\Models\Attendance
     */
    public function getAttendanceById(int $id)
    {
        return Attendance::find($id);
    }

    /**
     * Create attendance
     *
     * @param array<string, mixed> $data
     * @return \App\Models\Attendance
     */
    public function createAttendance(array $data)
    {
        return Attendance::create($data);
    }

    /**
     * Update attendance
     *
     * @param \App\Models\Attendance $attendance
     * @param array<string, mixed> $data
     * @return \App\Models\Attendance
     */
    public function updateAttendance(Attendance $attendance, array $data)
    {
        $attendance->update($data);
        return $attendance;
    }

    /**
     * Delete attendance
     *
     * @param \App\Models\Attendance $attendance
     * @return bool
     */
    public function deleteAttendance(Attendance $attendance)
    {
        return $attendance->delete();
    }

}
