<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class OwnerBrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('owner.pages.brand.index', [
            'type_menu' => 'company',
            'brands' => $brands
        ]);
    }

    public function create()
    {
        return view('owner.pages.brand.create', [
            'type_menu' => 'company'
        ]);
    }

    public function store(Request $request)
    {
        if ($request->is_own == 1) {
            $request->validate([
                'name' => ['required', 'unique:brand'],
                'url' => ['required', 'alpha_dash', 'unique:brand,url'],
                // 'description' => ['required'],
                'logo_picture' => ['required', 'mimes:jpeg,png,gif'],
                'logo_picture2' => ['nullable', 'mimes:jpeg,png,gif'],
                'banner_picture' => ['nullable', 'mimes:jpeg,png,gif'],
                'bg_logo_picture' => ['nullable', 'mimes:jpeg,png,gif'],
                'title' => 'required',
                'description' => 'required',
            ]);
        }else{
            $request->validate([
                'name' => ['required', 'unique:brand'],
                'url' => ['required', 'alpha_dash', 'unique:brand,url'],
                // 'description' => ['required'],
                'logo_picture' => ['required', 'mimes:jpeg,png,gif'],
                'logo_picture2' => ['nullable', 'mimes:jpeg,png,gif'],
                'banner_picture' => ['nullable', 'mimes:jpeg,png,gif'],
                'bg_logo_picture' => ['nullable', 'mimes:jpeg,png,gif'],
            ]);
        }

        $brand = new Brand();

        if ($request->hasFile('logo_picture')) {
            $final_name = 'logo_picture_' . time() . '.' . $request->logo_picture->extension();
            $request->logo_picture->move(public_path('uploads'), $final_name);
            $brand->logo_picture = $final_name;
        }
        
        if ($request->hasFile('logo_picture2')) {
            $final_name2 = 'logo_picture2_' . time() . '.' . $request->logo_picture2->extension();
            $request->logo_picture2->move(public_path('uploads'), $final_name2);
            $brand->logo_picture2 = $final_name2;
        }
        
        if ($request->hasFile('banner_picture')) {
            $final_name3 = 'banner_picture_' . time() . '.' . $request->banner_picture->extension();
            $request->banner_picture->move(public_path('uploads'), $final_name3);
            $brand->banner_picture = $final_name3;
        }
        
        if ($request->hasFile('bg_logo_picture')) {
            $final_name4 = 'bg_logo_picture_' . time() . '.' . $request->bg_logo_picture->extension();
            $request->bg_logo_picture->move(public_path('uploads'), $final_name4);
            $brand->bg_logo_picture = $final_name4;
        }        

        $brand->name = $request->name;
        $brand->url = strtolower($request->url);
        $brand->is_own = $request->is_own;
        $brand->save();

        $brand->section()->create([
            'title' => $request->title,
            'description' => $request->description,
            'is_show_brand_product' => 1
        ]);

        return redirect()->route('owner.brand')->with('success', 'Data is added successfully');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);

        return view('owner.pages.brand.edit', [
            'type_menu' => 'company',
            'brand' => $brand
        ]);
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'name' => ['required', 'unique:brand,name,' . $id],
            'url' => ['required', 'alpha_dash', 'unique:brand,url,' . $id],
            // 'description' => ['required'],
        ]);
        $obj = Brand::find($id);

        if ($request->logo_picture != null) {
            $request->validate([
                'logo_picture' => 'mimes:jpg,jpeg,png',
            ]);

            if ($obj->logo_picture != null) {
                $filePath = 'uploads/' . $obj->logo_picture;
                if (file_exists($filePath) && is_file($filePath)) {
                    unlink(public_path($filePath));
                }
            }

            $final_name = 'logo_picture_' . time() . '.' . $request->logo_picture->extension();
            $request->logo_picture->move(public_path('uploads'), $final_name);
            $obj->logo_picture = $final_name;
        }

        if ($request->logo_picture2 != null) {
            $request->validate([
                'logo_picture2' => 'mimes:jpg,jpeg,png',
            ]);

            if ($obj->logo_picture2 != null) {
                $filePath = 'uploads/' . $obj->logo_picture2;
                if (file_exists($filePath) && is_file($filePath)) {
                    unlink(public_path($filePath));
                }
            }

            $final_name = 'logo_picture2_' . time() . '.' . $request->logo_picture2->extension();
            $request->logo_picture2->move(public_path('uploads'), $final_name);
            $obj->logo_picture2 = $final_name;
        }

        if ($request->banner_picture != null) {
            $request->validate([
                'banner_picture' => 'mimes:jpg,jpeg,png',
            ]);

            if ($obj->banner_picture != null) {
                $filePath = 'uploads/' . $obj->banner_picture;
                if (file_exists($filePath) && is_file($filePath)) {
                    unlink(public_path($filePath));
                }
            }

            $final_name = 'banner_picture_' . time() . '.' . $request->banner_picture->extension();
            $request->banner_picture->move(public_path('uploads'), $final_name);
            $obj->banner_picture = $final_name;
        }

        if ($request->bg_logo_picture != null) {
            $request->validate([
                'bg_logo_picture' => 'mimes:jpg,jpeg,png',
            ]);

            if ($obj->bg_logo_picture != null) {
                $filePath = 'uploads/' . $obj->bg_logo_picture;
                if (file_exists($filePath) && is_file($filePath)) {
                    unlink(public_path($filePath));
                }
            }

            $final_name = 'bg_logo_picture_' . time() . '.' . $request->bg_logo_picture->extension();
            $request->bg_logo_picture->move(public_path('uploads'), $final_name);
            $obj->bg_logo_picture = $final_name;
        }

        $obj->name = $request->name;
        $obj->url = strtolower($request->url);
        $obj->is_own = $request->is_own;
        $obj->update();
        $obj->section()->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('owner.brand')->with('success', 'Data is updated successfully');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);

        if ($brand->logo_picture) {
            $filePath = 'uploads/' . $brand->logo_picture;
            if (file_exists($filePath) && is_file($filePath)) {
                unlink(public_path($filePath));
            }
        }
        if ($brand->logo_picture2) {
            $filePath = 'uploads/' . $brand->logo_picture2;
            if (file_exists($filePath) && is_file($filePath)) {
                unlink(public_path($filePath));
            }
        }
        if ($brand->banner_picture) {
            $filePath = 'uploads/' . $brand->banner_picture;
            if (file_exists($filePath) && is_file($filePath)) {
                unlink(public_path($filePath));
            }
        }
        if ($brand->bg_logo_picture) {
            $filePath = 'uploads/' . $brand->bg_logo_picture;
            if (file_exists($filePath) && is_file($filePath)) {
                unlink(public_path($filePath));
            }
        }
        $brand->delete();
        return redirect()->route('owner.brand')->with('success', 'Data is deleted successfully');
    }
}
