<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\HomePage;
use App\Models\Partner;
use App\Models\SectionContent;
use App\Rules\CustomRecaptcha;
use App\Services\GymServiceService;
use App\Services\HomePageService;
use App\Services\PageUtilityService;
use App\Services\ProductService;
use App\Services\SectionService;
use App\Services\TrainerService;
use App\Services\WorkoutService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Modules\Blog\app\Models\Blog;
use Modules\Blog\app\Models\BlogCategory;
use Modules\Blog\app\Models\BlogComment;
use Modules\Blog\app\Models\BlogTranslation;
use Modules\GlobalSetting\app\Models\CustomPagination;
use Modules\GlobalSetting\app\Models\SeoSetting;
use Modules\GlobalSetting\app\Models\Setting;
use Modules\Subscription\app\Models\SubscriptionPlan;
use Modules\Testimonial\app\Models\Testimonial;

class WebsiteController extends Controller
{

    public function __construct(private HomePageService $homePageService, private Blog $blog, private WorkoutService $workoutService, private TrainerService $trainerService, private GymServiceService $gymServiceService, private ProductService $productService, private SectionService $sectionService, private PageUtilityService $pageUtility) {}


    public function home()
    {
        $theme = THEME;
        if (($theme == '1' || $theme == 'all')) {
            return $this->home_1();
        }
        if ($theme == '2') {
            return $this->home_2();
        }

        if ($theme == '3') {
            return $this->home_3();
        }

        if ($theme == '4') {
            return $this->home_4();
        }
    }

    // home page One

    public function home_1(): View
    {
        $sliders = $this->homePageService->sliderList()->where('home_page', 1)->get();

        $blogs = Blog::with(['translation', 'category.translation', 'comments' => function ($q) {
            return $q
                ->where('status', 1)
                ->where('parent_id', 0);
        }])->orderBy('id', 'desc')->where(['status' => 1])->where('show_homepage', 1)->get()->take(3);

        $plans = SubscriptionPlan::where('status', 1)->with('options')->get();

        $paginate = CustomPagination::where('section_name', 'Workout List')->first();
        $workouts = $this->workoutService->getActiveWorkouts();
        $workouts = $workouts->get();

        $trainers = $this->trainerService->activeTrainers()->get()->take(6);

        $testimonials = Testimonial::with('translation')->where('status', 1)->get();

        $partners = Partner::where('status', 1)->get();

        $counters = Counter::where('home', '1')->with('translation')->limit(4)->get();
        $homepage = HomePage::where('home', 1)->first();
        $section = $this->sectionService->getSection();
        $pageUtility = $this->pageUtility->getPageUtility();

        $content = SectionContent::first();
        return view('website.pages.home.home-1', compact('sliders', 'blogs', 'plans', 'workouts', 'trainers', 'testimonials', 'partners', 'counters', 'homepage', 'section', 'pageUtility', 'content'));
    }
    public function home_2(): View
    {
        $sliders = $this->homePageService->sliderList()->where('home_page', 2)->get();
        $blogs = Blog::with(['translation', 'category.translation', 'comments' => function ($q) {
            return $q
                ->where('status', 1)
                ->where('parent_id', 0);
        }])->orderBy('id', 'desc')->where(['status' => 1])->where('show_homepage', 1)->get()->take(3);
        $plans = SubscriptionPlan::where('status', 1)->with('options')->limit(2)->get();

        $paginate = CustomPagination::where('section_name', 'Workout List')->first();
        $workouts = $this->workoutService->getActiveWorkouts();
        $workouts = $workouts->limit($paginate->item_qty)->get();

        $testimonials = Testimonial::with('translation')->where('status', 1)->get();
        $products = $this->productService->getActiveProducts()->paginate(5);
        $counters = Counter::where('home', '2')->with('translation')->limit(4)->get();

        $homepage = HomePage::where('home', 2)->first();
        $section = $this->sectionService->getSection();
        $content = SectionContent::first();
        return view('website.pages.home.home-2', compact('sliders', 'blogs', 'plans', 'workouts', 'testimonials', 'products', 'counters', 'homepage', 'section', 'content'));
    }
    public function home_3(): View
    {
        $sliders = $this->homePageService->sliderList()->where('home_page', 3)->get();
        $blogs = Blog::with(['translation', 'category.translation', 'comments' => function ($q) {
            return $q
                ->where('status', 1)
                ->where('parent_id', 0);
        }])->orderBy('id', 'desc')->where(['status' => 1])->where('show_homepage', 1)->get()->take(3);


        $services = $this->gymServiceService->getActiveGymServices()->get();
        $workouts = $this->workoutService->getActiveWorkouts();
        $workouts = $workouts->get()->take(3);
        $products = $this->productService->getActiveProducts()->paginate(5);
        $testimonials = Testimonial::with('translation')->where('status', 1)->get();
        $homepage = HomePage::where('home', 3)->first();
        $section = $this->sectionService->getSection();
        $content = SectionContent::first();
        return view('website.pages.home.home-3', compact('sliders', 'blogs', 'services', 'products', 'testimonials', 'homepage', 'section', 'content', 'workouts'));
    }
    public function home_4(): View
    {
        $sliders = $this->homePageService->sliderList()->where('home_page', 1)->get();

        $blogs = Blog::with(['translation', 'category.translation', 'comments' => function ($q) {
            return $q
                ->where('status', 1)
                ->where('parent_id', 0);
        }])->orderBy('id', 'desc')->where(['status' => 1])->where('show_homepage', 1)->get()->take(3);

        $plans = SubscriptionPlan::where('status', 1)->with('options')->get();

        $paginate = CustomPagination::where('section_name', 'Workout List')->first();
        $workouts = $this->workoutService->getActiveWorkouts();
        $workouts = $workouts->get();

        $trainers = $this->trainerService->activeTrainers()->get()->take(6);

        $testimonials = Testimonial::with('translation')->where('status', 1)->get();

        $partners = Partner::where('status', 1)->get();

        $counters = Counter::where('home', '1')->with('translation')->limit(4)->get();
        $homepage = HomePage::where('home', 1)->first();
        $section = $this->sectionService->getSection();
        $pageUtility = $this->pageUtility->getPageUtility();

        $content = SectionContent::first();
        return view('website.pages.home.home-4', compact('sliders', 'blogs', 'plans', 'workouts', 'trainers', 'testimonials', 'partners', 'counters', 'homepage', 'section', 'pageUtility', 'content'));
    }

