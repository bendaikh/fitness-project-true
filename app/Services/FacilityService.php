<?php
namespace App\Services;

use App\Models\Facility;
use Illuminate\Database\Eloquent\Collection;

class FacilityService
{
    public function getFacilities($limit = 10): Collection
    {
        return Facility::limit($limit)->get();
    }

    public function getFacility($id): ?Facility
    {
        return Facility::find($id);
    }

    public function getFacilityBySlug($slug): ?Facility
    {
        return Facility::where('slug', $slug)->first();
    }

    public function getFeaturedFacilities($limit = 10): Collection
    {
        return Facility::where('is_featured', 1)->limit($limit)->get();
    }

    public function getRelatedFacilities($facility_id, $limit = 10): Collection
    {
        return Facility::where('id', '!=', $facility_id)->limit($limit)->get();
    }
}
