<?php

namespace Modules\Media\app\Http\Controllers;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Modules\GlobalSetting\app\Models\CustomPagination;
use Modules\Media\app\Models\Media;

class MediaController extends Controller
{
    use RedirectHelperTrait;


    private $paginateValue;
    public function __construct()
    {
        $this->paginateValue = CustomPagination::where('section_name', 'Media List')->value('item_qty');
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $val = $this->paginateValue % 4;
            $val = $this->paginateValue - $val;
            $media = Media::latest()->paginate($val);
            return response()->json(['success' => true, 'data' => $media], 200);
        }
        checkAdminHasPermissionAndThrowException('media.view');
        $query = Media::query();
        $query->when($request->filled('keyword'), function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->keyword . '%');
            $q->orWhere('alt_text', 'like', '%' . $request->keyword . '%');
            $q->orWhere('description', 'like', '%' . $request->keyword . '%');
        });
        if ($request->filled('par-page')) {
            $media_list = $request->get('par-page') == 'all' ? $query->get() : $query->orderBy('id', 'desc')->paginate($request->get('par-page'))->withQueryString();
        } else {
            $media_list = $query->orderBy('id', 'desc')->paginate($this->paginateValue)->withQueryString();
        }
        return view('media::index', compact('media_list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images'   => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,svg|max:2048', // Adjust the validation rules as needed
        ]);

        $data = $this->allImageUpload($request);

        return response()->json(['success' => true, 'message' => __('Successfully Uploaded'), 'data' => $data], 200);
    }

    private function allImageUpload($request)
    {
        $data = [];
        foreach ($request->file('images') as $image) {
            $extention = $image->getClientOriginalExtension();
            $file_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

            $unique_name = 'media-' . $file_name . '-' . time() . '-' . rand(999, 9999) . '.' . $extention;
            $file_path = 'uploads/media/' . $unique_name;
            $image->move(public_path('uploads/media/'), $unique_name);

            $media = Media::create([
                'title'     => str_replace('-', ' ', $file_name),
                'path'      => $file_path,
                'mime_type' => $image->getClientMimeType(),
            ]);
            $data[] = [
                'id'   => $media->id,
                'path' => $media->path,
            ];
        }
        return $data;
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $media = Media::find($id);
        return response()->json(['success' => true, 'data' => $media], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $media = Media::find($id);
        return view('media::edit', compact('media'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);

        if ($media && $request->hasFile('image')) {
            if ($media->path) {
                if (File::exists(public_path($media->path))) {
                    unlink(public_path($media->path));
                }
            }

            $extention = $request->image->getClientOriginalExtension();
            $file_name = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);

            $unique_name = 'media-' . $file_name . '-' . time() . '-' . rand(999, 9999) . '.' . $extention;
            $file_path = 'uploads/media/' . $unique_name;
            $request->image->move(public_path('uploads/media/'), $unique_name);

            $media->title = $file_name;
            $media->path = $file_path;
            $media->mime_type = $request->image->getClientMimeType();

            $media->save();
        }

        $media->update([
            'alt_text'    => $request->alt_text,
            'description' => $request->description,
        ]);

        return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.media.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        if (File::exists(public_path($media->path))) {
            unlink(public_path($media->path));
        }
        $media->delete();

        if (request()->ajax()) {
            return response()->json(['success' => true, 'message' => __('Successfully Deleted')], 200);
        }
        return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.media.index');
    }

    public function media_search(Request $request)
    {
        $media_list = Media::when($request->keyword, function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('alt_text', 'like', '%' . $request->keyword . '%')
                ->orWhere('description', 'like', '%' . $request->keyword . '%');
        })->orderBy('id', 'desc')->paginate($this->paginateValue)->withQueryString();


        return response()->json(['success' => true, 'data' => $media_list], 200);
    }
    public function media_select(Request $request)
    {
        $media_list = Media::whereIn('id', $request->id_list)->latest()->select('id', 'path')->get();
        return response()->json(['success' => true, 'data' => $media_list], 200);
    }
    public function media_multi_delete(Request $request)
    {
        $media_list = Media::whereIn('id', $request->id_list)->get();
        foreach ($media_list as $media) {
            if (File::exists(public_path($media->path))) {
                unlink(public_path($media->path));
            }
            $media->delete();
        }
        return response()->json(['success' => true, 'message' => __('Successfully Deleted')], 200);
    }
}
