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
        // $category = DB::table('category')->get();

        $category = DB::table('category')->where('is_discontinue', 0)
            ->where(function ($query) {
                $query->where('parent_cat_id', 0)
                    ->orWhereNull('parent_cat_id');
            })->get();
        return $category;
    }
}
