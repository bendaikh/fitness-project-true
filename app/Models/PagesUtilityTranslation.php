<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesUtilityTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['lang_code', 'footer_description', 'footer_copyright', 'footer_menu_title', 'app_download_now_text', 'cta_button', 'experience_title', 'time_table_title', 'membership_title', 'service_title', 'award_title', 'faq_title'];



    public function pagesUtility()
    {
        return $this->belongsTo(PagesUtility::class, 'pages_utility_id');
    }
}
