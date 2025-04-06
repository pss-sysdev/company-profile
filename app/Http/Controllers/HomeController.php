<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title           = 'Home - Perintis Sukses Sejahtera';
        $setting         = Setting::find(1);
        $productCategory = Category::where('is_discontinue', 0)->limit(10)->get();
        $product         = DB::table('category as A')
            ->join('product as B', 'A.id', '=', 'B.id_category')
            ->select([
                'A.name as name_category',
                'A.picture_url as picture_url_category',
                'A.sub_category_name',
                'A.is_discontinue as is_discontinue_category',
                'B.name as name_product',
                'B.slug as slug_product',
                'B.description as description_product',
                'B.price as price_product',
                'B.sku_code as sku_product',
                'B.main_picture_url as main_picture_url_product',
                'B.is_top_product',
                'B.is_discontinue as is_discontinue_product'
            ])
            ->where('B.is_top_product', 1)
            ->get();
        $brand = Brand::get();

        return view('frontend.pages.home.index', [
            'type_menu'       => 'home',
            'title'           => $title,
            'Setting'         => $setting,
            'productCategory' => $productCategory,
            'product'         => $product,
            'brand'           => $brand
        ]);
    }
}
