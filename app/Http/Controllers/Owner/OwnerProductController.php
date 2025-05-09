<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductExternalLink;
use App\Models\ProductSpec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

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
            'id_category' => ['required'],
            'id_brand' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'sku_code' => ['required'],
            'main_picture_url' => ['required', 'mimes:jpg,jpeg,png,gif'],
        ]);

        $slug = Str::slug($request->slug ?? $request->name, '-');

        if (Product::where('slug', $slug)->exists()) {
            return redirect()->back()->withErrors(['slug' => 'Product slug/url already exists. Try a different name.'])->withInput();
        }

        $product = new Product();

        $final_name = 'main_picture_url_' . time() . '.' . $request->main_picture_url->extension();
        $request->main_picture_url->move(public_path('uploads'), $final_name);
        $product->main_picture_url = $final_name;

        $product->name = $request->name;
        $product->slug = $slug;
        $product->id_category = $request->id_category;
        $product->id_brand = $request->id_brand;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sku_code = $request->sku_code;
        $product->is_top_product = $request->is_top_product;
        $product->is_discontinue = $request->is_discontinue;
        $product->is_rental = $request->is_rental;
        $product->is_indent = $request->is_indent;
        $product->rental_price = $request->rental_price ?? '';
        $product->save();

        $dataProductSpec = $this->mappingDataAdditionalInformation($request, $product);
        if ($dataProductSpec != null)
            foreach ($dataProductSpec as $data) {
                ProductSpec::create($data);
            }

        $dataExternalLink = $this->mappingDataExternalLink($request, $product);
        if ($dataExternalLink != null)
            foreach ($dataExternalLink as $data) {
                ProductExternalLink::create($data);
            }

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
            // 'slug' => [
            //     'required',
            //     'alpha_dash',
            //     Rule::unique('product')->ignore($product->id)
            // ],
            'id_category' => ['required'],
            'id_brand' => ['required'],
            // 'description' => ['required'],
            'price' => ['required'],
            'sku_code' => ['required'],
            'main_picture_url' => 'mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('main_picture_url')) {
            $request->validate([
                'main_picture_url' => 'mimes:jpg,jpeg,png',
            ]);
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

        $slug = Str::slug($request->slug ?? $request->name, '-');

        if (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
            return redirect()->back()->withErrors(['slug' => 'Product slug/url already exists. Try a different name.'])->withInput();
        }


        $product->name = $request->name;
        $product->slug = $slug;
        $product->id_category = $request->id_category;
        $product->id_brand = $request->id_brand;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sku_code = $request->sku_code;
        $product->is_top_product = $request->is_top_product;
        $product->is_discontinue = $request->is_discontinue;
        $product->is_rental = $request->is_rental;
        $product->is_indent = $request->is_indent;
        $product->rental_price = $request->rental_price ?? '';
        $product->update();

        $dataProductSpec = $this->mappingDataAdditionalInformation($request, $product);
        if ($dataProductSpec != null) {
            ProductSpec::where('product_id', $product->id)->delete();
            foreach ($dataProductSpec as $data) {
                ProductSpec::create($data);
            }
        }
        $dataExternalLink = $this->mappingDataExternalLink($request, $product);
        if ($dataExternalLink != null) {
            ProductExternalLink::where('product_id', $product->id)->delete();
            foreach ($dataExternalLink as $data) {
                ProductExternalLink::create($data);
            }
        }

        return redirect()->route('owner.product')->with('success', __('Data is updated successfully'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->spec()->delete();
        $product->externalLink()->delete();

        if ($product->picture_url) {
            unlink(public_path('uploads/' . $product->picture_url));
        }
        $product->delete();

        return redirect()->route('owner.product')->with('success', __('Data is deleted successfully'));
    }

    private function mappingDataAdditionalInformation($request, $product)
    {
        // $request = '';
        $mappedData = [];
        foreach ($request->input('addtional_information__data') ?? [] as $key => $data) {
            if ($data != null)
                $mappedData[$key]['data'] = $data;
        }
        foreach ($request->input('addtional_information__title') ?? []  as $key => $data) {
            if ($data != null)
                $mappedData[$key]['title'] = $data;
        }
        foreach ($mappedData as $key => $data) {
            $mappedData[$key]['product_id'] = $product->id;
            $mappedData[$key]['sort_number'] = $key;
        }
        return $mappedData;
    }

    private function mappingDataExternalLink($request, $product)
    {
        $mappedData = [];
        foreach ($request->input('external-link-tab__title') ?? [] as $key => $data) {
            if ($data != null)
                $mappedData[$key]['link_name'] = $data;
        }
        foreach ($request->input('external-link-tab__link') ?? []  as $key => $data) {
            if ($data != null)
                $mappedData[$key]['link'] = $data;
        }
        foreach ($request->input('external-link-tab__color') ?? []  as $key => $data) {
            if ($data != null)
                $mappedData[$key]['hex_color'] = $data;
        }
        foreach ($mappedData as $key => $data) {
            $mappedData[$key]['product_id'] = $product->id;
        }
        return $mappedData;
    }
}
