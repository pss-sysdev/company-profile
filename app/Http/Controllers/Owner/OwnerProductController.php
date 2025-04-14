<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OwnerProductController extends Controller
{
    public function index()
    {


        // $products = Product::all();
        $products = Product::with(['category', 'brand'])->get();
        // dd($products);
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
            'name' => [
                'required',
                Rule::unique('product')->ignore($product->id)
            ],
            'slug' => [
                'required',
                'alpha_dash',
                Rule::unique('product')->ignore($product->id)
            ],
            'id_category' => ['required'],
            'id_brand' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'sku_code' => ['required'],
        ]);

        if ($request->hasFile('main_picture_url')) {
            if ($product->main_picture_url) {
                $file = public_path('uploads/' . $product->main_picture_url);
            
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        
            $final_name = 'main_picture_url_' . time() . '.' . $request->main_picture_url->extension();
            $request->main_picture_url->move(public_path('uploads'), $final_name);
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
