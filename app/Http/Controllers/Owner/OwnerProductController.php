<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class OwnerProductController extends Controller
{
    public function index()
    {


        $products = Product::all();
        return view('owner.pages.product.index', [
            'type_menu' => 'company',
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('owner.pages.product.create', [
            'type_menu' => 'company',
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:product'],
            // 'slug' => ['required', 'alpha_dash', 'unique:product'],
            'id_category' => ['required'],
            'id_brand' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'sku_code' => ['required'],
            'main_picture_url' => ['required', 'mimes:jpeg,png,gif'],
        ]);

        $product = new Product();

        $final_name = 'main_picture_url_' . time() . '.' . $request->main_picture_url->extension();
        $request->main_picture_url->move(public_path('uploads'), $final_name);
        $product->main_picture_url = $final_name;

        $product->name = $request->name;
        $product->slug = trim(preg_replace("/[^a-z0-9]+/", "-", strtolower($request->name)));
        $product->id_category = $request->id_category;
        $product->id_brand = $request->id_brand;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sku_code = $request->sku_code;
        $product->save();



        return redirect()->route('owner.product')->with('success', __('Data is added successfully'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('owner.pages.product.edit', [
            'type_menu' => 'company',
            'categories' => $categories,
            'brands' => $brands,
            'product' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $request->validate([
            'name' => ['required', 'unique:product'],
            'slug' => ['required', 'alpha_dash', 'unique:product'],
            'id_category' => ['required'],
            'id_brand' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'sku_code' => ['required'],
        ]);

        if ($request->main_picture_url != null) {
            if ($product->picture_url) {
                unlink(public_path('uploads/' . $product->picture_url));
            }

            $final_name = 'main_picture_url_' . time() . '.' . $request->picture_url->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $product->main_picture_url = $final_name;
        }

        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->id_category = $request->id_category;
        $product->id_brand = $request->id_brand;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sku_code = $request->sku_code;
        $product->update();

        return redirect()->route('owner.product')->with('success', __('Data is updated successfully'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product->picture_url) {
            unlink(public_path('uploads/' . $product->picture_url));
        }
        $product->delete();

        return redirect()->route('owner.product')->with('success', __('Data is deleted successfully'));
    }
}
