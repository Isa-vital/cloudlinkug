<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $keys = [
            'site_name',
            'tagline',
            'phone',
            'phone2',
            'email',
            'address',
            'facebook',
            'twitter',
            'instagram',
            'linkedin',
            'youtube',
            'whatsapp',
            'google_maps_embed',
            'about_text',
            'footer_text',
            'hero_heading',
            'hero_subheading',
        ];

        foreach ($keys as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key));
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
