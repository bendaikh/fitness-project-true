<?php

namespace App\Services;

use App\Models\ProductBrand;
use Illuminate\Support\Facades\DB;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class BrandService
{
    use GenerateTranslationTrait;
    protected ProductBrand $brand;

    public function __construct(ProductBrand $brand)
    {
        $this->brand = $brand;
    }

    public function all()
    {
        return $this->brand->all();
    }

    // get product paginate
    public function getPaginateBrands()
    {
        $query = $this->brand->query();

        if (request('keyword')) {
            $query->where(
                function ($q) {
                    $q->whereHas('translation', function ($us) {
                        $us->where('name', 'like', '%' . request('keyword') . '%');
                    });
                }
            );
        }

        if (request()->get('status') != '') {
            $query->where('status', request('status'));
        }
        if (request('order_by')) {
            $query->orderBy('id', request('order_by'));
        }

        if (request('par-page')) {
            $paginatedResult = $query->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $paginatedResult = $query->paginate(20);
        }

        $paginatedResult->appends(request()->query());

        return $paginatedResult;
    }

    // store product brand

    public function store($request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = file_upload($request->file('image'), null);
        }

        $brand = $this->brand->create($data);
        $this->generateTranslations(
            TranslationModels::ProductBrand,
            $brand,
            'product_brand_id',
            $request,
        );
        return $brand;
    }

    public function find($id)
    {
        return $this->brand->find($id);
    }

    public function update($request, $id)
    {
        $brand = $this->brand->find($id);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = file_upload($request->file('image'), $brand->image);
        }
        $brand->update($data);

        $this->updateTranslations(
            $brand,
            $request,
            $request->all(),
        );
        return $brand;
    }

    public function delete($id)
    {
        $brand = $this->brand->find($id);

        // delete brand image
        file_delete($brand->image);
        // delete translations
        $brand->translations()->delete();
        return $brand->delete();
    }

    public function isBrandUsed($id)
    {
        $isBrandUsed = $this->brand->find($id);
        $isBrandUsed = $isBrandUsed->products->isNotEmpty();
        return $isBrandUsed;
    }

    public function getActiveBrands()
    {
        return $this->brand->where('status', '1')->get();
    }

    public function status($id)
    {
        $brand = $this->brand->find($id);
        $status = $brand->status == '1' ? '0' : '1';
        $brand->update(['status' => $status]);
        return $brand;
    }
}
