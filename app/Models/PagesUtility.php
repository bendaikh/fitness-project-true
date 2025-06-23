<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PagesUtility extends Model
{
    use HasFactory;
    protected $fillable = [
        'login_image',
        'register_image',
        'forget_password_image',
        'reset_password_image',
        'footer_app_button_status',
        'cta_link',
        'cta_icon',
        'price_range',
        'experience_image',
        'class_time_image',
    ];

    public function getAwardTitleAttribute()
    {
        return $this->translation?->award_title;
    }
    public function getServiceTitleAttribute()
    {
        return $this->translation?->service_title;
    }
    public function getFaqTitleAttribute()
    {
        return $this->translation?->faq_title;
    }
    public function getMembershipTitleAttribute()
    {
        return $this->translation?->membership_title;
    }
    public function getCtaButtonAttribute()
    {
        return $this->translation?->cta_button;
    }
    public function getFooterDescriptionAttribute()
    {
        return $this->translation?->footer_description;
    }

    public function getFooterCopyrightAttribute()
    {
        return $this->translation?->footer_copyright;
    }
    public function getFooterMenuTitleAttribute()
    {
        return $this->translation?->footer_menu_title;
    }
    public function getAppDownloadNowAttribute()
    {
        return $this->translation?->app_download_now_text;
    }

    public function getTimeTableTitleAttribute()
    {
        return $this->translation?->time_table_title;
    }

    public function getExperienceTitleAttribute()
    {
        return $this->translation?->time_table_title;
    }

    public function translation(): ?HasOne
    {
        return $this->hasOne(PagesUtilityTranslation::class, 'pages_utility_id')->where('lang_code', getSessionLanguage());
    }
    public function getTranslation($code): ?PagesUtilityTranslation
    {
        return $this->hasOne(PagesUtilityTranslation::class)->where('lang_code', $code)->first();
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(PagesUtilityTranslation::class, 'pages_utility_id');
    }
    public function getLoginImageAttribute($value)
    {
        return $value ? asset($value) : null;
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            try {
                if ($model->translations) {
                    $model->translations()->each(function ($translation) {
                        $translation->page()->dissociate();
                        $translation->delete();
                    });
                }
            } catch (\Throwable $th) {
                if (app()->isLocal()) {
                    Log::error($th);
                }

                $notification = __('Unable to delete as relational data exists!');
                $notification = ['message' => $notification, 'alert-type' => 'error'];
                return redirect()->back()->with($notification);
            }
        });

        static::saved(function () {
            Cache::forget('PagesUtility');
        });

        static::created(function () {
            Cache::forget('PagesUtility');
        });

        static::updated(function () {
            Cache::forget('PagesUtility');
        });

        static::deleted(function () {
            Cache::forget('PagesUtility');
        });
    }
}
