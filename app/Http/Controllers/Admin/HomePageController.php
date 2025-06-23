<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Models\HomePage;
use App\Models\HomePageSlider;
use App\Services\HomePageService;
use App\Services\HomepageUpdatingService;
use App\Services\HomepageValidatingService;
use App\Traits\RedirectHelperTrait;
use Exception;
use Illuminate\Http\Request;
use Modules\Language\app\Models\Language;

class HomePageController extends Controller
{
    use RedirectHelperTrait;

    public function __construct(
        private HomePageService $homePageSlider,
        private HomepageUpdatingService $homepageUpdatingService,
        private HomepageValidatingService $homepageValidatingService
    ) {
        $this->middleware('auth:admin');
    }

    public function sliderList()
    {
        checkAdminHasPermissionAndThrowException('website.content.view');

        if (THEME == 'all') {
            return view('admin.pages.manage-home-page.slider-list');
        } else {
            return $this->sliderEdit(THEME);
        }
    }

    public function sliderEdit($home)
    {
        checkAdminHasPermissionAndThrowException('website.content.view');
        if ($home == 4) {
            $home = 1;
        }
        $sliders = HomePageSlider::with('translation')->where('home_page', $home)->get();

        return view('admin.pages.manage-home-page.slider-create', ['home' => $home, 'sliders' => $sliders]);
    }
    public function sliderStore(Request $request)
    {
        checkAdminHasPermissionAndThrowException('website.content.update');
        if (!$request->code) {
            $request->merge(['code' => getSessionLanguage()]);
        }
        $request->validate([
            'slider_image' => 'nullable|array',
            'slider_title' => 'required|array',
            'slider_subtitle_1' => 'required|array',
            'slider_subtitle_2' => 'nullable|array',
            'button_text' => 'nullable|array',
            'button_link' => 'nullable|array',
            'button_icon' => 'nullable',
            'home_page' => 'required',
            'status' => 'required|array',
        ]);
        $this->homePageSlider->sliderStore($request);
        try {
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.slider.list', [], ['message' => 'Slider Update successfully', 'alert-type' => 'success']);
        } catch (Exception $ex) {
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.slider.list', [], ['message' => 'Something went wrong', 'alert-type' => 'error']);
        }
    }
    public function homepage_1()
    {
        checkAdminHasPermissionAndThrowException('website.content.view');
        $code = request('code') ?? getSessionLanguage();
        if (!Language::where('code', $code)->exists()) {
            abort(404);
        }
        $home = HomePage::where('home', 1)->first();
        return view('admin.pages.manage-home-page.home-page-1', compact('home', 'code'));
    }

    public function homepage_2()
    {
        checkAdminHasPermissionAndThrowException('website.content.view');
        $code = request('code') ?? getSessionLanguage();
        if (!Language::where('code', $code)->exists()) {
            abort(404);
        }
        $home = HomePage::where('home', 2)->first();
        return view('admin.pages.manage-home-page.home-page-2', compact('home', 'code'));
    }

    public function homepage_3()
    {
        checkAdminHasPermissionAndThrowException('website.content.view');
        $code = request('code') ?? getSessionLanguage();
        if (!Language::where('code', $code)->exists()) {
            abort(404);
        }
        $home = HomePage::where('home', 3)->first();
        return view(
            'admin.pages.manage-home-page.home-page-3',
            compact('home', 'code')
        );
    }

    public function homepage_4()
    {
        checkAdminHasPermissionAndThrowException('website.content.view');
        return view('admin.pages.manage-home-page.home-page-4');
    }

    public function updateAboutContent(Request $request)
    {
        checkAdminHasPermissionAndThrowException('website.content.update');
        if (!$request->filled('code')) {
            $notification = __('Language not found!');
            $notification = ['message' => $notification, 'alert-type' => 'error'];

            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.home-1', ['code' => $request->code], $notification);
        }

        $homepage = HomePage::where('home', $request->home)->first();

        if (!$homepage) {
            $homepage = $this->homepageUpdatingService->createHomepage($request);
        }

        if ($request->tab == 'about_section') {
            [$rules, $messages] = $this->homepageValidatingService->validateAboutSection($request);
            $this->validate($request, $rules, $messages);
            $this->homepageUpdatingService->updateAboutSection(request: $request, homepage: $homepage);
        }

        if ($request->tab == 'team_section') {
            [$rules, $messages] = $this->homepageValidatingService->validateTeamSection();
            $this->validate($request, $rules, $messages);
            $this->homepageUpdatingService->updateTeamSection(request: $request, homepage: $homepage);
        }

        if ($request->tab == 'about_section_home_2') {
            [$rules, $messages] = $this->homepageValidatingService->validateAboutHome2Section();
            $this->validate($request, $rules, $messages);
            $this->homepageUpdatingService->updateAboutHome2Section(request: $request, homepage: $homepage);
        }

        if ($request->tab == 'pricing_section_home_2') {
            [$rules, $messages] = $this->homepageValidatingService->validatePricingHome2Section();
            $this->validate($request, $rules, $messages);
            $this->homepageUpdatingService->updatePricingHome2Section(request: $request, homepage: $homepage);
        }

        if ($request->tab == 'video_section') {
            [$rules, $messages] = $this->homepageValidatingService->validateVideoSection();
            $this->validate($request, $rules, $messages);
            $this->homepageUpdatingService->updateVideoSection(request: $request, homepage: $homepage);
        }

        if ($request->tab == 'testimonial_section') {
            [$rules, $messages] = $this->homepageValidatingService->validateTestimonialSection();
            $this->validate($request, $rules, $messages);
            $this->homepageUpdatingService->updateTestimonialSection(request: $request, homepage: $homepage);
        }

        return $this->redirectWithMessage(RedirectType::UPDATE->value, "admin.home-$request->home", ['code' => $request->code], ['message' => 'About Us Content Update successfully', 'alert-type' => 'success']);
    }

    public function updateAboutImage(Request $request)
    {
        $homepage = HomePage::where('home', $request->home)->first();
        if (!$homepage) {
            return response()->json(['message' => 'Home Page Not Found', 'status' => 404]);
        }

        $homepageImgList = $homepage->about_us_images;

        $id = $request->id;
        if (count($homepageImgList) > 0) {
            $img = $homepageImgList[$id] ? $homepageImgList[$id] : null;
            if ($img) {
                file_delete($img);
            }
            array_splice($homepageImgList, $id, 1);
            $homepage->about_us_images = $homepageImgList;
            $homepage->save();
            return response()->json(['message' => 'Image Deleted Successfully', 'status' => 200]);
        }
        return response()->json(['message' => 'Image Not Found', 'status' => 404]);
    }
}
