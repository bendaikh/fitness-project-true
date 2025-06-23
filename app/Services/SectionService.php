<?php

namespace App\Services;

use App\Models\SectionControl;
use Illuminate\Support\Facades\Cache;

class SectionService
{
    public function getSection()
    {

        // store in cache
        if (Cache::has('section_visibility')) {
            return Cache::get('section_visibility');
        }

        else{
            $section = SectionControl::select(['value', 'key'])->get()->toArray();

            $section_visibility = [];
            foreach ($section as $key => $value) {
                $section_visibility[$value['value']] = $value['key'];
            }

            $section = (object) $section_visibility;

            // cache foreaver
            Cache::forever('section_visibility', $section);

            return $section;
        }
    }
}
