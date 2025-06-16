<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class OwnerCategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        $categories = Category::with('parent')->get();
        // dd($categories);
        return view('owner.pages.category.index', [
            'type_menu'  => 'company',
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $parent_cat = Category::all();
        return view('owner.pages.category.create', [
            'type_menu' => 'company',
            'parent_cat' => $parent_cat
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'            => ['required'],
            'category_code'   => ['required'],
            'picture_url'     => ['required', 'mimes:jpg,jpeg,png,gif,webp'],
        ]);

        $category = new Category();
        $category->name             = $request->name;
        $category->category_code    = $request->category_code;
        $category->parent_cat_id    = $request->id_parent_cat;
        $category->is_discontinue   = $request->is_discontinue;

        $manager = new ImageManager(new Driver());

        if ($request->hasFile('picture_url')) {
            $image = $request->file('picture_url');
            $filenameOnly = 'picture_url_' . time() . '.webp';
            $filename = 'category/' . $filenameOnly;
            $destination = public_path('uploads/' . $filename);

            $directory = dirname($destination);
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            $manager->read($image->getRealPath())
                ->toWebp(80)
                ->save($destination);

            $category->picture_url = $filename;
        }

        $category->save();

        return redirect()->route('owner.category')->with('success', 'Data is added successfully');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name'          => ['required'],
    //         'category_code' => ['required'],
    //         // 'sub_category_name' => ['required'],
    //         'picture_url' => ['required', 'mimes:jpg,jpeg,png,gif']
    //     ]);

    //     $category                    = new Category();
    //     $category->name              = $request->name;
    //     $category->category_code     = $request->category_code;
    //     $category->parent_cat_id        = $request->id_parent_cat;

    //     $final_name = 'picture_url_' . time() . '.' . $request->picture_url->extension();
    //     $request->picture_url->move(public_path('uploads'), $final_name);
    //     $category->picture_url    = $final_name;
    //     $category->is_discontinue = $request->is_discontinue;

    //     $category->save();

    //     return redirect()->route('owner.category')->with('success', 'Data is added successfully');
    // }

    public function edit($id)
    {
        $category = Category::find($id);
        $parent_cat = Category::where('id', '!=', $category->id)->get();
        return view('owner.pages.category.edit', [
            'type_menu' => 'company',
            'category' => $category,
            'parent_cat' => $parent_cat
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name'          => ['required'],
            'category_code' => ['required'],
            'picture_url'   => ['nullable', 'mimes:jpg,jpeg,png,gif,webp'],
        ]);

        if ($request->hasFile('picture_url')) {
            if (!empty($category->picture_url)) {
                $old = public_path('uploads/' . $category->picture_url);
                if (file_exists($old)) {
                    unlink($old);
                }
            }

            $image = $request->file('picture_url');
            $filenameOnly = 'picture_url_' . time() . '.webp';
            $filename = 'category/' . $filenameOnly;
            $destination = public_path('uploads/' . $filename);

            $directory = dirname($destination);
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            $manager = new ImageManager(new Driver());
            $manager->read($image->getRealPath())
                ->toWebp(80)
                ->save($destination);

            $category->picture_url = $filename;
        }

        $category->name            = $request->name;
        $category->category_code   = $request->category_code;
        $category->parent_cat_id   = $request->id_parent_cat;
        $category->is_discontinue  = $request->is_discontinue;

        $category->update();

        return redirect()->route('owner.category')->with('success', __('Data is updated successfully'));
    }

    // public function update(Request $request, $id)
    // {

    //     $category = Category::find($id);

    //     $request->validate([
    //         'name'              => ['required'],
    //         'category_code'     => ['required'],
    //         // 'sub_category_name' => ['required'],
    //     ]);

    //     if ($request->hasFile('picture_url')) {
    //         $request->validate([
    //             'picture_url' => 'mimes:jpg,jpeg,png',
    //         ]);
            
    //         if ($category->picture_url) {
    //             $file = public_path('uploads/' . $category->picture_url);
            
    //             if (file_exists($file)) {
    //                 unlink($file);
    //             }
    //         }
        
    //         $final_name = 'picture_url_' . time() . '.' . $request->picture_url->extension();
    //         $request->picture_url->move(public_path('uploads'), $final_name);
    //         $category->picture_url = $final_name;
    //     }

    //     $category->name              = $request->name;
    //     $category->category_code     = $request->category_code;
    //     $category->parent_cat_id        = $request->id_parent_cat;
    //     $category->update();

    //     return redirect()->route('owner.category')->with('success', __('Data is updated successfully'));
    // }

    public function destroy($id)
    {
        $category = Category::find($id);

        if ($category->picture_url) {
            unlink(public_path('uploads/' . $category->picture_url));
        }
        $category->delete();

        return redirect()->route('owner.category')->with('success', __('Data is deleted successfully'));
    }
}
