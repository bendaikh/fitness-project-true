<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Models\GalleryGroup;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GalleryGroupController extends Controller
{
    use RedirectHelperTrait;

    public function __construct(private GalleryGroup $galleryGroup)
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        checkAdminHasPermissionAndThrowException('gallery.group.view');
        $galleryGroups = $this->galleryGroup->paginate(20);
        return view('admin.pages.galleryGroup.index', compact('galleryGroups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('gallery.group.create');
        return view('admin.pages.galleryGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        checkAdminHasPermissionAndThrowException('gallery.group.store');
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:image,video',
        ]);

        try {
            $galleryGroup = GalleryGroup::create([
                'name' => $request->name,
                'type' => $request->type,
                'status' => $request->status,
            ]);

            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.galleryGroup.edit', ['galleryGroup' => $galleryGroup->id], ['message' => 'Gallery Group created successfully.', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.galleryGroup.create', [], ['message' => 'Something went wrong.', 'alert-type' => 'error']);
        }
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
        checkAdminHasPermissionAndThrowException('gallery.group.edit');
        $group = $this->galleryGroup->find($id);
        return view('admin.pages.galleryGroup.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('gallery.group.update');
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:image,video',
        ]);

        try {
            $galleryGroup = $this->galleryGroup->find($id);
            $galleryGroup->name = $request->name;
            $galleryGroup->type = $request->type;
            $galleryGroup->status = $request->status;
            $galleryGroup->save();

            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.galleryGroup.index', [], ['message' => 'Gallery Group updated successfully.', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.galleryGroup.edit', ['id' => $id], ['message' => 'Something went wrong.', 'alert-type' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('gallery.group.delete');
        try {
            $galleryGroup = $this->galleryGroup->find($id);
            $galleryGroup->delete();
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.galleryGroup.index', [], ['message' => 'Gallery Group deleted successfully.', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.galleryGroup.index', [], ['message' => 'Something went wrong.', 'alert-type' => 'error']);
        }
    }

    /**
     * status function
     *
     * @param Request $request
     * @return response json
     */
    public function status(Request $request)
    {
        checkAdminHasPermissionAndThrowException('gallery.group.update');
        $galleryGroup = $this->galleryGroup->find($request->id);
        $galleryGroup->status = !$galleryGroup->status;
        $galleryGroup->save();
        return response()->json(['status' => 'success', 'message' => __('Status updated successfully.')]);
    }
}
