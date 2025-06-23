<?php

namespace App\Services;

use App\Enums\DefaultImages;
use App\Models\PagesUtility;
use App\Traits\RedirectHelperTrait;
use Illuminate\Support\Facades\File;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class PageUtilityUpdatingService
{
    use RedirectHelperTrait, GenerateTranslationTrait;

    public function createFooter($request)
    {
        $footer = new PagesUtility();
        $footer->save();
        $this->generateTranslations(TranslationModels::PagesUtility, $footer, 'pages_utility_id', $request);
        return $footer;
    }
    public function updateFooterSection($request, $footer)
    {
        $footer->update($request->all());

        $this->updateTranslations($footer, $request, $request->only('footer_copyright', 'app_download_now_text'));
    }
    public function updateAuthSection($request, $footer)
    {
        $footer->update($request->except('login_image', 'register_image', 'forget_password_image', 'reset_password_image'));
        if ($footer && $request->hasFile('login_image')) {
            if ($footer->login_image && !in_array($footer->login_image, DefaultImages::getAllAuthImages())) {
                if (@File::exists(public_path($footer->login_image))) {
                    @unlink(public_path($footer->login_image));
                }
            }
            $file_name = file_upload($request->login_image, null, 'uploads/custom-images/');
            $footer->login_image = $file_name;
            $footer->save();
        }

        if ($footer && $request->hasFile('register_image')) {
            if ($footer->register_image && !in_array($footer->register_image, DefaultImages::getAllAuthImages())) {
                if (@File::exists(public_path($footer->register_image))) {
                    @unlink(public_path($footer->register_image));
                }
            }
            $file_name = file_upload($request->register_image, null, 'uploads/custom-images/');
            $footer->register_image = $file_name;
            $footer->save();
        }

        if ($footer && $request->hasFile('forget_password_image')) {
            if ($footer->forget_password_image && !in_array($footer->forget_password_image, DefaultImages::getAllAuthImages())) {
                if (@File::exists(public_path($footer->forget_password_image))) {
                    @unlink(public_path($footer->forget_password_image));
                }
            }
            $file_name = file_upload($request->forget_password_image, null, 'uploads/custom-images/');
            $footer->forget_password_image = $file_name;
            $footer->save();
        }

        if ($footer && $request->hasFile('reset_password_image')) {
            if ($footer->reset_password_image && !in_array($footer->reset_password_image, DefaultImages::getAllAuthImages())) {
                if (@File::exists(public_path($footer->reset_password_image))) {
                    @unlink(public_path($footer->reset_password_image));
                }
            }
            $file_name = file_upload($request->reset_password_image, null, 'uploads/custom-images/');
            $footer->reset_password_image = $file_name;
            $footer->save();
        }
    }


    public function updateCallToActionSection($request, $cta)
    {
        $cta->update($request->all());

        $this->updateTranslations($cta, $request, $request->only('cta_button'));
    }

    public function updateShopPage($request, $page)
    {
        $page->update($request->all());
    }

    public function updateTrainerSection($request, $trainer)
    {
        $trainer->update($request->except('experience_image', 'class_time_image'));
        if ($trainer && $request->hasFile('experience_image')) {
            if ($trainer->experience_image) {
                if (@File::exists(public_path($trainer->experience_image))) {
                    @unlink(public_path($trainer->experience_image));
                }
            }
            $file_name = file_upload($request->experience_image, null, 'uploads/custom-images/');
            $trainer->experience_image = $file_name;
            $trainer->save();
        }
        if ($trainer && $request->hasFile('class_time_image')) {
            if ($trainer->class_time_image) {
                if (@File::exists(public_path($trainer->class_time_image))) {
                    @unlink(public_path($trainer->class_time_image));
                }
            }
            $file_name = file_upload($request->class_time_image, null, 'uploads/custom-images/');
            $trainer->class_time_image = $file_name;
            $trainer->save();
        }

        $this->updateTranslations($trainer, $request, $request->only('experience_title', 'time_table_title'));
    }
    public function updateServiceSection($request, $service)
    {
        $service->update($request->all());

        $this->updateTranslations($service, $request, $request->only('service_title',));
    }
    public function updateAwardSection($request, $award)
    {
        $award->update($request->all());

        $this->updateTranslations($award, $request, $request->only('award_title',));
    }
    public function updateFaqSection($request, $faq)
    {
        $faq->update($request->all());

        $this->updateTranslations($faq, $request, $request->only('faq_title',));
    }
    public function updateMemberSection($request, $member)
    {
        $member->update($request->all());

        $this->updateTranslations($member, $request, $request->only('membership_title',));
    }
}
