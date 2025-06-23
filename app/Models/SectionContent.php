<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SectionContent extends Model
{
    use HasFactory;

    public function translation(): ?HasOne
    {
        return $this->hasOne(SectionContentTranslation::class, 'section_content_id')->where('lang_code', getSessionLanguage());
    }
    public function getTranslation($code): ?SectionContentTranslation
    {
        return $this->hasOne(SectionContentTranslation::class)->where('lang_code', $code)->first();
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(SectionContentTranslation::class, 'section_content_id');
    }
}
