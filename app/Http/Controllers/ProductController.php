<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $title       = 'Product - Perintis Sukses Sejahtera';
        $products    = Product::paginate(9);
        $productsTop = Product::where('is_top_product', 1)->limit(5)->get();
        $categories  = Category::all();

        return view('frontend.pages.product.index', [
            'type_menu'   => 'product',
            'title'       => $title,
            'products'    => $products,
            'productsTop' => $productsTop,
            'categories'  => $categories
        ]);
    }

    public function detail($slug)
    {
        $title          = 'Product Detail - Perintis Sukses Sejahtera';
        $product        = Product::where('slug', $slug)->first();
        $productsRelate = Product::where('is_top_product', 1)->limit(5)->get();

        return view('frontend.pages.product.detail', [
            'type_menu'      => 'product',
            'title'          => $title,
            'product'        => $product,
            'productsRelate' => $productsRelate
        ]);
    }
}
