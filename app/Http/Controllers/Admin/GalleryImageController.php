<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Models\GalleryGroup;
use App\Models\ImageGallery;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GalleryImageController extends Controller
{
    use RedirectHelperTrait;

    public function __construct(private ImageGallery $imageGallery, private GalleryGroup $galleryGroup)
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('gallery.image.view');
        $galleryImages = $this->imageGallery->paginate(20);
        return view('admin.pages.images.index', compact('galleryImages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('gallery.image.create');
        $galleryGroups = $this->galleryGroup->where('type', 'image')->get();
        return view('admin.pages.images.create', compact('galleryGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        checkAdminHasPermissionAndThrowException('gallery.image.store');
        $request->validate([
            'group_id' => 'required|integer',
            'images' => 'required|array',
        ], [
            'images.required' => 'Please select images.',
            'group_id.required' => 'Please select gallery group.'
        ]);

        try {
            $galleryImage = ImageGallery::create([
                'group_id' => $request->group_id,
                'images' => $request->images,
                'status' => $request->status
            ]);

            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.galleryImage.edit', ['galleryImage' => $galleryImage->id], ['message' => 'Gallery Image created successfully.', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.galleryImage.create', [], ['message' => 'Something went wrong.', 'alert-type' => 'error']);
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
        checkAdminHasPermissionAndThrowException('gallery.image.edit');
        $imageGallery = $this->imageGallery->find($id);
        $galleryGroups = $this->galleryGroup->where('type', 'image')->get();
        return view('admin.pages.images.edit', compact('imageGallery', 'galleryGroups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('gallery.image.update');
        $request->validate([
            'group_id' => 'required|integer',
            'images' => 'required|array',
        ], [
            'images.required' => 'Please select images.',
            'group_id.required' => 'Please select gallery group.'
        ]);

        try {
            $imageGallery = $this->imageGallery->find($id);
            $imageGallery->update([
                'group_id' => $request->group_id,
                'images' => $request->images,
                'status' => $request->status
            ]);

            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.galleryImage.index', [], ['message' => 'Gallery Image updated successfully.', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.galleryImage.edit', ['id' => $id], ['message' => 'Something went wrong.', 'alert-type' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('gallery.image.delete');
        try {
            $this->imageGallery->find($id)->delete();
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.galleryImage.index', [], ['message' => 'Gallery Image deleted successfully.', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.galleryImage.index', [], ['message' => 'Something went wrong.', 'alert-type' => 'error']);
        }
    }

    /**
     * update status
     */

    public function updateStatus(Request $request)
    {
        checkAdminHasPermissionAndThrowException('gallery.image.update');
        try {
            $imageGallery = $this->imageGallery->find($request->id);
            $imageGallery->update([
                'status' => !$imageGallery->status
            ]);

            return response()->json(['status' => 'success', 'message' => 'Status updated successfully.']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Something went wrong.']);
        }
    }
}
