<?php


namespace App\Services;

use App\Models\About;
use App\Traits\RedirectHelperTrait;
use Illuminate\Support\Facades\File;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class AboutPageUpdatingService
{
    use RedirectHelperTrait, GenerateTranslationTrait;
    public function createAboutPage($request)
    {
        $aboutPage = new About();
        $aboutPage->save();
        $this->generateTranslations(TranslationModels::About, $aboutPage, 'about_id', $request);
        return $aboutPage;
    }

    public function updateAboutSection($request, $aboutPage)
    {
        $aboutPage->update($request->except('about_us_image'));

        if ($aboutPage && $request->hasFile('image')) {
            if ($aboutPage->image) {
                if (@File::exists(public_path($aboutPage->about_us_image))) {
                    @unlink(public_path($aboutPage->about_us_image));
                }
            }
            $file_name = file_upload($request->image, null, 'uploads/custom-images/');
            $aboutPage->about_us_image = $file_name;
            $aboutPage->save();
        }
        $this->updateTranslations($aboutPage, $request, $request->only('title', 'about_us_title', 'about_us_button_text', 'about_us_description', 'code'));
    }


    public function updateChooseUsSection($request, $aboutPage)
    {
        $aboutPage->update($request->except('choose_us_image_1', 'choose_us_image_2'));

        if ($aboutPage && $request->hasFile('choose_us_image_1')) {
            if ($aboutPage->choose_us_image_1) {
                if (@File::exists(public_path($aboutPage->choose_us_image_1))) {
                    @unlink(public_path($aboutPage->choose_us_image_1));
                }
            }
            $file_name = file_upload($request->choose_us_image_1, null, 'uploads/custom-images/');
            $aboutPage->choose_us_image_1 = $file_name;
            $aboutPage->save();
        }

        if ($aboutPage && $request->hasFile('choose_us_image_2')) {
            if ($aboutPage->choose_us_image_2) {
                if (@File::exists(public_path($aboutPage->choose_us_image_2))) {
                    @unlink(public_path($aboutPage->choose_us_image_2));
                }
            }
            $file_name = file_upload($request->choose_us_image_2, null, 'uploads/custom-images/');
            $aboutPage->choose_us_image_2 = $file_name;
            $aboutPage->save();
        }
        $this->updateTranslations($aboutPage, $request, $request->only('choose_us_title', 'choose_us_button_text', 'choose_us_description', 'code'));
    }

    public function updateSupportUsSection($request, $aboutPage)
    {
        $aboutPage->update($request->except('support_us_image'));

        if ($aboutPage && $request->hasFile('support_us_image')) {
            if ($aboutPage->support_us_image) {
                if (@File::exists(public_path($aboutPage->support_us_image))) {
                    @unlink(public_path($aboutPage->support_us_image));
                }
            }
            $file_name = file_upload($request->support_us_image, null, 'uploads/custom-images/');
            $aboutPage->support_us_image = $file_name;
            $aboutPage->save();
        }
        $this->updateTranslations($aboutPage, $request, $request->only('support_us_title', 'support_us_button_text', 'support_us_description', 'code'));
    }

    public function updateExerciseSection($request, $aboutPage)
    {
        $aboutPage->update($request->except('exercise_image'));

        if ($aboutPage && $request->hasFile('exercise_image')) {
            if ($aboutPage->exercise_image) {
                if (@File::exists(public_path($aboutPage->exercise_image))) {
                    @unlink(public_path($aboutPage->exercise_image));
                }
            }
            $file_name = file_upload($request->exercise_image, null, 'uploads/custom-images/');
            $aboutPage->exercise_image = $file_name;
            $aboutPage->save();
        }
        $this->updateTranslations($aboutPage, $request, $request->only('exercise_title', 'exercise_description', 'code'));
    }
    public function updateTeamSection($request, $aboutPage)
    {
        $aboutPage->update($request->except('team_image'));

        if ($aboutPage && $request->hasFile('team_image')) {
            if ($aboutPage->team_image) {
                if (@File::exists(public_path($aboutPage->team_image))) {
                    @unlink(public_path($aboutPage->team_image));
                }
            }
            $file_name = file_upload($request->team_image, null, 'uploads/custom-images/');
            $aboutPage->team_image = $file_name;
            $aboutPage->save();
        }
        $this->updateTranslations($aboutPage, $request, $request->only('team_title', 'code'));
    }
    public function updateTestimonialSection($request, $aboutPage)
    {
        $aboutPage->update($request->except('testimonial_image'));

        if ($aboutPage && $request->hasFile('testimonial_image')) {
            if ($aboutPage->testimonial_image) {
                if (@File::exists(public_path($aboutPage->testimonial_image))) {
                    @unlink(public_path($aboutPage->testimonial_image));
                }
            }
            $file_name = file_upload($request->testimonial_image, null, 'uploads/custom-images/');
            $aboutPage->testimonial_image = $file_name;
            $aboutPage->save();
        }
    }
}
