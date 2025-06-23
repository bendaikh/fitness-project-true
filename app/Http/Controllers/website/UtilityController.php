<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Address;
use App\Models\ContactPage;
use App\Models\Counter;
use App\Models\GalleryGroup;
use App\Models\ShippingMethod;
use App\Services\AddressService;
use App\Services\AwardService;
use App\Services\GymServiceService;
use App\Services\PageUtilityService;
use App\Services\SectionService;
use App\Services\TrainerService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Modules\Faq\app\Models\Faq;
use Modules\GlobalSetting\app\Models\CustomPagination;
use Modules\Language\app\Models\Language;
use Modules\PageBuilder\app\Models\CustomPage;
use Modules\Testimonial\app\Models\Testimonial;

class UtilityController extends Controller
{
    protected AddressService $addressService;
    public function __construct(AddressService $addressService, private GymServiceService $gymService, private TrainerService $trainerService, private PageUtilityService $pageUtility)
    {
        $this->addressService = $addressService;
    }
    public function about_us(SectionService $sectionService): View
    {
        $aboutUs = About::with('translation')->first();
        $trainers = $this->trainerService->activeTrainers()->limit(3)->get();
        $testimonials = Testimonial::with('translation')->get();
        $counters = Counter::with('translation')->where('home', '2')->limit(4)->get();
        $section = $sectionService->getSection();

        $pageUtility = $this->pageUtility->getPageUtility();

        return view('website.pages.utilities.about-us', compact('aboutUs', 'trainers', 'testimonials', 'counters', 'section', 'pageUtility'));
    }

    public function contact(): View
    {
        // use cache to store the contact page

        if (Cache::has('contact_page')) {
            $contact_page = Cache::get('contact_page');
        } else {
            Cache::rememberForever('contact_page', function () {
                return ContactPage::with('translation')->first();
            });
            $contact_page = Cache::get('contact_page');
        }

        return view('website.pages.utilities.contact-us', compact('contact_page'));
    }

    public function privacyPolicy()
    {
        $page = CustomPage::whereSlug('privacy-policy')->firstOrFail();


        if (!$page) {
            return to_route('website.404');
        }
        return view('website.pages.utilities.privacy-policy', [
            'content' => $page?->translation?->content,
        ]);
    }

    public function pages($slug)
    {
        $page = CustomPage::whereSlug($slug)->firstOrFail();

        if (!$page) {
            return to_route('website.404');
        }

        return view('website.pages.utilities.pages', [
            'content' => $page?->translation?->content,
            'title' => $page?->translation?->name
        ]);
    }

    public function termsCondition()
    {
        $page = CustomPage::whereSlug('terms-conditions')->firstOrFail();

        if (!$page) {
            return to_route('website.404');
        }
        return view('website.pages.utilities.terms-condition', [
            'content' => $page?->translation?->content,
        ]);
    }

    public function getCitiesByState($id)
    {
        $cities = $this->addressService->getCities($id);
        if ($cities->count() > 0) {
            return ['status' => 200, 'data' => $cities];
        } else {
            return ['status' => 404, 'message' => 'States Not Found', 'data' => []];
        }
    }


    public function storeAddress(Request $request)
    {
        $request->validate([
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'zip_code' => 'nullable',
            'phone' => 'required',
        ]);

        $address = $this->addressService->storeAddress($request);

        if ($address) {
            return back()->with(['message' => 'Address added successfully', 'alert-type' => "success"]);
        } else {
            return back()->with(['message' => 'Address not added', 'alert-type' => "error"]);
        }
    }

    public function updateAddress(Request $request, $id)
    {
        $request->validate([
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'zip_code' => 'nullable',
            'phone' => 'required',
            'type' => 'required',
        ]);

        $address = $this->addressService->updateAddress($request, $id);

        if ($address) {
            return back()->with(['message' => 'Address updated successfully', 'alert-type' => "success"]);
        } else {
            return back()->with(['message' => 'Address not updated', 'alert-type' => "error"]);
        }
    }
    public function setDeliveryAddress(Request $request)
    {
        $request->validate([
            'delivery_id' => 'required',
        ]);

        $address = Address::find($request->delivery_id);
        if ($address) {
            session()->put('billing_address', $address->id);
            return response()->json(['status' => 200, 'message' => __('Delivery Address set successfully')]);
        } else {
            return response()->json(['status' => 404, 'message' => __('Delivery Address not set')]);
        }
    }

