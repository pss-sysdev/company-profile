<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    public function index()
    {
        $title = 'Brand - Perintis Sukses Sejahtera';
        $brand = DB::table('brand')->get();

        return view('frontend.pages.contact_us.index', [
            'type_menu' => 'contact_us',
            'title'     => $title,
            'brand'     => $brand
        ]);
    }
}