    public function blogs(): View
    {
        $blogs = Blog::with('translation', 'category.translation')->orderBy('id', 'desc')->where(['status' => 1])->take(3);

        if (request()->search) {
            $blogIds = BlogTranslation::where('title', 'like', '%' . request()->search . '%')->pluck('blog_id');
            $blogs = $blogs->whereIn('id', $blogIds);
        } elseif (request()->category) {
            $category = BlogCategory::with('translation')->where('slug', request()->category)->first();
            $blogs = $blogs->where('blog_category_id', $category->id);
        } elseif (request()->tag) {
            $blogs = $blogs->where('tags', 'like', '%' . request()->tag . '%');
        }
        $perPage = CustomPagination::where('section_name', 'Blog List')->select('item_qty')->first()->item_qty;
        $blogs = $blogs->paginate($perPage);
        $seo_setting = SeoSetting::find(1);
        return view('website.pages.blogs.index', compact('blogs', 'seo_setting'));
    }
    public function blogDetails(string $slug)
    {

        $blog = Blog::with('category', 'category.translation', 'translation')->where("slug", $slug)->first();

        if (!$blog) {
            return to_route('website.404');
        }
        // social share links
        $shareLinks = (object) \Share::currentPage()
            ->facebook()
            ->linkedin()
            ->twitter()
            ->pinterest()
            ->getRawLinks();

        $previous_record = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $after_record = Blog::where('id', '>', $blog->id)->orderBy('id', 'desc')->first();
        $latest_post = Blog::latest()->whereNot("slug", $slug)->take(3)->get();
        $categories = BlogCategory::with('blogs')->whereHas('blogs')->get();

        $popularTags = $this->getPopularTags();
        $perPage = CustomPagination::where('section_name', 'Blog Comment')->select('item_qty')->first()->item_qty;
        $comments = $blog
            ->comments()
            ->where('status', 1)
            ->where('parent_id', 0)
            ->with('children')
            ->paginate($perPage);

        $related_blogs = Blog::where('blog_category_id', $blog->blog_category_id)->where('id', '!=', $blog->id)->take(3)->get();
        return view('website.pages.blogs.details', compact('blog', 'previous_record', 'after_record', 'shareLinks', 'latest_post', 'categories', 'popularTags', 'comments', 'related_blogs'));
    }

    public function commentPost(Request $request)
    {
        $setting = Setting::where("key", "recaptcha_secret_key")->first();

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
            'blog_id' => 'required',
            'g-recaptcha-response' => $setting->recaptcha_status == 'active' ? ['required', new CustomRecaptcha()] : '',
        ];
        $customMessages = [
            'name.required' => __('Name is required'),
            'email.required' => __('Email is required'),
            'comment.required' => __('Comment is required'),
            'g-recaptcha-response.required' => __('Verify You are not robot'),
        ];

        $this->validate($request, $rules, $customMessages);

        $comment = new BlogComment();
        $comment->blog_id = $request->blog_id;
        $comment->parent_id = $request->parent_id ?: 0;
        $comment->name = $request->name;
        $comment->status = 0;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->save();
        $notification = __('Blog comment submitted successfully');
        return response()->json(['status' => 1, 'message' => $notification], 200);
    }
    public function getPopularTags()
    {
        $blogs = Blog::all();

        // flatten and count tags
        $tags = $blogs->pluck('tags')->flatten()->countBy();
        // sort tags by count in desending order
        $tags = $tags->sortDesc()->keys();
        return $tags;
    }

    public function setCurrency()
    {
        $currency = allCurrencies()->where('currency_code', request('currency'))->first();
        if (session()->has('currency_code')) {
            session()->forget('currency_code');
            session()->forget('currency_position');
            session()->forget('currency_icon');
            session()->forget('currency_rate');
        }
        if ($currency) {
            session()->put('currency_code', $currency->currency_code);
            session()->put('currency_position', $currency->currency_position);
            session()->put('currency_icon', $currency->currency_icon);
            session()->put('currency_rate', $currency->currency_rate);

            $notification = __('Currency Changed Successfully');
            $notification = ['message' => $notification, 'alert-type' => 'success'];

            return redirect()->back()->with($notification);
        }
        getSessionCurrency();
        $notification = __('Currency Changed Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }
}
