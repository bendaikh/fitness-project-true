<?php

namespace Modules\ContactMessage\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\ContactMessage\app\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $messages = ContactMessage::orderBy('id', 'desc')->get();

        return view('contactmessage::index', ['messages' => $messages]);
    }

    public function show($id)
    {
        checkAdminHasPermissionAndThrowException('contact.message.view');

        $message = ContactMessage::findOrFail($id);

        return view('contactmessage::show', ['message' => $message]);
    }

    public function destroy($id)
    {
        checkAdminHasPermissionAndThrowException('contact.message.delete');
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        $notification = __('Deleted successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->route('admin.contact-messages')->with($notification);
    }
}
