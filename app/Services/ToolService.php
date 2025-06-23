<?php

namespace App\Services;

use App\Models\Tool;

class ToolService
{
    /**
     * Get all Tools
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllTools()
    {
        return Tool::all();
    }

    /**
     * Get Tool by id
     *
     * @param int $id
     * @return \App\Models\Tool
     */
    public function getToolById(int $id)
    {
        return Tool::find($id);
    }

    /**
     * Create Tool
     *
     * @param array<string, mixed> $data
     * @return \App\Models\Tool
     */
    public function createTool(array $data)
    {
        return Tool::create($data);
    }

    /**
     * Update Tool
     *
     * @param \App\Models\Tool $tool
     * @param array<string, mixed> $data
     * @return \App\Models\Tool
     */
    public function updateTool(Tool $tool, array $data)
    {
        $tool->update($data);
        return $tool;
    }

    /**
     * Delete Tool
     *
     * @param \App\Models\Tool $tool
     * @return bool
     */
    public function deleteTool(Tool $tool)
    {
        return $tool->delete();
    }
}
