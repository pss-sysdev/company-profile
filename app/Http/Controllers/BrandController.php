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

    public function page($slug)
    {
        $brand           = DB::table('brand as A')
            ->join('brand_section as B', 'A.id', '=', 'B.brand_id')
            ->select('A.*', 'B.*')
            ->where('a.id', $slug)
            ->where('a.is_own', 1)
            ->get();
        $listBrand       = DB::table('brand')->where('id', '!=', $slug)->get();
        $title           = 'Brand Detail - Perintis Sukses Sejahtera';
        $categoryOnBrand = DB::table('brand')->where('is_own', 1)->get();

        return view('frontend.pages.brand.page', [
            'type_menu'       => 'brand',
            'title'           => $title,
            'brand'           => $brand,
            'categoryOnBrand' => $categoryOnBrand,
            'listBrand'       => $listBrand,
        ]);
    }
}
