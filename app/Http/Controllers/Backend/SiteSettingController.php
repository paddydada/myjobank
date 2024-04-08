<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\sitesetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\seo;


class SiteSettingController extends Controller
{
    public function sitesetting()
    {
        $setting = sitesetting::find(1);
        return view('backend.setting.setting_update', compact('setting'));
    }



    public function sitesettingupdate(Request $request)
    {
        $request->validate([
            'support_phone' => 'required|numeric|digits:10',
            'whatsapp_phone' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'company_address' => 'required|string',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'twitter' => 'nullable|string',
            'copyright' => 'required|string',
        ]);

        $setting_id = $request->id;
        $setting = sitesetting::findOrFail($setting_id);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('upload/logo/', $name_gen);

            if (!empty($setting->logo) && Storage::exists($setting->logo)) {
                Storage::delete($setting->logo);
            }

            $setting->update([
                'logo' => $name_gen,
            ]);
        }

        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $favicon_gen = hexdec(uniqid()) . '.' . $favicon->getClientOriginalExtension();
            $favicon->move('upload/favicon/', $favicon_gen);

            if (!empty($setting->favicon) && file_exists(public_path($setting->favicon))) {
                unlink(public_path($setting->favicon));
            }

            $setting->update([
                'favicon' => $favicon_gen,
            ]);
        }

        $setting->update([
            'support_phone' => $request->support_phone,
            'whatsapp_phone' => $request->whatsapp_phone,
            'email' => $request->email,
            'company_address' => $request->company_address,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'copyright' => $request->copyright,
        ]);

        $notification = [
            'message' => 'Site Setting Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }





    public function seosetting()
    {
        $seo = seo::find(1);
        return view('backend.setting.seo_update', compact('seo'));
    }

    public function seosettingUpdate(Request $request)
    {
        $request->validate([
            'meta_title' => 'required|string|max:255',
            'meta_author' => 'required|string|max:255',
            'meta_keyword' => 'required|string',
            'meta_description' => 'required|string',
        ]);

        $seo_id = $request->id;
        $seoSetting = seo::findOrFail($seo_id);

        $seoSetting->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
        ]);

        $notification = [
            'message' => 'SEO Settings Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }









}
