<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function index()
    {
        $title   = 'About Us - Perintis Sukses Sejahtera';
        $data    = CompanyProfile::all();
        $client  = DB::table('portofolio_client')->get();
        $project = DB::table('portofolio')->get();

        return view('frontend.pages.about_us.index', [
            'type_menu'       => 'about_us',
            'title'           => $title,
            'data'            => $data,
            'categoryOnBrand' => categoryOnBrand(),
            'categorys'       => category(),
            'client'          => $client,
            'project'         => $project,
        ]);
    }
}
