<?php

use Illuminate\Support\Facades\DB;
use App\Models\Category;

if (!function_exists('categoryOnBrand')) {
    function categoryOnBrand()
    {
        $categoryOnBrand = DB::table('brand as A')
            ->leftJoin('brand_section as B', 'A.id', '=', 'B.brand_id')
            ->select('A.*', 'B.*')
            ->where('A.is_own', 1)
            ->get();
        return $categoryOnBrand;
    }
}

if (!function_exists('category')) {
    function category()
    {
        // $category = Category::all();
        $category = DB::table('category')->get();
        return $category;
    }
}
