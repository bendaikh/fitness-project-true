<?php

namespace Modules\Language\app\Http\Controllers;

use App\Enums\RedirectType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\RedirectHelperTrait;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Modules\GlobalSetting\app\Models\CustomPagination;
use Modules\Language\app\Models\Language;
use Modules\Language\app\Traits\LanguageTrait;

class StaticLanguageController extends Controller
{
    use LanguageTrait, RedirectHelperTrait;

    public function editStaticLanguages(Request $request, $code)
    {
        checkAdminHasPermissionAndThrowException('language.edit');
        $filePath = resource_path('lang/' . $code . '.json');
        if (!File::exists($filePath)) {
            return redirect()->route('admin.languages.index')->with([
                'alert-type' => 'warning',
                'message' => __('Not Found!'),
            ]);
        }

        $language = Language::where('code', $code)->firstOrFail();
        $languages = Language::all();
        $data = json_decode(File::get($filePath), true);

        if ($request->filled('search')) {
            $search = $request->search;

            $data = collect($data)->filter(function ($value, $key) use ($search) {
                return Str::contains($key, $search) || Str::contains($value, $search);
            })->all();
        }

        $data = $this->collectionPagination($data);

        return view('language::edit-static-language', compact('data', 'language', 'languages'));
    }

    //Paginate language file array data
    private function collectionPagination($data)
    {
        if (Cache::has('CustomPagination')) {
            $CustomPagination = Cache::get('CustomPagination');
            $perPage = $CustomPagination->language_list;
        } else {
            $perPage = CustomPagination::where('section_name', 'Language List')->select('item_qty')->first()->item_qty;
        }
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $dataCollection = collect($data);
        $currentPageItems = $dataCollection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginationData = new LengthAwarePaginator($currentPageItems, $dataCollection->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return $paginationData;
    }

    public function updateStaticLanguages(Request $request, $code)
    {
        checkAdminHasPermissionAndThrowException('language.update');

        $this->updateLanguageFile($request, $code);

        return $this->redirectWithMessage(RedirectType::UPDATE->value);
    }

    //update paginate file data
    private function updateLanguageFile($request, $code)
    {
        $filePath = resource_path('lang/' . $code . '.json');
        if (!File::exists($filePath)) {
            return redirect()->route('admin.languages.index')->with([
                'alert-type' => 'warning',
                'message' => __('Not Found!'),
            ]);
        }

        $existingData = json_decode(File::get($filePath), true);
        foreach ($request->values as $index => $value) {
            $existingData[$index] = $value;
        }

        File::put($filePath, json_encode($existingData, JSON_PRETTY_PRINT));
    }
}
