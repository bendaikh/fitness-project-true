<?php

namespace App\Services;


use App\Models\WorkoutEnrollment;

class EnrollmentService
{
    protected $enrollment;

    public function __construct(WorkoutEnrollment $enrollment, private WorkoutService $workoutService)
    {
        $this->enrollment = $enrollment;
    }

    public function all()
    {
        return $this->enrollment;
    }

    public function enrollWorkout($cart, $user, $extra = [])
    {
        $enrollments = [];
        foreach ($cart as $item) {
            $workout = $this->workoutService->getWorkout($item["id"]);
            $data = [
                'workout_id' => $item["id"],
                'user_id' => $user->id,
                'enroll_date' => now(),
                'start_date' => now()->parse($workout->class_start_date)->format('Y-m-d'),
                'expire_date' => now()->parse($workout->class_start_date)->addDays($workout->training_days),
                'status' => 'active'
            ];

            if ($extra['invoice_id']) {
                $data['invoice_id'] = $extra['invoice_id'];
            }
            if (auth('admin')->user()) {
                $data['created_by'] = auth('admin')->user()->id;
                $data['updated_by'] = auth('admin')->user()->id;
            }
            $enrollment = $this->enrollment->create($data);
            array_push($enrollments, $enrollment);
        }

        return $enrollments;
    }
}
