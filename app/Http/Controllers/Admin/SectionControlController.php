<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Models\SectionContent;
use App\Models\SectionControl;
use App\Services\SectionService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class SectionControlController extends Controller
{
    use RedirectHelperTrait, GenerateTranslationTrait;
    public function __construct(private SectionService $sectionService)
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $section = $this->sectionService->getSection();
        return view('admin.pages.other-pages.section-control', compact('section'));
    }
    public function update(Request $request)
    {
        $data = $request->except(['_method', '_token']);
        foreach ($data as $key => $value) {
            $section = SectionControl::where('value', $key);
            if ($section->exists())
                $section->update(['key' => $value]);
            else
                SectionControl::create(['value' => $key, 'key' => $value]);
        }

        Cache::forget('section_visibility');
        return back()->with(['message' => 'Section visibility updated successfully', 'alert-type' => 'success']);
    }

    public function aboutUs()
    {
        $section = $this->sectionService->getSection();
        return view('admin.pages.other-pages.about.section-control', compact('section'));
    }

    public function sectionContent()
    {
        $section = SectionContent::first();
        $code = request()->code ? request()->code : getSessionLanguage();

        return view('admin.pages.other-pages.section-title', compact('section', 'code'));
    }

    public function sectionContentUpdate(Request $request)
    {
        if (!$request->code) {
            $notification = __('Language not found!');
            $notification = ['message' => $notification, 'alert-type' => 'error'];
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.section.content', ['code' => getSessionLanguage()], $notification);
        }

        $content = SectionContent::first();

        if (!$content) {
            $content = $this->createSectionContent($request);
        }

        if ($content) {
            $this->updateTranslations($content, $request, $request->except(['_token', '_method']));
        }

        return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.section.content', ['code' => $request->code], ['message' => 'Section content updated successfully', 'alert-type' => 'success']);
    }


    private function createSectionContent(Request $request)
    {
        $content = new SectionContent();
        $content->save();
        $this->generateTranslations(TranslationModels::SectionContent, $content, 'section_content_id', $request);

        return $content;
    }
}
