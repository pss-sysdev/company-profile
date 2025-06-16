<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


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
        $rules = [
            'name' => ['required', 'unique:brand'],
            'url' => ['required', 'alpha_dash', 'unique:brand,url'],
            'logo_picture' => ['required', 'mimes:jpg,jpeg,png,gif,webp'],
            'banner_picture' => ['nullable', 'mimes:jpg,jpeg,png,gif,webp'],
        ];

        if ($request->is_own == 1) {
            $rules['title'] = 'required';
            $rules['description'] = 'required';
        }

        $request->validate($rules);

        $brand = new Brand();
        $manager = new ImageManager(new Driver());

        if ($request->hasFile('logo_picture')) {
            $image = $request->file('logo_picture');
            $filenameOnly = 'logo_picture_' . time() . '.webp';
            $filename = 'brand/' . $filenameOnly;
            $destination = public_path('uploads/' . $filename);
    
            $directory = dirname($destination);
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }
    
            $manager->read($image->getRealPath())
                ->toWebp(80)
                ->save($destination);
    
            $brand->logo_picture = $filename;
        }
        
        if ($request->hasFile('banner_picture')) {
            $image = $request->file('banner_picture');
            $filenameOnly = 'banner_picture_' . time() . '.webp';
            $filename = 'brand/' . $filenameOnly;
            $destination = public_path('uploads/' . $filename);
    
            $directory = dirname($destination);
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }
    
            $manager->read($image->getRealPath())
                ->toWebp(80)
                ->save($destination);
    
            $brand->banner_picture = $filename;
        }

        $brand->name = $request->name;
        $brand->url = strtolower($request->url);
        $brand->is_own = $request->is_own;
        $brand->save();

        $brand->section()->updateOrCreate(
            ['brand_id' => $brand->id],
            [
                'title' => $request->title ?? '',
                'description' => $request->description ?? '',
                'is_show_brand_product' => 1
            ]
        );

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
            'logo_picture' => ['nullable', 'mimes:jpg,jpeg,png,gif,webp'],
            'banner_picture' => ['nullable', 'mimes:jpg,jpeg,png,gif,webp'],
        ]);

        $obj = Brand::findOrFail($id);
        $manager = new ImageManager(new Driver());
        
        if ($request->hasFile('logo_picture')) {
            if (!empty($obj->logo_picture)) {
                $old = public_path('uploads/' . $obj->logo_picture);
                if (file_exists($old)) unlink($old);
            }

            $image = $request->file('logo_picture');
            $filenameOnly = 'logo_picture_' . time() . '.webp';
            $filename = 'brand/' . $filenameOnly;
            $destination = public_path('uploads/' . $filename);

            $directory = dirname($destination);
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            $manager->read($image)
                ->toWebp(80)
                ->save($destination);

            $obj->logo_picture = $filename;
        }
        
        if ($request->hasFile('banner_picture')) {
            if (!empty($obj->banner_picture)) {
                $old = public_path('uploads/' . $obj->banner_picture);
                if (file_exists($old)) unlink($old);
            }

            $image = $request->file('banner_picture');
            $filenameOnly = 'banner_picture_' . time() . '.webp';
            $filename = 'brand/' . $filenameOnly;
            $destination = public_path('uploads/' . $filename);

            $directory = dirname($destination);
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            $manager->read($image)
                ->toWebp(80)
                ->save($destination);

            $obj->banner_picture = $filename;
        }

        $obj->name = $request->name;
        $obj->url = strtolower($request->url);
        $obj->is_own = $request->is_own;
        $obj->update();

        $obj->section()->updateOrCreate(
            ['brand_id' => $obj->id],
            [
                'title' => $request->title ?? '',
                'description' => $request->description ?? '',
                'is_show_brand_product' => 1
            ]
        );

        return redirect()->route('owner.brand')->with('success', 'Data is updated successfully');
    }

    // public function update($id, Request $request)
    // {

    //     $request->validate([
    //         'name' => ['required', 'unique:brand,name,' . $id],
    //         'url' => ['required', 'alpha_dash', 'unique:brand,url,' . $id],
    //         // 'description' => ['required'],
    //     ]);
    //     $obj = Brand::find($id);

    //     if ($request->logo_picture != null) {
    //         $request->validate([
    //             'logo_picture' => 'mimes:jpg,jpeg,png',
    //         ]);

    //         if ($obj->logo_picture != null) {
    //             $filePath = 'uploads/' . $obj->logo_picture;
    //             if (file_exists($filePath) && is_file($filePath)) {
    //                 unlink(public_path($filePath));
    //             }
    //         }

    //         $final_name = 'logo_picture_' . time() . '.' . $request->logo_picture->extension();
    //         $request->logo_picture->move(public_path('uploads'), $final_name);
    //         $obj->logo_picture = $final_name;
    //     }

    //     if ($request->banner_picture != null) {
    //         $request->validate([
    //             'banner_picture' => 'mimes:jpg,jpeg,png',
    //         ]);

    //         if ($obj->banner_picture != null) {
    //             $filePath = 'uploads/' . $obj->banner_picture;
    //             if (file_exists($filePath) && is_file($filePath)) {
    //                 unlink(public_path($filePath));
    //             }
    //         }

    //         $final_name = 'banner_picture_' . time() . '.' . $request->banner_picture->extension();
    //         $request->banner_picture->move(public_path('uploads'), $final_name);
    //         $obj->banner_picture = $final_name;
    //     }

    //     $obj->name = $request->name;
    //     $obj->url = strtolower($request->url);
    //     $obj->is_own = $request->is_own;
    //     $obj->update();
        
    //     $obj->section()->updateOrCreate(
    //         ['brand_id' => $obj->id],
    //         [
    //             'title' => $request->title??'',
    //             'description' => $request->description??'',
    //             'is_show_brand_product' => 1
    //         ]
    //     );

    //     return redirect()->route('owner.brand')->with('success', 'Data is updated successfully');
    // }

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
