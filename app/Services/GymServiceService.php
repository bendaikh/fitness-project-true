<?php

namespace App\Services;

use App\Models\GymService;
use App\Models\Service;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class GymServiceService
{
    use GenerateTranslationTrait;
    public function __construct(private Service $gymService) {}
    public function getGymServices($paginate = 20): Paginator
    {
        $services = $this->gymService->with('faqs');
        if (request()->tag) {
            $services = $services->where('tags', 'like', '%' . request()->tag . '%');
        }
        if (request()->search) {
            $services = $services->whereHas('translations', function ($query) {
                $query->where('title', 'like', '%' . request()->search . '%');
            });
        }
        if (request()->get('status') != '') {
            $services = $services->where('status', request()->status);
        }
        if (request('order_by')) {
            $services = $services->orderBy('id', request('order_by'));
        }

        if (request('par-page')) {
            $paginatedResult = $services->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $paginatedResult = $services->paginate($paginate);
        }
        $paginatedResult->appends(request()->query());

        return $paginatedResult;
    }

    public function getGymService($id): ?Service
    {
        return $this->gymService->with('faqs')->find($id);
    }

    public function getGymServiceBySlug($slug): ?Service
    {
        return $this->gymService->with('faqs')->where('slug', $slug)->first();
    }

    public function getActiveGymServices()
    {
        $services = $this->gymService->with('faqs');
        if (request()->tag) {
            $services = $services->where('tags', 'like', '%' . request()->tag . '%');
        }
        if (request()->search) {
            $services = $services->whereHas('translations', function ($query) {
                $query->where('title', 'like', '%' . request()->search . '%');
            });
        }

        return $services->where('status', 1);
    }

    public function getRelatedGymServices($gym_service_id, $limit = 10): Collection
    {
        return $this->gymService->where('id', '!=', $gym_service_id)->limit($limit)->get();
    }
    public function createGymService(Request $request): Service
    {
        $data = $request->all();

        $checkSlug = $this->gymService->where('slug', $request->slug)->first();
        if ($checkSlug) {
            // make slug unique
            $data['slug'] = $data['slug'] . '-' . time();
        }

        if ($request->hasFile('image')) {
            $data['image'] = file_upload($request->file('image'), null, '/uploads/custom-images/gym_service/');
        }

        if ($request->hasFile('file')) {
            $data['file'] = file_upload($request->file('file'), null, '/uploads/files/gym_service/');
        }

        $videos = [];
        if ($request->video_link) {
            foreach ($request->video_link as $index => $video) {
                if ($video == null) continue;
                $image = file_upload($request->video_image[$index], null, '/uploads/custom-images/gym_service/');
                $video = ['link' => $video, 'image' =>  $image];
                $videos[] = $video;
            }
        }
        $data['videos'] = $videos;

        // create gym service
        $gymService = $this->gymService->create($data);

        // create gym service translations
        $this->generateTranslations(
            TranslationModels::GymService,
            $gymService,
            'service_id',
            $request,
        );



        // create gym service faqs
        if ($request->question) {
            foreach ($request->question as $index => $question) {
                if ($question) {


                    $faq = $gymService->faqs()->create();

                    $newRequest = new Request([
                        'question' => $question,
                        'answer' => $request->answer[$index],
                    ]);
                    $this->generateTranslations(
                        TranslationModels::ServiceFaq,
                        $faq,
                        'service_faq_id',
                        $newRequest,
                    );
                }
            }
        }
        return $gymService;
    }

    public function updateGymService(Request $request, $id): Service
    {
        $data = $request->all();


        $gymService = $this->gymService->findOrFail($id);

        if ($request->hasFile('image')) {
            $data['image'] = file_upload($request->file('image'), $gymService->image, '/uploads/custom-images/gym_service/');
        }
        if ($request->hasFile('file')) {
            $data['file'] = file_upload($request->file('file'), $gymService->file, '/uploads/files/gym_service/');
        }
        if ($request->video_link) {
            $videos = [];
            foreach ($request->video_link as $index => $video) {
                if ($video == null) continue;
                if (isset($request->video_image[$index]) && $request->video_image[$index]) {
                    $image = file_upload($request->video_image[$index], null, '/uploads/custom-images/gym_service/');
                } else {
                    $image = $gymService->videos[$index]['image'];
                }
                $video = ['link' => $video, 'image' =>  $image];
                $videos[] = $video;
            }
            $data['videos'] = $videos;
        }

        // check slug
        if ($request->slug != $gymService->slug) {
            $checkSlug = $this->gymService->where('slug', $request->slug)->first();
            if ($checkSlug) {
                // make slug unique
                $data['slug'] = $data['slug'] . '-' . time();
            }
        }

        $gymService->update($data);

        // update gym service translations

        $this->updateTranslations(
            $gymService,
            $request,
            $request->all(),
        );


        // delete faqs
        $gymService->faqs()->delete();

        // create gym service faqs
        if ($request->question) {
            foreach ($request->question as $index => $question) {
                if ($question == null) continue;
                $faq = $gymService->faqs()->create();

                $newRequest = new Request([
                    'question' => $question,
                    'answer' => $request->answer[$index],
                ]);
                $this->generateTranslations(
                    TranslationModels::ServiceFaq,
                    $faq,
                    'service_faq_id',
                    $newRequest,
                );
            }
        }

        return $gymService;
    }

    public function deleteGymService($id): bool
    {
        $gymService = $this->gymService->findOrFail($id);

        // delete gym service translations
        $gymService->translations()->delete();

        // delete gym service faqs
        $gymService->faqs()->each(function ($faq) {
            $faq->translations()->delete();
            $faq->delete();
        });

        // delete gym image
        file_delete($gymService->image);

        return $gymService->delete();
    }

    public function statusUpdate($id): bool
    {
        $gymService = $this->gymService->find($id);
        $status = $gymService->status == 1 ? 0 : 1;
        return $gymService->update(['status' => $status]);
    }
}
