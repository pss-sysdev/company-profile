<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetailPicture;
use App\Models\ProductExternalLink;
use App\Models\ProductSpec;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class OwnerProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand'])->get();

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
            'name'                  => ['required', 'unique:product'],
            'id_category'           => ['required'],
            'id_brand'              => ['required'],
            'description'           => ['required'],
            'price'                 => ['required'],
            'sku_code'              => ['required'],
            'main_picture_url'      => ['required', 'mimes:jpg,jpeg,png,gif,webp'],
            'detail_picture_url.*'  => ['nullable', 'mimes:jpg,jpeg,png,gif,webp'],
        ]);

        $slug = Str::slug($request->slug ?? $request->name, '-');

        if (Product::where('slug', $slug)->exists()) {
            return redirect()->back()
                ->withErrors(['slug' => 'Product slug/url already exists. Try a different name.'])
                ->withInput();
        }

        $product = new Product();

        if ($request->hasFile('main_picture_url')) {
            $product->main_picture_url = $this->uploadImageAsWebp(
                $request->file('main_picture_url'),
                'product',
                'main_picture_url'
            );
        }

        $product->name            = $request->name;
        $product->slug            = $slug;
        $product->id_category     = $request->id_category;
        $product->id_brand        = $request->id_brand;
        $product->description     = $request->description;
        $product->price           = $request->price;
        $product->sku_code        = $request->sku_code;
        $product->is_top_product  = $request->is_top_product;
        $product->is_discontinue  = $request->is_discontinue;
        $product->is_rental       = $request->is_rental;
        $product->is_indent       = $request->is_indent;
        $product->rental_price    = $request->rental_price ?? 0;
        $product->save();

        $this->storeDetailPictures($request, $product);

        $dataProductSpec = $this->mappingDataAdditionalInformation($request, $product);
        if ($dataProductSpec) {
            foreach ($dataProductSpec as $data) {
                ProductSpec::create($data);
            }
        }

        $dataExternalLink = $this->mappingDataExternalLink($request, $product);
        if ($dataExternalLink) {
            foreach ($dataExternalLink as $data) {
                ProductExternalLink::create($data);
            }
        }

        return redirect()->route('owner.product')->with('success', __('Data is added successfully'));
    }

    public function edit($id)
    {
        $product = Product::with('detailPictures')->findOrFail($id);
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
        $product = Product::with('detailPictures')->findOrFail($id);

        $request->validate([
            'name'                  => ['required', Rule::unique('product')->ignore($product->id)],
            'id_category'           => ['required'],
            'id_brand'              => ['required'],
            'price'                 => ['required'],
            'sku_code'              => ['required'],
            'main_picture_url'      => ['nullable', 'mimes:jpg,jpeg,png,gif,webp'],
            'detail_picture_url.*'  => ['nullable', 'mimes:jpg,jpeg,png,gif,webp'],
            'remove_detail_pictures'=> ['nullable', 'array'],
        ]);

        if ($request->hasFile('main_picture_url')) {
            $this->deleteFileFromUploads($product->main_picture_url);

            $product->main_picture_url = $this->uploadImageAsWebp(
                $request->file('main_picture_url'),
                'product',
                'main_picture_url'
            );
        }

        $slug = Str::slug($request->slug ?? $request->name, '-');

        if (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
            return redirect()->back()
                ->withErrors(['slug' => 'Product slug/url already exists. Try a different name.'])
                ->withInput();
        }

        $product->name            = $request->name;
        $product->slug            = $slug;
        $product->id_category     = $request->id_category;
        $product->id_brand        = $request->id_brand;
        $product->description     = $request->description;
        $product->price           = $request->price;
        $product->sku_code        = $request->sku_code;
        $product->is_top_product  = $request->is_top_product;
        $product->is_discontinue  = $request->is_discontinue;
        $product->is_rental       = $request->is_rental;
        $product->is_indent       = $request->is_indent;
        $product->rental_price    = $request->rental_price ?? '';
        $product->update();

        $this->removeSelectedDetailPictures($request, $product);
        $this->storeDetailPictures($request, $product);

        $dataProductSpec = $this->mappingDataAdditionalInformation($request, $product);
        ProductSpec::where('product_id', $product->id)->delete();
        if ($dataProductSpec) {
            foreach ($dataProductSpec as $data) {
                ProductSpec::create($data);
            }
        }

        $dataExternalLink = $this->mappingDataExternalLink($request, $product);
        ProductExternalLink::where('product_id', $product->id)->delete();
        if ($dataExternalLink) {
            foreach ($dataExternalLink as $data) {
                ProductExternalLink::create($data);
            }
        }

        return redirect()->route('owner.product')->with('success', __('Data is updated successfully'));
    }

    public function destroy($id)
    {
        $product = Product::with('detailPictures')->findOrFail($id);

        foreach ($product->detailPictures as $detailPicture) {
            $this->deleteFileFromUploads($detailPicture->detail_picture_url);
        }

        $this->deleteFileFromUploads($product->main_picture_url);

        $product->detailPictures()->delete();
        $product->spec()->delete();
        $product->externalLink()->delete();
        $product->delete();

        return redirect()->route('owner.product')->with('success', __('Data is deleted successfully'));
    }

    private function storeDetailPictures(Request $request, Product $product): void
    {
        if (!$request->hasFile('detail_picture_url')) {
            return;
        }

        $lastSortNumber = (int) ProductDetailPicture::where('product_id', $product->id)->max('sort_number');

        foreach ($request->file('detail_picture_url') as $file) {
            if (!$file) {
                continue;
            }

            $lastSortNumber++;

            $savedPath = $this->uploadImageAsWebp(
                $file,
                'product/detail',
                'detail_picture_url'
            );

            ProductDetailPicture::create([
                'product_id'         => $product->id,
                'sort_number'        => $lastSortNumber,
                'detail_picture_url' => $savedPath,
            ]);
        }
    }

    private function removeSelectedDetailPictures(Request $request, Product $product): void
    {
        $removeIds = $request->input('remove_detail_pictures', []);

        if (empty($removeIds)) {
            return;
        }

        $pictures = ProductDetailPicture::where('product_id', $product->id)
            ->whereIn('id', $removeIds)
            ->get();

        foreach ($pictures as $picture) {
            $this->deleteFileFromUploads($picture->detail_picture_url);
            $picture->delete();
        }
    }

    private function uploadImageAsWebp($file, string $folder, string $prefix): string
    {
        $filenameOnly = $prefix . '_' . time() . '_' . uniqid() . '.webp';
        $filename = $folder . '/' . $filenameOnly;
        $destination = public_path('uploads/' . $filename);

        $directory = dirname($destination);
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $manager = new ImageManager(new Driver());
        $manager->read($file->getRealPath())
            ->toWebp(80)
            ->save($destination);

        return $filename;
    }

    private function deleteFileFromUploads(?string $path): void
    {
        if (empty($path)) {
            return;
        }

        $fullPath = public_path('uploads/' . $path);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    private function mappingDataAdditionalInformation($request, $product)
    {
        $mappedData = [];

        foreach ($request->input('addtional_information__data') ?? [] as $key => $data) {
            if ($data != null) {
                $mappedData[$key]['data'] = $data;
            }
        }

        foreach ($request->input('addtional_information__title') ?? [] as $key => $data) {
            if ($data != null) {
                $mappedData[$key]['title'] = $data;
            }
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
            if ($data != null) {
                $mappedData[$key]['link_name'] = $data;
            }
        }

        foreach ($request->input('external-link-tab__link') ?? [] as $key => $data) {
            if ($data != null) {
                $mappedData[$key]['link'] = $data;
            }
        }

        foreach ($request->input('external-link-tab__color') ?? [] as $key => $data) {
            if ($data != null) {
                $mappedData[$key]['hex_color'] = $data;
            }
        }

        foreach ($mappedData as $key => $data) {
            $mappedData[$key]['product_id'] = $product->id;
        }

        return $mappedData;
    }
}