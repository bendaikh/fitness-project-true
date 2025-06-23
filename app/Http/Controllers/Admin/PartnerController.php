<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Str;

class PartnerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        checkAdminHasPermissionAndThrowException('partner.view');
        $partners = Partner::all();
        return view('admin.pages.manage-home-page.partner.index', compact('partners'));
    }

    public function create()
    {
        checkAdminHasPermissionAndThrowException('partner.create');
        return view('admin.pages.manage-home-page.partner.create');
    }


    public function store(Request $request)
    {
        checkAdminHasPermissionAndThrowException('partner.store');
        $rules = [
            'logo' => 'required'
        ];
        $customMessages = [
            'logo.required' => __('Logo is required')
        ];
        $this->validate($request, $rules, $customMessages);

        $partner = new Partner();
        if ($request->logo) {
            $logo_name = file_upload($request->logo, null, 'uploads/custom-images/partner/');
            $partner->logo = $logo_name;
        }
        $partner->link = $request->link;
        $partner->status = $request->status;
        $partner->save();

        $notification = __('Created Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.partner.edit', $partner->id)->with($notification);
    }


    public function edit($id)
    {
        checkAdminHasPermissionAndThrowException('partner.edit');
        $partner = Partner::find($id);
        return view('admin.pages.manage-home-page.partner.edit', compact('partner'));
    }


    public function update(Request $request, $id)
    {
        checkAdminHasPermissionAndThrowException('partner.update');
        $partner = Partner::find($id);

        if ($request->logo) {
            $old_logo = $partner->logo;
            $logo_name = file_upload($request->logo, $old_logo, 'uploads/custom-images/partner/');
            $partner->logo = $logo_name;
        }

        $partner->link = $request->link;
        $partner->status = $request->status;
        $partner->save();

        $notification = __('Update Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.partner.index')->with($notification);
    }


    public function destroy($id)
    {
        checkAdminHasPermissionAndThrowException('partner.delete');
        $partner = Partner::find($id);
        $old_logo = $partner->logo;
        if ($old_logo) {
            file_delete($old_logo);
        }
        $partner->delete();

        $notification = __('Delete Successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.partner.index')->with($notification);
    }

    public function changeStatus($id)
    {
        checkAdminHasPermissionAndThrowException('partner.update');
        $partner = Partner::find($id);
        if ($partner->status == 1) {
            $partner->status = 0;
            $partner->save();
            $message = __('InActive Successfully');
        } else {
            $partner->status = 1;
            $partner->save();
            $message = __('Active Successfully');
        }
        return response()->json($message);
    }
}
