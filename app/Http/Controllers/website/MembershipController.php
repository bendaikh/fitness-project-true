<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\SectionContent;
use App\Services\PageUtilityService;
use Illuminate\Http\Request;
use Modules\Subscription\app\Models\SubscriptionPlan;
use Modules\Testimonial\app\Models\Testimonial;

class MembershipController extends Controller
{
    public function index(PageUtilityService $pageUtility)
    {
        $pageUtility = $pageUtility->getPageUtility();
        $plans = SubscriptionPlan::where('status', 1)->with('options')->get();
        $testimonials = Testimonial::with('translation')->get();
        $content = SectionContent::first();
        return view('website.pages.membership.index', compact('plans', 'testimonials', 'pageUtility', 'content'));
    }
}
