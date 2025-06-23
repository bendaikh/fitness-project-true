<?php
namespace App\Services;

use App\Models\Location;

class LocationService
{
    /**
     * Get all locations
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllLocations()
    {
        return Location::all();
    }

    /**
     * Get location by id
     *
     * @param int $id
     * @return \App\Models\Location
     */
    public function getLocationById(int $id)
    {
        return Location::find($id);
    }

    /**
     * Create location
     *
     * @param array<string, mixed> $data
     * @return \App\Models\Location
     */
    public function createLocation(array $data)
    {
        return Location::create($data);
    }

    /**
     * Update location
     *
     * @param \App\Models\Location $location
     * @param array<string, mixed> $data
     * @return \App\Models\Location
     */
    public function updateLocation(Location $location, array $data)
    {
        $location->update($data);
        return $location;
    }

    /**
     * Delete location
     *
     * @param \App\Models\Location $location
     * @return bool
     */
    public function deleteLocation(Location $location)
    {
        return $location->delete();
    }
}
