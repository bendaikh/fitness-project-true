<?php

namespace App\Services;

use App\Models\HomePageSlider;
use Illuminate\Http\Request;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class HomePageService
{
    use GenerateTranslationTrait;
    public function __construct(private HomePageSlider $homeSlider) {}

    public function sliderList()
    {
        $sliders = $this->homeSlider->orderBy('order', 'asc')->with('translation');
        return $sliders;
    }
    public function sliderStore(Request $request)
    {
        $ids = array_keys($request->slider_title);
        $prevSlider = $this->homeSlider->where('home_page', $request->home_page)->whereNotIn('id', $ids)->get();

        foreach ($prevSlider as $slider) {

            // remove translation for slider
            $slider->translations()->delete();

            // delete slider image
            if ($slider->image) {
                file_delete($slider->image);
            }

            $slider->delete();
        }

        foreach ($request->slider_title as $key => $homepage) {
            $homepage = $this->homeSlider->where('id', $key)->where('home_page', $request->home_page)->first();

            $data = [];
            if (isset($request->slider_image[$key])) {
                $oldImage = $homepage?->image;
                $data['image'] = file_upload($request->slider_image[$key], $oldImage, 'uploads/custom-images/home-page-slider/');
            }
            if (isset($request->slider_title[$key])) {
                $data['title'] = $request->slider_title[$key];
            }
            if (isset($request->slider_subtitle_1[$key])) {
                $data['subtitle_1'] = $request->slider_subtitle_1[$key];
            }
            if (isset($request->slider_subtitle_2[$key])) {
                $data['subtitle_2'] = $request->slider_subtitle_2[$key];
            }
            if (isset($request->button_text[$key])) {
                $data['button_text'] = $request->button_text[$key];
            }
            if (isset($request->button_link[$key])) {
                $data['button_link'] = $request->button_link[$key];
            }
            if (isset($request->button_icon[$key])) {
                $data['button_icon'] = $request->button_icon[$key];
            }
            if (isset($request->status[$key])) {
                $data['status'] = $request->status[$key];
            }
            if (isset($request->order[$key])) {
                $data['order'] = $request->order[$key];
            }
            $data['code'] = $request->code;
            $data['home_page'] = $request->home_page;


            $newRequest = new Request($data);

            if ($homepage == null) {
                // create new request for new slider
                $slider = $this->homeSlider->create($newRequest->all());

                $this->generateTranslations(
                    TranslationModels::HomePageSlider,
                    $slider,
                    'home_page_slider_id',
                    $newRequest,
                );
            } else {
                // update slider
                $homepage->update($newRequest->all());

                // Generate translations
                $this->updateTranslations(
                    $homepage,
                    $newRequest,
                    $newRequest->all(),
                );
            }
        }
    }
}
