<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToolRequest;
use App\Services\ToolService;

class ToolController extends Controller
{
    private $toolService;
    public function __construct(ToolService $toolService)
    {
        $this->middleware('auth:admin');
        $this->toolService = $toolService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = $this->toolService->getAllTools();
        return view('admin.tools.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ToolRequest $request)
    {
        // store tools
        $this->toolService->createTool($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ToolRequest $request, string $id)
    {
        // update tool
        $tool = $this->toolService->getToolById($id);
        $this->toolService->updateTool($tool, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete tool
        $tool = $this->toolService->getToolById($id);
        $this->toolService->deleteTool($tool);
    }
}
