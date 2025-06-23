<?php

namespace Modules\NewsLetter\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\NewsLetter\app\Jobs\SendMailToNewsletterJob;
use Modules\NewsLetter\app\Models\NewsLetter;

class NewsLetterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        checkAdminHasPermissionAndThrowException('newsletter.view');
        $newsletters = NewsLetter::orderBy('id', 'desc')->where('status', 'verified')->paginate(20);

        return view('newsletter::index', ['newsletters' => $newsletters]);
    }

    public function create()
    {
        checkAdminHasPermissionAndThrowException('newsletter.mail');

        return view('newsletter::create');
    }

    public function destroy($id)
    {
        checkAdminHasPermissionAndThrowException('newsletter.delete');
        $newsletter = NewsLetter::find($id);
        $newsletter->delete();

        $notification = __('Deleted successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function store(Request $request)
    {
        checkAdminHasPermissionAndThrowException('newsletter.mail');
        $request->validate([
            'subject' => 'required',
            'description' => 'required',
        ], [
            'subject.required' => __('Subject is required'),
            'description.required' => __('Description is required'),
        ]);

        dispatch(new SendMailToNewsletterJob($request->subject, $request->description));

        $notification = __('Mail send successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }
}
