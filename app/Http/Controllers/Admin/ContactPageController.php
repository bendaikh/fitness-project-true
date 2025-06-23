<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Models\ContactPage;
use App\Services\ContactPageUpdatingService;
use App\Services\ContactPageValidatingService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    use RedirectHelperTrait;
    public function __construct(protected ContactPageUpdatingService $contactUpdatingService, protected ContactPageValidatingService $contactValidatingService)
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        checkAdminHasPermissionAndThrowException('website.content.view');
        $code = request()->code;
        $contactPage = ContactPage::with('translation')->first();
        return view('admin.pages.other-pages.contact.index', compact('code', 'contactPage'));
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

        $contactPage = ContactPage::first();

        if (!$contactPage) {
            $contactPage = $this->contactUpdatingService->createContactPage($request);
        }

        if ($request->tab == 'contact_section') {
            [$rules, $messages] = $this->contactValidatingService->validateContactPageSection();
            $this->validate($request, $rules, $messages);

            $this->contactUpdatingService->updateContactPage(request: $request, contactPage: $contactPage);
        }

        return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.contact-page.index', ['code' => $request->code]);
    }
}
