<?php
namespace App\Services;

use App\Models\WorkoutCategory;
use Illuminate\Database\Eloquent\Collection;

class WorkoutCategoryService
{
    /**
     * Get all workout categories
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function getAllWorkoutCategories(): Collection
    {
        return WorkoutCategory::all();
    }

    /**
     * Get workout category by id
     *
     * @param int $id
     * @return \App\Models\WorkoutCategory
     */
    public function getWorkoutCategoryById(int $id)
    {
        return WorkoutCategory::find($id);
    }

    /**
     * Create workout category
     *
     * @param array<string, mixed> $data
     * @return \App\Models\WorkoutCategory
     */
    public function createWorkoutCategory(array $data)
    {
        return WorkoutCategory::create($data);
    }

    /**
     * Update workout category
     *
     * @param \App\Models\WorkoutCategory $workoutCategory
     * @param array<string, mixed> $data
     * @return \App\Models\WorkoutCategory
     */

    public function updateWorkoutCategory(WorkoutCategory $workoutCategory, array $data)
    {
        $workoutCategory->update($data);
        return $workoutCategory;
    }

    /**
     * Delete workout category
     *
     * @param \App\Models\WorkoutCategory $workoutCategory
     * @return bool
     */
    public function deleteWorkoutCategory(WorkoutCategory $workoutCategory)
    {
        return $workoutCategory->delete();
    }

}
