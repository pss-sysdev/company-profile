<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\QuotationRequest;
use Illuminate\Http\Request;

class OwnerQuotationController extends Controller
{
    public function index()
    {
        $quotations = QuotationRequest::all();
        return view('owner.pages.quotation.index', [
            'type_menu' => 'quotation',
            'qutations' => $quotations
        ]);
    }

    public function edit($id)
    {
        $quotation = QuotationRequest::find($id);
        return view('owner.pages.quotation.edit', [
            'type_menu' => 'quotation',
            'quotation' => $quotation
        ]);
    }

    public function update($id, Request $request)
    {
        $quotation = QuotationRequest::find($id);

        $quotation->name = $request->name;
        $quotation->company_name = $request->company_name;
        $quotation->industry = $request->industry;
        $quotation->email = $request->email;
        $quotation->phone_number = $request->phone_number;
        $quotation->message = $request->message;

        $quotation->update();

        return redirect()->route('owner.quotation.index')->with('success', 'Data is updated successfully');
    }

    public function destroy($id)
    {
        $brand = QuotationRequest::find($id);
        $brand->delete();
        return redirect()->route('owner.brand')->with('success', 'Data is deleted successfully');
    }
}
