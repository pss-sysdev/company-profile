<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\QuotationRequest;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Brand - Perintis Sukses Sejahtera';
        $brand = DB::table('brand')->get();

        return view('frontend.pages.contact_us.index', [
            'type_menu'       => 'contact_us',
            'product_id'      => $request->product_id,
            'title'           => $title,
            'brand'           => $brand,
            'categoryOnBrand' => categoryOnBrand(),
            'categorys'        => category(),
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'product_id'          => 'nullable|integer',
            'name'                => 'required|string|max:255',
            'your_category'       => 'required|string|max:255',
            'request_appointment' => 'required|string|max:255',
            'company_name'        => 'required|string|max:255',
            'industry'            => 'required|string|max:255',
            'contact_number'      => 'required|string|max:50',
            'email_address'       => 'required|email|max:255',
            'your_message'        => 'required|string|max:1000',
        ]);

        QuotationRequest::create([
            'product_id'          => !empty($request->product_id) ? $request->product_id : null,
            'name'                => $request->name,
            'category'            => $request->your_category,
            'request_appointment' => $request->request_appointment,
            'company_name'        => $request->company_name,
            'industry'            => $request->industry,
            'phone_number'        => $request->contact_number,
            'email'               => $request->email_address,
            'message'             => $request->your_message,
        ]);

        return redirect()->route('contact_us')->with('success', 'Your quotation request has been submitted.');
    }
}
