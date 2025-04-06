<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        $title = 'Brand - Perintis Sukses Sejahtera';
        $brand = DB::table('brand')->get();

        return view('frontend.pages.brand.index', [
            'type_menu' => 'brand',
            'title'     => $title,
            'brand'     => $brand
        ]);
    }
}
