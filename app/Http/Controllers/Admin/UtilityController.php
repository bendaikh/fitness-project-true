<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Models\PagesUtility;
use App\Services\PageUtilityUpdatingService;
use App\Services\PageUtilityValidatingService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Modules\GlobalSetting\app\Http\Controllers\GlobalSettingController;
use Modules\GlobalSetting\app\Models\Setting;

class UtilityController extends Controller
{
    use RedirectHelperTrait;

    public function __construct(
        protected PageUtilityUpdatingService $utilityUpdatingService,
        protected PageUtilityValidatingService $utilityValidatingService
    ) {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        checkAdminHasPermissionAndThrowException('website.content.view');

        $code = request()->code;
        $utilityPage = PagesUtility::with('translation')->first();
        $setting = cache()->get('setting');
        return view('admin.pages.other-pages.utility.index', compact('code', 'utilityPage'));
    }
    public function update(Request $request)
    {
        checkAdminHasPermissionAndThrowException('website.content.update');

        if (!$request->filled('code')) {
            $notification = __('Language not found!');
            $notification = ['message' => $notification, 'alert-type' => 'error'];
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.pages.utility-page.index', ['code' => $request->code], $notification);
        }


        $footer = PagesUtility::first();
        if (!$footer) {
            $footer = $this->utilityUpdatingService->createFooter($request);
        }

        if ($request->tab == 'footer_section') {
            [$rules, $messages] = $this->utilityValidatingService->validateFooterSection($request);
            $this->validate($request, $rules, $messages);

            $this->utilityUpdatingService->updateFooterSection(request: $request, footer: $footer);

            $settings = $request->only(
                'footer_app_link_android',
                'footer_app_link_ios',
            );

            foreach ($settings as $key => $value) {
                $set = Setting::where('key', $key)->first();

                if ($set) {
                    $set->update(['value' => $value]);
                } else {
                    if ($value) {
                        Setting::create(['key' => $key, 'value' => $value]);
                    }
                }
            }

            $globalController = new GlobalSettingController();
            $globalController->put_setting_cache();
        }

        if ($request->tab == 'auth_section') {
            [$rules, $messages] = $this->utilityValidatingService->validateAuthSection();
            $this->validate($request, $rules, $messages);

            $this->utilityUpdatingService->updateAuthSection(request: $request, footer: $footer);
        }

        if ($request->tab == 'cta_button_section') {
            [$rules, $messages] = $this->utilityValidatingService->validateCallToActionSection();
            $this->validate($request, $rules, $messages);

            $this->utilityUpdatingService->updateCallToActionSection(request: $request, cta: $footer);
        }

        if ($request->tab == 'trainer_section') {
            [$rules, $messages] = $this->utilityValidatingService->validateTrainerSection();
            $this->validate($request, $rules, $messages);

            $this->utilityUpdatingService->updateTrainerSection(request: $request, trainer: $footer);
        }
        if ($request->tab == 'service_section') {
            [$rules, $messages] = $this->utilityValidatingService->validateServiceSection();
            $this->validate($request, $rules, $messages);

            $this->utilityUpdatingService->updateServiceSection(request: $request, service: $footer);
        }
        if ($request->tab == 'award_section') {
            [$rules, $messages] = $this->utilityValidatingService->validateAwardSection();
            $this->validate($request, $rules, $messages);

            $this->utilityUpdatingService->updateAwardSection(request: $request, award: $footer);
        }
        if ($request->tab == 'faq_section') {
            [$rules, $messages] = $this->utilityValidatingService->validateFaqSection();
            $this->validate($request, $rules, $messages);

            $this->utilityUpdatingService->updateFaqSection(request: $request, faq: $footer);
        }
        if ($request->tab == 'membership_section') {
            [$rules, $messages] = $this->utilityValidatingService->validateMemberSection();
            $this->validate($request, $rules, $messages);

            $this->utilityUpdatingService->updateMemberSection(request: $request, member: $footer);
        }

        if ($request->tab == 'shop_page') {
            $request->validate([
                'price_range' => 'required|numeric',
            ], [
                'price_range.required' => 'The price range field is required.',
                'price_range.numeric' => 'The price range field must be a number.',
            ]);

            $this->utilityUpdatingService->updateShopPage(request: $request, page: $footer);
        }

        cache()->put('pageUtility', $footer);


        return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.page-utility.index', ['code' => $request->code]);
    }
}
