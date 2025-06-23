<?php

namespace App\Services;

use App\Enums\DefaultImages;
use App\Models\ContactPage;
use App\Traits\RedirectHelperTrait;
use Illuminate\Support\Facades\File;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class ContactPageUpdatingService
{
    use RedirectHelperTrait, GenerateTranslationTrait;

    public function createContactPage($request): ?ContactPage
    {
        $contactPage = new ContactPage();
        $contactPage->save();
        $this->generateTranslations(TranslationModels::ContactPage, $contactPage, 'contact_page_id', $request);
        return $contactPage;
    }

    public function updateContactPage($request, $contactPage): void
    {

        $map = $request->map;
        $pattern = '/src="([^"]+)"/';
        // Perform the regular expression match
        if (preg_match($pattern, $map, $matches)) {
            // Extracted src value
            $request['map'] = $matches[1];
        } else {
            echo "No src attribute found.";
        }


        $contactPage->update($request->except('image'));

        if ($contactPage && $request->hasFile('image')) {
            if ($contactPage->image) {
                if (@File::exists(public_path($contactPage->image))) {
                    @unlink(public_path($contactPage->image));
                }
            }
            $file_name = file_upload($request->image, null, 'uploads/custom-images/');
            $contactPage->image = $file_name;
            $contactPage->save();
        }

        $this->updateTranslations($contactPage, $request, $request->only('title', 'code'));
    }
}
