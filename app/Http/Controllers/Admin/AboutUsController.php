<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Services\AboutPageUpdatingService;
use App\Services\AboutPageValidatingService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    use RedirectHelperTrait;
    public function __construct(private AboutPageValidatingService $aboutPageValidatingService, private AboutPageUpdatingService $aboutPageUpdatingService) {}
    public function index()
    {
        checkAdminHasPermissionAndThrowException('website.content.view');

        $code = request()->code;
        $aboutPage = About::with('translation')->first();
        return view('admin.pages.other-pages.about.index', compact('code', 'aboutPage'));
    }

    public function update(Request $request)
    {
        // update contact page
        checkAdminHasPermissionAndThrowException('website.content.update');

        if (!$request->filled('code')) {
            $notification = __('Language not found!');
            $notification = ['message' => $notification, 'alert-type' => 'error'];
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.contact-page.index', ['code' => $request->code], $notification);
        }

        $aboutPage = About::first();

        if (!$aboutPage) {
            $aboutPage = $this->aboutPageUpdatingService->createAboutPage($request);
        }
        if ($request->tab == 'about_section') {
            [$rules, $messages] = $this->aboutPageValidatingService->validateAboutPageSection();
            $this->validate($request, $rules, $messages);

            $this->aboutPageUpdatingService->updateAboutSection(request: $request, aboutPage: $aboutPage);
        }
        if ($request->tab == 'choose_us_section') {
            [$rules, $messages] = $this->aboutPageValidatingService->validateChooseUsSection();
            $this->validate($request, $rules, $messages);

            $this->aboutPageUpdatingService->updateChooseUsSection(request: $request, aboutPage: $aboutPage);
        }
        if ($request->tab == 'support_us_section') {
            [$rules, $messages] = $this->aboutPageValidatingService->validateSupportUsSection();
            $this->validate($request, $rules, $messages);

            $this->aboutPageUpdatingService->updateSupportUsSection(request: $request, aboutPage: $aboutPage);
        }
        if ($request->tab == 'exercise_section') {
            [$rules, $messages] = $this->aboutPageValidatingService->validateExerciseSection();
            $this->validate($request, $rules, $messages);

            $this->aboutPageUpdatingService->updateExerciseSection(request: $request, aboutPage: $aboutPage);
        }
        if ($request->tab == 'team_section') {
            [$rules, $messages] = $this->aboutPageValidatingService->validateTeamSection();
            $this->validate($request, $rules, $messages);

            $this->aboutPageUpdatingService->updateTeamSection(request: $request, aboutPage: $aboutPage);
        }
        if ($request->tab == 'testimonial_section') {
            [$rules, $messages] = $this->aboutPageValidatingService->validateTestimonialSection();
            $this->validate($request, $rules, $messages);

            $this->aboutPageUpdatingService->updateTestimonialSection(request: $request, aboutPage: $aboutPage);
        }
        return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.about-page.index', ['code' => $request->code]);
    }
}
