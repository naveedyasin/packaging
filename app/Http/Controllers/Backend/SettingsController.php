<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function index()
    {
        $setting = Setting::latest()->first();
        return view('backend.settings.index')->withSetting($setting);
    }

    public function updateBasic(Request $request, Setting $setting)
    {
        if($request->hasFile('favicon')) {
            $setting->update([
                'favicon' => request()->favicon->store('images', 'public'),
            ]);
            $favicon = Image::make(public_path('storage/' . $setting->favicon))->resize(50, 50);
            $favicon->save();
        }
        if($request->hasFile('logo')) {
            $setting->update([
                'logo' => request()->logo->store('images', 'public'),
            ]);
            $logo = Image::make(public_path('storage/' . $setting->logo))->resize(150, 70);
            $logo->save();
        }

        $setting->website_title = $request->website_title;
        $setting->contact_email = $request->contact_email;
        $setting->contact_number = $request->contact_number;
        $setting->from_name = $request->from_name;
        $setting->from_email = $request->from_email;
        $setting->custom_css = $request->custom_css;
        $setting->custom_js = $request->custom_js;
        $setting->save();

        return redirect()->route('admin.settings')->with('success', 'Setting updated successfully');
    }

    public function updateEmail(Request $request, Setting $setting)
    {
        $setting->smtp_protocol = $request->smtp_protocol;
        $setting->smtp_username = $request->smtp_username;
        $setting->smtp_password = $request->smtp_password;
        $setting->smtp_port = $request->smtp_port;
        $setting->smtp_security = $request->smtp_security;
        $setting->mail_driver = $request->mail_driver;
        $setting->mail_sendmail = $request->mail_sendmail;
        $setting->mail_pretend = $request->mail_pretend;
        $setting->mailgun_domain = $request->mailgun_domain;
        $setting->mailgun_secret = $request->mailgun_secret;
        $setting->mandrill_secret = $request->mandrill_secret;
        $setting->sparkpost_secret = $request->sparkpost_secret;
        $setting->ses_key = $request->ses_key;
        $setting->ses_secret = $request->ses_secret;
        $setting->ses_region = $request->ses_region;

        $setting->save();

        return redirect()->route('admin.settings')->with('success', 'Email settings updated successfully');
    }

    public function updateSEO(Request $request, Setting $setting)
    {
        $setting->meta_keyword = $request->meta_keyword;
        $setting->meta_description = $request->meta_description;
        $setting->analytics_code = $request->analytics_code;
        $setting->save();

        return redirect()->route('admin.settings')->with('success', 'SEO setting updated successfully');
    }

    public function updateCookieSetting(Request $request, Setting $setting)
    {
        $setting->cookie_alert_btn_text = $request->cookie_alert_btn_text;
        $setting->cookie_alert_text = $request->cookie_alert_text;
        $setting->cookie_alert = 0;
        if($request->has('cookie_alert')) {
            $setting->cookie_alert = 1;
        }
        $setting->save();

        return redirect()->route('admin.settings')->with('success', 'Cookie setting updated successfully');
    }
}
