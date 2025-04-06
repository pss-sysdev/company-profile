<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OwnerSettingController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        $setting = Setting::find(1);
        return view('owner.pages.setting.general', [
            'type_menu' => 'setting-general',
            'setting' => $setting
        ]);
    }

    public function update(Request $request)
    {
        $setting = Setting::find(1);
        Log::debug($request->all());
        if ($request->logo != null) {
            $request->validate([
                'logo' => ['required', 'mimes:jpeg,png,gif'],
            ], [
                'logo.required' => __('Logo is required'),
                'logo.mimes' => __('Logo must be jpeg, png, jpg or gif'),
            ]);
            if ($setting->logo != '') {
                try {
                    unlink(public_path('uploads/' . $setting->logo));
                } catch (Exception $e) {
                }
            }

            $final_name = 'logo_' . time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads'), $final_name);
            $setting->logo = $final_name;
        }

        if ($request->favicon != null) {
            $request->validate([
                'favicon' => ['required', 'mimes:jpeg,png,gif'],
            ], [
                'favicon.required' => __('Favicon is required'),
                'favicon.mimes' => __('Favicon must be jpeg, png, jpg or gif'),
            ]);
            if ($setting->favicon != '') {
                try {
                    unlink(public_path('uploads/' . $setting->favicon));
                } catch (Exception $e) {
                }
            }
            $final_name = 'favicon_' . time() . '.' . $request->favicon->extension();
            $request->favicon->move(public_path('uploads'), $final_name);
            $setting->favicon = $final_name;
        }


        $setting->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }
}
