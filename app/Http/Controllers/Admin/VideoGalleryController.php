<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Models\GalleryGroup;
use App\Models\VideoGallery;
use App\Traits\RedirectHelperTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VideoGalleryController extends Controller
{
    use RedirectHelperTrait;

    public function __construct(private VideoGallery $videoGallery, private GalleryGroup $galleryGroup)
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('gallery.video.view');
        $videoGalleries = $this->videoGallery->with('group')->paginate(20);
        return view('admin.pages.videos.index', compact('videoGalleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('gallery.video.create');
        $galleryGroups = $this->galleryGroup->where('type', 'video')->get();
        return view('admin.pages.videos.create', compact('galleryGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        checkAdminHasPermissionAndThrowException('gallery.video.store');
        $request->validate([
            'group_id' => 'required',
            'status' => 'required',
            'video_link.*' => 'required',
            'video_image.*' => 'required',
        ], [
            'video_link.*.required' => 'Video link is required',
            'video_image.*.required' => 'Video image is required',
        ]);

        $data = $request->only(['group_id', 'status']);

        try {
            if ($request->video_link) {
                $videos = [];
                foreach ($request->video_link as $index => $video) {
                    $img = isset($request->video_image[$index]) ? $request->video_image[$index] : null;
                    if ($img) {

                        $img = file_upload($request->video_image[$index], null, '/uploads/custom-images/video-gallery/');
                    }
                    $video = ['link' => $video, 'image' =>  $img];
                    $videos[] = $video;
                }
                $data['videos'] = $videos;
            }

            $gallery = $this->videoGallery->create($data);
            if ($gallery) {
                return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.galleryVideo.edit', ['galleryVideo' => $gallery->id], ['message' => 'Video Gallery Created', 'alert-type' => 'success']);
            }
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.galleryVideo.index', [], ['message' => 'Video Gallery Created Failed', 'alert-type' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        checkAdminHasPermissionAndThrowException('gallery.video.edit');
        $video = $this->videoGallery->find($id);
        $galleryGroups = $this->galleryGroup->where('type', 'video')->get();
        return view('admin.pages.videos.edit', compact('video', 'galleryGroups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('gallery.video.update');
        $videoData = $this->videoGallery->find($id);
        $request->validate([
            'group_id' => 'required',
            'status' => 'required',
            'video_link.*' => 'required',
        ], [
            'video_link.*.required' => 'Video link is required',
        ]);

        try {
            $data = $request->only(['group_id', 'status']);
            $videos = [];

            if ($request->video_link) {
                foreach ($request->video_link as $index => $video) {
                    if (isset($request->video_image[$index]) && $request->video_image[$index]) {
                        $image = file_upload($request->video_image[$index], null, '/uploads/custom-images/workout/');
                    } else {

                        $image = isset($videoData->videos[$index]['image']) ? $videoData->videos[$index]['image'] : null;
                    }
                    $video = ['link' => $video, 'image' =>  $image];


                    $videos[] = $video;
                }
            }
            $data['videos'] = $videos;

            $videoData->update($data);

            if ($videoData) {
                return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.galleryVideo.index');
            } else {
                return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.galleryVideo.edit', ['galleryVideo' => $videoData->id]);
            }
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.galleryVideo.edit', ['galleryVideo' => $videoData->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('gallery.video.delete');
        $video = $this->videoGallery->find($id);
        if ($video) {
            $video->delete();
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.galleryVideo.index');
        }
        return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.galleryVideo.index');
    }
}
