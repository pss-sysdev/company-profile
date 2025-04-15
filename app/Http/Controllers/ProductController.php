<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function index(Request $request)
    // {
    //     $title       = 'Product - Perintis Sukses Sejahtera';

    //     $filter        = $request->query('filter');
    //     $brandFilter   = $request->query('brand', []);
    //     $categoryFilter = $request->query('category', []);


    //     $query = Product::with(['category', 'brand']);

    //     if ($filter) {
    //         $query->where(function ($q) use ($filter) {
    //             $q->where('name', 'like', "%{$filter}%")
    //               ->orWhere('slug', 'like', "%{$filter}%");
    //         });
    //     }

    //     if (!empty($brandFilter)) {
    //         $query->whereHas('brand', function ($q) use ($brandFilter) {
    //             $q->whereIn('id', $brandFilter);
    //         });
    //     }

    //     if (!empty($categoryFilter)) {
    //         $query->whereHas('category', function ($q) use ($categoryFilter) {
    //             $q->whereIn('id', $categoryFilter);
    //         });
    //     }        

    //     $filteredProductIds = (clone $query)->pluck('id');

    //     $products = $query->paginate(12)->appends($request->query());
    //     // $brands = $products->pluck('brand')->unique('id')->filter();
    //     // $categories = $products->pluck('category')->unique('id')->filter();

    //      // Get all brands that have products in filteredProductIds

    //     $brands = Brand::whereHas('products', function ($q) use ($filteredProductIds) {
    //         $q->whereIn('id', $filteredProductIds);
    //     })->get();

    //     // $categories = Category::whereHas('products', function ($q) use ($filteredProductIds) {
    //     //     $q->whereIn('id', $filteredProductIds);
    //     // })->get();

    //     // dd($brands);
    //     $productsTop    = Product::where('is_top_product', 1)->with(['category', 'brand'])->limit(5)->get();
    //     $categories     = Category::all();
    //     $selected_cat = $categories->whereIn('id', collect($categoryFilter)->map(fn($v) => (int) $v));
    //     // dd($selected_cat);

    //     return view('frontend.pages.product.index', [
    //         'type_menu'       => 'product',
    //         'title'           => $title,
    //         'products'        => $products,
    //         'brands'          => $brands,
    //         'productsTop'     => $productsTop,
    //         'categories'      => $categories,
    //         'selected_cat'    => $selected_cat,
    //         'categoryOnBrand' => categoryOnBrand(),
    //     ]);
    // }

    public function index(Request $request)
    {
        $title = 'Product - Perintis Sukses Sejahtera';

        $filter         = $request->query('filter');
        $brandFilter    = $request->input('brand', []);
        $categoryFilter = $request->input('category', []);

        $productsBase = Product::with(['category', 'brand']);

        if ($filter) {
            $productsBase->where(function ($q) use ($filter) {
                $q->where('name', 'like', "%{$filter}%")
                    ->orWhere('slug', 'like', "%{$filter}%");
            });
        }

        if (!empty($categoryFilter)) {
            $productsBase->whereHas('category', function ($q) use ($categoryFilter) {
                $q->whereIn('id', $categoryFilter);
            });
        }

        $allFilteredProducts = $productsBase->get();

        $brands = $allFilteredProducts->pluck('brand')->filter()->unique('id')->values();

        $filteredProductsQuery = $allFilteredProducts;

        if (!empty($brandFilter)) {
            $filteredProductsQuery = $allFilteredProducts->filter(function ($product) use ($brandFilter) {
                return in_array($product->id_brand, $brandFilter);
            });
        }

        $page              = $request->get('page', 1);
        $perPage           = 12;
        $paginatedProducts = new \Illuminate\Pagination\LengthAwarePaginator(
            $filteredProductsQuery->forPage($page, $perPage),
            $filteredProductsQuery->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        $productsTop  = Product::where('is_top_product', 1)->with(['category', 'brand'])->limit(5)->get();
        $categories   = Category::all();
        $selected_cat = $categories->whereIn('id', collect($categoryFilter)->map(fn($v) => (int) $v));
        $categorys  = category();

        return view('frontend.pages.product.index', [
            'type_menu'       => 'product',
            'title'           => $title,
            'products'        => $paginatedProducts,
            'brands'          => $brands,
            'productsTop'     => $productsTop,
            'categories'      => $categories,
            'selected_cat'    => $selected_cat,
            'categoryOnBrand' => categoryOnBrand(),
            'categorys'       => $categorys,
        ]);
    }


    public function detail($slug)
    {
        $title          = 'Product Detail - Perintis Sukses Sejahtera';
        $product        = Product::where('slug', $slug)->first();
        $productsRelate = Product::where('is_top_product', 1)->limit(5)->get();
        $categorys  = category();

        return view('frontend.pages.product.detail', [
            'type_menu'       => 'product',
            'title'           => $title,
            'product'         => $product,
            'productsRelate'  => $productsRelate,
            'categoryOnBrand' => categoryOnBrand(),
            'categorys'       => $categorys,
        ]);
    }
}
