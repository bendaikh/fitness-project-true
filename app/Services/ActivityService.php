<?php

namespace App\Services;


use App\Models\Activity;
use App\Models\ActivityTranslation;
use Illuminate\Http\Request;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class ActivityService
{
    use GenerateTranslationTrait;
    protected $activity;

    public function __construct(Activity $activity)
    {
        $this->activity = $activity;
    }

    public function getAllActivities()
    {
        $query = $this->activity;

        if (request('keyword')) {
            $query = $query->where(function ($q) {

                $q->whereHas('translation', function ($q) {
                    $q->where('name', 'like', '%' . request('keyword') . '%');
                });
            });
        }


        if (request()->get('status') != '') {
            $query->where('status', request('status'));
        }
        if (request('order_by')) {
            $query->orderBy('id', request('order_by'));
        }

        return $query;
    }


    public function getActivity($id)
    {
        return $this->activity->find($id);
    }
    public function createActivity(Request $request)
    {
        $data = $request->except("_token");
        $activity = $this->activity->create($data);

        // Generate translations
        $this->generateTranslations(
            TranslationModels::Activity,
            $activity,
            'activity_id',
            $request,
        );

        return $activity;
    }

    public function updateActivity(Request $request, $id)
    {
        $activity = $this->activity->find($id);
        $activity->update($request->all());

        $this->updateTranslations(
            $activity,
            $request,
            $request->all(),
        );
    }

    public function createActivityTranslation($activity_id, $name)
    {
        $data = [
            'activity_id' => $activity_id,
            'name' => $name,
            'lang_code' => 'en'
        ];
        ActivityTranslation::create($data);
    }

    public function updateActivityTranslation($activity_id, $name)
    {
        $data = [
            'name' => $name,
        ];
        ActivityTranslation::where('activity_id', $activity_id)->update($data);
    }
}