    public function storeBillingAddress(Request $request)
    {
        if ($request->address == null) {
            $request->validate([
                'billing_id' => 'required',
            ], [
                'billing_id.required' => __('Please select an address'),
            ]);
            session()->put('delivery_address', $request->billing_id);

            return response()->json(['status' => 200, 'message' => __('Billing Address set successfully')]);
        }
        $request->validate([
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'zip_code' => 'nullable',
            'phone' => 'required',
        ], [
            'state.required' => 'State is required',
            'city.required' => 'City is required',
            'address.required' => 'Address is required',
            'phone.required' => 'Phone is required',

        ]);

        $address = $this->addressService->storeAddress($request);

        if ($address) {
            session()->put('delivery_address', $address->id);
            return response()->json(['status' => 200, 'message' => __('Billing Address set successfully')]);
        } else {
            return response()->json(['status' => 404, 'message' => __('Billing Address not set')]);
        }
    }

    public function setDeliveryMethod(Request $request)
    {
        $request->validate([
            'deliveryMethod' => 'required',
        ]);

        if ($request->deliveryMethod == 2) {
            session()->put('delivery_area', '');
        }
        $cart_contents = session("cart");
        return view('components.billing-info', compact('cart_contents'));
    }

    public function setDeliveryArea(Request $request)
    {
        $request->validate([
            'deliveryArea' => 'required',
        ]);

        $area = ShippingMethod::find($request->deliveryArea);
        session()->put('delivery_area', $area);

        $cart_contents = session("cart");

        return view('components.billing-info', compact('cart_contents'));
    }

    public function faqs(): View
    {
        $faqs = Faq::with('translation')->where('status', 1)->paginate(15);
        $pageUtility = $this->pageUtility->getPageUtility();
        return view('website.pages.utilities.faq', compact('faqs', 'pageUtility'));
    }

    public function service(): View
    {
        $paginate = CustomPagination::where('section_name', 'Service List')->first();
        $services = $this->gymService->getActiveGymServices()->paginate($paginate->per_page);
        $pageUtility = $this->pageUtility->getPageUtility();
        return view('website.pages.utilities.service', compact('services', 'pageUtility'));
    }

    public function serviceDetails(string $slug)
    {

        $service = $this->gymService->getGymServiceBySlug($slug);

        if (!$service) {
            return to_route('website.404');
        }

        // social share links
        $shareLinks = (object) \Share::currentPage()
            ->facebook()
            ->linkedin()
            ->twitter()
            ->pinterest()
            ->getRawLinks();

        $services = $this->gymService->getGymServices(5);

        return view('website.pages.utilities.service-details', compact('service', 'shareLinks', 'services'));
    }

    public function setLanguage()
    {
        $lang = Language::whereCode(request('code'))->first();
        $hasLangSession = session()->has('lang');
        if ($hasLangSession) {
            session()->forget('lang');
            session()->forget('text_direction');
            Artisan::call('optimize:clear');
            Artisan::call('cache:clear');
        }

        if ($lang) {
            session()->put('lang', $lang->code);
            session()->put('text_direction', $lang->direction);
            Artisan::call('optimize:clear');
            Artisan::call('cache:clear');

            $notification =  __('Language changed successfully');
            $notification = array('message' => $notification, 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }


        Artisan::call('optimize:clear');
        Artisan::call('cache:clear');
        $notification =  __('Language changed successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
    }

    public function award(AwardService $awardService)
    {
        $paginate = CustomPagination::where('section_name', 'Award List')->first();

        $awards = $awardService->all()->where('status', 1)->paginate($paginate->item_qty);
        $pageUtility = $this->pageUtility->getPageUtility();
        return view('website.pages.utilities.award', compact('awards', 'pageUtility'));
    }

    public function imageGallery(GalleryGroup $galleryGroup)
    {
        $galleryGroups = $galleryGroup->where('type', 'image')->get();
        $galleryGroups->each(function ($galleryGroup) {
            $galleryGroup->paginatedImages = $galleryGroup->images()->where('status', 1)->paginate(10);
        });
        return view('website.pages.utilities.image-gallery', compact('galleryGroups'));
    }
    public function videoGallery(GalleryGroup $galleryGroup)
    {
        $galleryGroups = $galleryGroup->where('type', 'video')->get();

        $galleryGroups->each(function ($galleryGroup) {
            $galleryGroup->paginatedVideos = $galleryGroup->videos()->where('status', 1)->paginate(10);
        });

        return view('website.pages.utilities.video-gallery', compact('galleryGroups'));
    }
}
