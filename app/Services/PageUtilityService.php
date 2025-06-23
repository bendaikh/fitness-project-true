<?php

namespace App\Services;


use App\Models\PagesUtility;

class PageUtilityService
{
    public function getPageUtility()
    {
        $utility = cache()->get('pageUtility');

        if(!$utility){
            $utility = PagesUtility::first();
            cache()->forever('pageUtility', $utility);
        }

        return $utility;
    }
}