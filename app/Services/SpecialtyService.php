<?php

namespace App\Services;

use App\Models\Specialist;
use Illuminate\Http\Request;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class SpecialtyService
{
    use GenerateTranslationTrait;
    protected $specialtyService;

    public function __construct(Specialist $specialtyService)
    {
        $this->specialtyService = $specialtyService;
    }

    public function all()
    {
        $query = $this->specialtyService;

        if (request('keyword')) {
            $query = $query->whereHas('translation', function ($q) {
                $q->where('name', 'like', '%' . request('keyword') . '%');
            });
        }

        if (request()->has('order_by')) {
            $order_by = request('order_by');
            $query = $query->orderBy('id', $order_by == 1 ? 'asc' : 'desc');
        }

        return $query;
    }
    public function store(Request $request)
    {
        $specialty = $this->specialtyService->create([
            'slug' => $request->slug,
        ]);

        // Generate translations
        $this->generateTranslations(
            TranslationModels::Specialist,
            $specialty,
            'specialist_id',
            $request,
        );

        return $specialty;
    }

    public function find(string $id)
    {
        $specialty = $this->specialtyService->find($id);
        return $specialty;
    }

    public function update(Request $request, string $id)
    {
        $specialty = $this->specialtyService->find($id);
        $specialty->update($request->all());

        // Generate translations
        $this->updateTranslations(
            $specialty,
            $request,
            $request->all(),
        );
    }
}
