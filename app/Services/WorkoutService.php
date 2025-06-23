<?php

namespace App\Services;

use App\Models\Tool;
use App\Models\Workout;
use App\Models\WorkoutCategory;
use App\Models\WorkoutContact;
use App\Models\WorkoutEnrollment;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class WorkoutService
{
    protected $workout;
    use GenerateTranslationTrait;
    public function __construct(Workout $workout)
    {
        $this->workout = $workout;
    }
    public function getWorkouts()
    {
        $query = $this->workout->with('category', 'createdBy', 'updatedBy');
        if (request('keyword')) {
            $query = $query->where(function ($q) {
                $q->whereHas('translation', function ($q) {
                    $q->where('name', 'like', '%' . request('keyword') . '%');
                });
            });
        }

        if (request('category')) {
            $query = $query->where('category_id', request('category'));
        }

        if (request()->get('status') != '') {
            $status = request('status');
            $query = $query->where('status', "$status");
        }
        if (request('order_by')) {
            $query = $query->orderBy('id', request('order_by'));
        }


        return $query;
    }

    // active workout
    public function getActiveWorkouts()
    {
        return $this->workout->with(['translation', 'enrollments'])->where('status', '1');
    }
    public function getWorkoutBySlug(string $slug)
    {
        $workout = $this->workout->with(['trainers' => function ($q) {
            $q->distinct('user_id');
        }])->where('slug', $slug)->first();
        return $workout;
    }
    public function getWorkout($id)
    {
        return $this->workout->find($id);
    }

    public function createWorkout($request)
    {
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = file_upload($request->file('image'), null, '/uploads/custom-images/workout/');
        }

        $data = [
            'image' => $imageName,
            'images' => $request->images,
            'training_days' => $request->training_days,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'enroll_start' => $request->enroll_start,
            'enroll_end' => $request->enroll_end,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
            'status' => $request->status,
            'slug' => $request->slug,
            'class_count' => $request->class_count,
            'class_start_date' => $request->class_start_date,
        ];


        $videos = [];
        if ($request->video_link) {
            foreach ($request->video_link as $index => $video) {
                if (!$video) continue;
                $image = file_upload($request->video_image[$index], null, '/uploads/custom-images/workout/');
                $video = ['link' => $video, 'image' =>  $image];
                $videos[] = $video;
            }
        }
        $data['videos'] = $videos;



        $checkSlug = $this->workout->where('slug', $request->slug)->first();
        if ($checkSlug) {
            // make slug unique
            $data['slug'] = $data['slug'] . '-' . time();
        }
        // store workout
        $workout = $this->workout->create($data);

        // Generate translations
        $this->generateTranslations(
            TranslationModels::Workout,
            $workout,
            'workout_id',
            $request,
        );

        return $workout;
    }

    public function updateWorkout($request, $id)
    {
        $workout = $this->workout->find($id);

        $imageName = $workout->image;
        if ($request->hasFile('image')) {
            $imageName = file_upload($request->file('image'), $workout->image, '/uploads/custom-images/workout/');
        }


        $data = $request->validated();
        $data['image'] = $imageName;
        $data['updated_by'] = auth()->id();

        if ($request->video_link) {
            $videos = [];
            foreach ($request->video_link as $index => $video) {
                if (isset($request->video_image[$index]) && $request->video_image[$index]) {
                    $image = file_upload($request->video_image[$index], null, '/uploads/custom-images/workout/');
                } else {
                    $image = $workout->videos[$index]['image'];
                }
                $video = ['link' => $video, 'image' =>  $image];
                $videos[] = $video;
            }
            $data['videos'] = $videos;
        }

        // check slug
        if ($request->slug != $workout->slug) {
            $checkSlug = $this->workout->where('slug', $request->slug)->first();
            if ($checkSlug) {
                // make slug unique
                $data['slug'] = $data['slug'] . '-' . time();
            }
        }

        $workout->update($data);

        $this->updateTranslations(
            $workout,
            $request,
            $request->all(),
        );


        return $workout;
    }

    public function deleteWorkout($id)
    {
        // delete translate workout
        $workout = $this->workout->find($id);
        $workout->translations()->delete();

        file_delete($workout->image);
        // delete workout
        return $workout->delete();
    }

    public function getWorkoutCategories()
    {
        return WorkoutCategory::where('status', 1)->get();
    }

    public function getTools()
    {
        return Tool::where('status', 1)->get();
    }

    public function changeStatus($id)
    {
        $workout = $this->workout->find($id);
        $status = $workout->status == '1' ? '0' : '1';
        return $workout->update(['status' => $status]);
    }

    public function deleteEnrollment($id)
    {
        $enrollment = WorkoutEnrollment::find($id);

        if (!$enrollment) {
            return redirect()->back()->with([
                'alert-type' => 'danger',
                'message' => 'Enrollment not found'
            ]);
        }
        $enrollment->payment->delete();

        return $enrollment->delete();
    }

    public function updateEnrollmentStatus(string $status, $id)
    {
        $enrollment = WorkoutEnrollment::find($id);
        $enrollment->payment->payment_status = $status;
        $enrollment->payment->save();
        return $enrollment;
    }

    public function getWorkoutHistories()
    {
        $query = WorkoutEnrollment::query();

        if (request('keyword')) {
            $query->where(function ($q) {
                $q->orWhereHas('workout.translation', function ($q) {
                    $q->where('name', 'like', '%' . request('keyword') . '%');
                });
                $q->orWhereHas('user', function ($q) {
                    $q->where('name', 'like', '%' . request('keyword') . '%');
                });
            });
        }

        if (request()->get('status') != '') {
            $status = request('status');

            $query =  $query->where('status', "$status");
        }
        if (request('order_by')) {
            $query =  $query->orderBy('id', request('order_by'));
        }
        if (request('workout')) {
            $query =  $query->where('workout_id', request('workout'));
        }
        if (request('start_date') != '' || request('end_date') != '') {
            $endDate = request('end_date') ? request('end_date') : date('Y-m-d');
            $query =  $query->whereBetween('enroll_date', [request('start_date'), $endDate]);
        }
        if (request('par-page')) {
            $query =  $query->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $query =  $query->paginate(20);
        }

        $query->appends(request()->query());
        return $query;
    }

    public function getMessages()
    {
        $messages = WorkoutContact::orderBy('id', 'desc')->where('workout_id', '!=', null)->paginate(20);
        return $messages;
    }

    public function deleteMessage($id)
    {
        $message = WorkoutContact::find($id);
        return $message->delete();
    }
}
