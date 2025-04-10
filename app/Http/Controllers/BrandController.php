<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        $title = 'Brand - Perintis Sukses Sejahtera';
        $brand = DB::table('product as a')
            ->distinct()
            ->select('b.id', 'b.name', 'b.banner_picture', 'c.name as category_name', 'c.id as category_id')
            ->join('brand as b', 'a.id_brand', '=', 'b.id')
            ->join('category as c', 'a.id_category', '=', 'c.id')
            ->get();
        // dd($brand);
        $brandCategory = $brand->unique(function ($item) {
            return $item->category_name . $item->category_id;
        });
        $categoryOnBrand = DB::table('brand')->where('is_own', 1)->get();

        return view('frontend.pages.brand.index', [
            'type_menu'       => 'brand',
            'title'           => $title,
            'brand'           => $brand,
            'brandCategory'   => $brandCategory,
            'categoryOnBrand' => $categoryOnBrand,
        ]);
    }
}
