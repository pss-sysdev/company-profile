<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class OwnerCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('owner.pages.category.index', [
            'type_menu'  => 'company',
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('owner.pages.category.create', [
            'type_menu' => 'company'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => ['required'],
            'category_code' => ['required'],
            // 'sub_category_name' => ['required'],
            'picture_url' => ['required', 'mimes:jpeg,png,gif']
        ]);

        $category                    = new Category();
        $category->name              = $request->name;
        $category->category_code     = $request->category_code;
        $category->sub_category_name = $request->sub_category_name;

        $final_name = 'picture_url_' . time() . '.' . $request->picture_url->extension();
        $request->picture_url->move(public_path('uploads'), $final_name);
        $category->picture_url    = $final_name;
        $category->is_discontinue = $request->is_discontinue;

        $category->save();

        return redirect()->route('owner.category')->with('success', 'Data is added successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('owner.pages.category.edit', ['type_menu' => 'company', 'category' => $category]);
    }

    public function update(Request $request, $id)
    {

        $category = Category::find($id);

        $request->validate([
            'name'              => ['required'],
            'category_code'     => ['required'],
            'sub_category_name' => ['required'],
        ]);

        if ($request->picture_url != null) {
            if ($category->picture_url) {
                unlink(public_path('uploads/' . $category->picture_url));
            }

            $final_name = 'picture_url_' . time() . '.' . $request->picture_url->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $category->picture_url = $final_name;
        }

        $category->name              = $request->name;
        $category->category_code     = $request->category_code;
        $category->sub_category_name = $request->sub_category_name;
        $category->update();

        return redirect()->route('owner.category')->with('success', __('Data is updated successfully'));
    }

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
