<?php

namespace App\Services;

use App\Models\ClassActivity;
use App\Models\Classes;
use App\Models\ClassTrainer;
use App\Models\Workout;
use App\Models\WorkoutTrainer;
use App\Services\WorkoutService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class ClassService
{
    use GenerateTranslationTrait;
    public function __construct(
        private ClassActivity $classActivity,
        private ClassTrainer $classTrainer,
        private WorkoutTrainer $workoutTrainer,
        private Classes $classes,
        private WorkoutService $workoutService,

    ) {}

    public function allClasses()
    {
        $query = $this->classes->with(['trainers']);

        if (request('keyword')) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . request('keyword') . '%');
                $q->orWhereHas('workout.translation', function ($q) {
                    $q->where('name', 'like', '%' . request('keyword') . '%');
                });
                $q->orWhereHas('trainers', function ($q) {
                    $q->whereHas('user', function ($q) {
                        $q->where('name', 'like', '%' . request('keyword') . '%');
                    });
                });
            });
        }

        if (request()->get('status') != '') {
            $status = request('status');

            $query->where('status', "$status");
        }
        if (request('order_by')) {
            $query->orderBy('id', request('order_by'));
        }

        return $query;
    }

    public function getClassById(int $id)
    {
        return $this->classes->with(['trainers'])->find($id);
    }
    public function createClass(Request $request)
    {
        $class = $this->classes->create($request->all());

        $class->update([
            'day' => now()->parse($request->date)->format('l'),
        ]);
        foreach ($request->activity_id as $activity) {
            // create class activities
            $this->classActivity->create([
                'class_id' => $class->id,
                'activity_id' => $activity,
            ]);
        }


        foreach ($request->trainer_id as $trainer) {
            // create class trainers
            $this->classTrainer->create([
                'class_id' => $class->id,
                'trainer_id' => $trainer,
            ]);


            // if trainer is not already in workout trainers
            $workout = $this->workoutTrainer->where('workout_id', $request->workout_id)->where('trainer_id', $trainer)->first();

            if (!$workout) {
                // create workout trainers
                $this->workoutTrainer->create([
                    'workout_id' => $request->workout_id,
                    'trainer_id' => $trainer,
                ]);
            }
        }


        // Generate translations
        $this->generateTranslations(
            TranslationModels::Classes,
            $class,
            'class_id',
            $request,
        );

        return $class;
    }

    public function updateClass(Request $request, int $id)
    {
        $class = $this->classes->find($id);

        $data = $request->all();
        if ($request->date) $data['day'] = now()->parse($request->date)->format('l');

        // update class
        $class->update($data);

        if ($request->code == allLanguages()->first()->code) {
            // delete all class activities
            $this->classActivity->where('class_id', $class->id)->delete();

            // create class activities
            foreach ($request->activity_id as $activity) {
                $this->classActivity->create([
                    'class_id' => $class->id,
                    'activity_id' => $activity,
                ]);
            }

            // delete all class trainers

            $this->classTrainer->where('class_id', $class->id)->delete();

            // delete all workout trainers
            $this->workoutTrainer->where('workout_id', $class->workout_id)->delete();

            // create class trainers
            foreach ($request->trainer_id as $trainer) {
                $this->classTrainer->create([
                    'class_id' => $class->id,
                    'trainer_id' => $trainer,
                ]);

                // if trainer is not already in workout trainers
                $workout = $this->workoutTrainer->where('workout_id', $request->workout_id)->where('trainer_id', $trainer)->first();

                if (!$workout) {
                    // create workout trainers
                    $this->workoutTrainer->create([
                        'workout_id' => $request->workout_id,
                        'trainer_id' => $trainer,
                    ]);
                }
            }
        }

        // Generate translations
        $this->updateTranslations(
            $class,
            $request,
            $request->all(),
        );


        return $class;
    }

    public function deleteClass(int $id)
    {
        $class = $this->classes->find($id);

        // delete all class activities

        $this->classActivity->where('class_id', $class->id)->delete();


        // pluck trainer ids
        $trainerIds = $this->classTrainer->where('class_id', $class->id)->pluck('trainer_id')->toArray();
        // delete all class trainers

        $this->classTrainer->where('class_id', $class->id)->delete();

        // delete all workout trainers

        $this->workoutTrainer->where('workout_id', $class->workout_id)->whereIn('trainer_id', $trainerIds)->delete();

        // delete all translations

        $class->translations()->delete();

        $class->delete();
        return $class;
    }

    public function getClassActivities(int $classId): Collection
    {
        return $this->classActivity->where('class_id', $classId)->get();
    }

    public function getClassTrainers(int $classId): Collection
    {
        return $this->classTrainer->where('class_id', $classId)->get();
    }

    public function getWorkoutTrainers(int $workoutId): Collection
    {
        return $this->workoutTrainer->where('workout_id', $workoutId)->get();
    }
}
