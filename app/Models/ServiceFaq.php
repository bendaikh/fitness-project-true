<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceFaq extends Model
{
    use HasFactory;

    protected $table = 'service_faqs';
    protected $fillable = [
        'service_id',
    ];

    public function translation(): ?HasOne
    {
        return $this->hasOne(ServiceFaqTranslation::class)->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code): ?ServiceFaqTranslation
    {
        return $this->hasOne(ServiceFaqTranslation::class)->where('lang_code', $code)->first();
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(ServiceFaqTranslation::class, 'service_faq_id');
    }

    public function getQuestionAttribute(): ?string
    {
        return $this->translation?->question;
    }

    public function getAnswerAttribute(): ?string
    {
        return $this->translation?->answer;
    }

    public function service(): ?BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
