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
            ->select('b.id', 'b.name', 'b.banner_picture', 'c.name as category_name', 'c.id as category_id', 'c.parent_cat_id', 'd.name as parent_cat_name')
            ->join('brand as b', 'a.id_brand', '=', 'b.id')
            ->join('category as c', 'a.id_category', '=', 'c.id')
            ->Leftjoin('category as d', 'c.parent_cat_id', '=', 'd.id')
            ->get();
        // $brandCategory = $brand->unique(function ($item) {
        //     $item->group_name  = $item->parent_cat_name??$item->category_name; 
        //     $item->group_id    = $item->parent_cat_id??$item->category_id;
        //     return $item;
        // });

        $brand->transform(function ($item) {
            $item->group_id = $item->parent_cat_id ?? $item->category_id;
            $item->group_name = $item->parent_cat_name ?? $item->category_name;
            return $item;
        });

        $brandCategory = $brand->unique('group_id');

        $category = category();

        return view('frontend.pages.brand.index', [
            'type_menu'       => 'brand',
            'title'           => $title,
            'brand'           => $brand,
            'brandCategory'   => $brandCategory,
            'categoryOnBrand' => categoryOnBrand(),
            'categorys'       => $category,
        ]);
    }

    public function page($slug)
    {
        // $brand = DB::table('brand as A')
        //     ->join('brand_section as B', 'A.id', '=', 'B.brand_id')
        //     ->select('A.*', 'B.*')
        //     ->where('A.id', $slug)
        //     ->where('A.is_own', 1)
        //     ->get();
        $brand = DB::table('brand as A')
            ->join('brand_section as B', 'A.id', '=', 'B.brand_id')
            ->select('A.*', 'B.*')
            ->where('A.url', $slug)
            ->where('A.is_own', 1)
            ->get();

        $brand_2 = DB::table('brand as A')
            ->join('brand_section as B', 'A.id', '=', 'B.brand_id')
            ->select('A.*', 'B.*')
            ->where('A.is_own', 1)
            ->limit(6)
            ->get();
        // $listBrand     = DB::table('brand')->where('id', '!=', $slug)->get();
        $listBrand     = DB::table('brand')->where('url', '!=', $slug)->where('is_own', 1)->get();
        $title         = 'Brand Detail - Perintis Sukses Sejahtera';
        $brandCategory = DB::table('product as a')
            ->distinct()
            ->select('b.id', 'b.name', 'b.banner_picture', 'c.name as category_name', 'c.id as category_id', 'a.id as product_id', 'a.main_picture_url')
            ->join('brand as b', 'a.id_brand', '=', 'b.id')
            ->join('category as c', 'a.id_category', '=', 'c.id')
            ->where('b.id', $slug)
            ->take('6')
            ->get();
        $brandCategoryDistinct = $brandCategory->unique(function ($item) {
            return $item->category_name . $item->product_id;
        });

        return view('frontend.pages.brand.page', [
            'type_menu'             => 'brand',
            'title'                 => $title,
            'brand'                 => $brand,
            'brand_2'               => $brand_2,
            'categoryOnBrand'       => categoryOnBrand(),
            'categorys'             => category(),
            'listBrand'             => $listBrand,
            'brandCategoryDistinct' => $brandCategoryDistinct,
        ]);
    }
}
