<?php

namespace App\Services;

use App\Enums\DefaultImages;
use App\Models\Counter;
use App\Models\CounterTranslation;
use App\Models\Homepage;
use App\Traits\RedirectHelperTrait;
use Illuminate\Support\Facades\File;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class HomepageUpdatingService
{
    use GenerateTranslationTrait, RedirectHelperTrait;

    public function createHomepage($request): ?Homepage
    {
        $homepage = new Homepage();
        $homepage->home = $request->home;
        $homepage->save();
        $this->generateTranslations(TranslationModels::Homepage, $homepage, 'home_page_id', $request);
        return $homepage;
    }

    public function updateAboutSection($request, $homepage): void
    {

        $homepage->update($request->except('about_us_image', 'about_us_bg_shape_1', 'about_us_bg_shape_2', 'about_us_images'));

        if ($homepage && $request->hasFile('about_us_image')) {
            if ($homepage->about_us_image) {
                if (@File::exists(public_path($homepage->about_us_image))) {
                    @unlink(public_path($homepage->about_us_image));
                }
            }
            $file_name = file_upload($request->about_us_image, null, 'uploads/custom-images/');
            $homepage->about_us_image = $file_name;
            $homepage->save();
        }

        if ($homepage && $request->hasFile('about_us_bg_shape_1')) {
            if ($homepage->about_us_bg_shape_1) {
                if (@File::exists(public_path($homepage->about_us_bg_shape_1))) {
                    @unlink(public_path($homepage->about_us_bg_shape_1));
                }
            }
            $file_name = file_upload($request->about_us_bg_shape_1, null, 'uploads/custom-images/');
            $homepage->about_us_bg_shape_1 = $file_name;
            $homepage->save();
        }

        if ($homepage && $request->hasFile('about_us_bg_shape_2')) {
            if ($homepage->about_us_bg_shape_2) {
                if (@File::exists(public_path($homepage->about_us_bg_shape_2))) {
                    @unlink(public_path($homepage->about_us_bg_shape_2));
                }
            }
            $file_name = file_upload($request->about_us_bg_shape_2, null, 'uploads/custom-images/');
            $homepage->about_us_bg_shape_2 = $file_name;
            $homepage->save();
        }


        if ($request->image && count($request->image) > 0) {
            $homepageImgList = $homepage->about_us_images;

            $arrayKey = array_keys($request->image);


            if ($homepageImgList && count($homepageImgList) > 0) {
                foreach ($homepageImgList as $key => $homepageImg) {

                    if (in_array($key, $arrayKey)) {
                        if (@File::exists(public_path($homepageImg))) {
                            @unlink(public_path($homepageImg));
                        }

                        $homepageImgList[$key] = 'img';
                    }
                }
            }

            $imageList = $homepageImgList;
            foreach ($request->image as $index => $image) {
                $file_name = file_upload($request->image[$index], null, 'uploads/custom-images/');
                $imageList[$index] = $file_name;
            }
            $homepage->about_us_images = $imageList;
            $homepage->save();
        }

        $this->updateTranslations($homepage, $request, $request->only('about_us_title', 'about_us_inner_title',  'about_us_sub_title', 'about_us_description_list', 'about_us_button_text', 'code'));
    }

    public function updateAboutHome2Section($request, $homepage): void
    {
        $homepage->update($request->except('about_us_image'));

        if ($homepage && $request->hasFile('about_us_image')) {
            if ($homepage->about_us_image) {
                if (@File::exists(public_path($homepage->about_us_image))) {
                    @unlink(public_path($homepage->about_us_image));
                }
            }
            $file_name = file_upload($request->about_us_image, null, 'uploads/custom-images/');
            $homepage->about_us_image = $file_name;
            $homepage->save();
        }

        $this->updateTranslations($homepage, $request, $request->only('about_us_title', 'about_us_description', 'about_us_button_text', 'code'));
    }

    public function updateRatingSection($request, $homepage): void
    {
        $homepage->update($request->except('rating_section_image'));

        if ($homepage && $request->hasFile('rating_section_image')) {
            if ($homepage->rating_section_image && !in_array($homepage->rating_section_image, DefaultImages::getAllHomepageImages())) {
                if (@File::exists(public_path($homepage->rating_section_image))) {
                    @unlink(public_path($homepage->rating_section_image));
                }
            }
            $file_name = file_upload($request->rating_section_image, null, 'uploads/custom-images/');
            $homepage->rating_section_image = $file_name;
            $homepage->save();
        }

        $this->updateTranslations($homepage, $request, $request->only('rating_section_title', 'rating_section_subtitle', 'code'));
    }

    public function updateFeatureSection($request, $homepage): void
    {
        $homepage->update($request->except('feature_section_element_1_icon', 'feature_section_element_2_icon', 'feature_section_element_3_icon', 'feature_section_element_4_icon'));

        if ($homepage && $request->hasFile('feature_section_element_1_icon')) {
            if ($homepage->feature_section_element_1_icon && !in_array($homepage->feature_section_element_1_icon, DefaultImages::getAllHomepageImages())) {
                if (@File::exists(public_path($homepage->feature_section_element_1_icon))) {
                    @unlink(public_path($homepage->feature_section_element_1_icon));
                }
            }
            $file_name = file_upload($request->feature_section_element_1_icon, null, 'uploads/custom-images/');
            $homepage->feature_section_element_1_icon = $file_name;
            $homepage->save();
        }
        if ($homepage && $request->hasFile('feature_section_element_2_icon')) {
            if ($homepage->feature_section_element_2_icon && !in_array($homepage->feature_section_element_2_icon, DefaultImages::getAllHomepageImages())) {
                if (@File::exists(public_path($homepage->feature_section_element_2_icon))) {
                    @unlink(public_path($homepage->feature_section_element_2_icon));
                }
            }
            $file_name = file_upload($request->feature_section_element_2_icon, null, 'uploads/custom-images/');
            $homepage->feature_section_element_2_icon = $file_name;
            $homepage->save();
        }
        if ($homepage && $request->hasFile('feature_section_element_3_icon')) {
            if ($homepage->feature_section_element_3_icon && !in_array($homepage->feature_section_element_3_icon, DefaultImages::getAllHomepageImages())) {
                if (@File::exists(public_path($homepage->feature_section_element_3_icon))) {
                    @unlink(public_path($homepage->feature_section_element_3_icon));
                }
            }
            $file_name = file_upload($request->feature_section_element_3_icon, null, 'uploads/custom-images/');
            $homepage->feature_section_element_3_icon = $file_name;
            $homepage->save();
        }
        if ($homepage && $request->hasFile('feature_section_element_4_icon')) {
            if ($homepage->feature_section_element_4_icon && !in_array($homepage->feature_section_element_4_icon, DefaultImages::getAllHomepageImages())) {
                if (@File::exists(public_path($homepage->feature_section_element_4_icon))) {
                    @unlink(public_path($homepage->feature_section_element_4_icon));
                }
            }
            $file_name = file_upload($request->feature_section_element_4_icon, null, 'uploads/custom-images/');
            $homepage->feature_section_element_4_icon = $file_name;
            $homepage->save();
        }

        $this->updateTranslations($homepage, $request, $request->only('feature_section_title', 'feature_section_subtitle', 'feature_section_element_1_title', 'feature_section_element_1_subtitle', 'feature_section_element_2_title', 'feature_section_element_2_subtitle', 'feature_section_element_3_title', 'feature_section_element_3_subtitle', 'feature_section_element_4_title', 'feature_section_element_4_subtitle'));
    }

    public function updateListingSection($request, $homepage): void
    {
        $homepage->update($request->all());

        $this->updateTranslations($homepage, $request, $request->only('listing_section_title', 'listing_section_subtitle', 'code'));
    }

    public function updateFamousCitySection($request, $homepage): void
    {
        $homepage->update($request->all());

        $this->updateTranslations($homepage, $request, $request->only('famous_city_section_title', 'famous_city_section_subtitle', 'code'));
    }

    public function updateWorkingProcessSection($request, $homepage): void
    {
        $img = $homepage->working_process_section_image;
        $homepage->update($request->all());

        if ($homepage && $request->hasFile('working_process_section_image')) {
            if ($homepage->working_process_section_image && !in_array($homepage->working_process_section_image, DefaultImages::getAllHomepageImages())) {
                file_delete($img);
            }
            $file_name = file_upload($request->working_process_section_image, null, 'uploads/custom-images/');
            $homepage->working_process_section_image = $file_name;
            $homepage->save();
        }

        $this->updateTranslations($homepage, $request, $request->only('working_process_section_title', 'working_process_section_subtitle', 'working_process_section_description', 'code'));
    }

    public function updateFamousListingSection($request, $homepage): void
    {
        $homepage->update($request->all());

        $this->updateTranslations($homepage, $request, $request->only('famous_listing_section_title', 'famous_listing_section_subtitle', 'code'));
    }

    public function updateTestimonialSection($request, $homepage)
    {
        $img = $homepage->testimonial_image;
        $homepage->update($request->all());

        if ($homepage && $request->hasFile('testimonial_image')) {
            if ($homepage->testimonial_image) {
                file_delete($img);
            }
            $file_name = file_upload($request->testimonial_image, null, 'uploads/custom-images/');
            $homepage->testimonial_image = $file_name;
            $homepage->save();
        }
    }

    public function updateCounterSection($request, $homepage): void
    {
        $homepage->update($request->only('counter_section_link', 'counter_section_status'));
        if ($homepage && $request->hasFile('counter_section_image')) {
            if ($homepage->counter_section_image && !in_array($homepage->counter_section_image, DefaultImages::getAllHomepageImages())) {
                if (@File::exists(public_path($homepage->counter_section_image))) {
                    @unlink(public_path($homepage->counter_section_image));
                }
            }
            $file_name = file_upload($request->counter_section_image, null, 'uploads/custom-images/');
            $homepage->counter_section_image = $file_name;
            $homepage->save();
        }

        if ($request->code == allLanguages()->first()->code) {
            foreach ($request->ids as $index => $request_item) {
                $counter = Counter::find($request->ids[$index]);
                if ($request->hasFile('icon_' . $request->ids[$index])) {
                    if ($counter->icon && !in_array($counter->icon, DefaultImages::getAllCounterImages())) {
                        if (@File::exists(public_path($counter->icon))) {
                            @unlink(public_path($counter->icon));
                        }
                    }
                    $req_file_name = 'icon_' . $request->ids[$index];
                    $file_name = file_upload($request->$req_file_name, '', 'uploads/custom-images/');
                    $counter->icon = $file_name;
                }

                $counter->qty = $request->qtys[$index];
                $counter->save();
            }
        }

        foreach ($request->titles as $index => $title) {
            $translate = CounterTranslation::where([
                'id' => $request->trans_ids[$index],
                'lang_code' => $request->code,
            ])->first();

            $translate->title = $request->titles[$index];
            $translate->save();
        }
    }

    public function updateNewsSection($request, $homepage): void
    {
        $homepage->update($request->all());

        $this->updateTranslations($homepage, $request, $request->only('news_section_title', 'news_section_subtitle', 'code'));
    }

    public function updateTeamSection($request, $homepage): void
    {
        $img = $homepage->team_bg_image;
        $homepage->update($request->all());

        if ($homepage && $request->hasFile('team_bg_image')) {
            if ($homepage->team_bg_image) {
                file_delete($img);
            }
            $file_name = file_upload($request->team_bg_image, null, 'uploads/custom-images/');
            $homepage->team_bg_image = $file_name;
            $homepage->save();
        }

        $this->updateTranslations($homepage, $request, $request->only('team_title', 'code'));
    }

    public function updateVideoSection($request, $homepage): void
    {
        $img = $homepage->video_bg_image;
        $homepage->update($request->all());

        if ($homepage && $request->hasFile('video_bg_image')) {
            if ($homepage->video_bg_image) {
                file_delete($img);
            }
            $file_name = file_upload($request->video_bg_image, null, 'uploads/custom-images/');
            $homepage->video_bg_image = $file_name;
            $homepage->save();
        }

        $this->updateTranslations($homepage, $request, $request->only('video_section_title', 'code'));
    }


    public function updatePricingHome2Section($request, $homepage): void
    {
        $img = $homepage->pricing_image;
        $homepage->update($request->all());

        if ($homepage && $request->hasFile('pricing_image')) {
            if ($homepage->pricing_image) {
                file_delete($img);
            }
            $file_name = file_upload($request->pricing_image, null, 'uploads/custom-images/');
            $homepage->pricing_image = $file_name;
            $homepage->save();
        }

        $this->updateTranslations($homepage, $request, $request->only('pricing_title', 'pricing_description', 'code'));
    }
}
