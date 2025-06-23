<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Modules\GlobalSetting\app\Enums\WebsiteSettingEnum;

if(!function_exists('carbonNowWithTimeZone')){
    function carbonNowWithTimeZone()
    {
        return WebsiteSettingEnum::now();
    }
}

if (!function_exists('timezone')) {
    function timezone()
    {
        return Cache::has('setting') ? Cache::get('setting')->timezone ?? config('app.timezone') : config('app.timezone');
    }
}

if (!function_exists('timeFormat')) {
    function timeFormat()
    {
        return Cache::has('setting') ? Cache::get('setting')->time_format ?? 'h:i A' : 'h:i A';
    }
}

if (!function_exists('dateFormat')) {
    function dateFormat()
    {
        return Cache::has('setting') ? Cache::get('setting')->date_format ?? 'Y-m-d' : 'Y-m-d';
    }
}

if (!function_exists('formattedDate')) {
    function formattedDate($date)
    {
        return $date instanceof Carbon ? $date->setTimezone(timezone())->format(dateFormat()) : Carbon::parse($date)->setTimezone(timezone())->format(dateFormat());
    }
}

if (!function_exists('formattedTime')) {
    function formattedTime($time)
    {
        return $time instanceof Carbon ? $time->setTimezone(timezone())->format(timeFormat()) : Carbon::parse($time)->setTimezone(timezone())->format(timeFormat());
    }
}


if (!function_exists('formattedDateTime')) {
    function formattedDateTime($datetime)
    {
        return formattedDate($datetime) . ' - ' . formattedTime($datetime);
    }
}
