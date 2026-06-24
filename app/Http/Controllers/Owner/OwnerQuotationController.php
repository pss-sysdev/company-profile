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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'contact_number' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $quotation = QuotationRequest::find($id);

        $quotation->name = $request->name;
        $quotation->company_name = $request->company_name;
        $quotation->industry = $request->industry;
        $quotation->email = $request->email;
        $quotation->contact_number = $request->contact_number;
        $quotation->message = $request->message;

        $quotation->update();

        return redirect()->route('owner.quotation.index')->with('success', 'Data is updated successfully');
    }

    public function destroy($id)
    {
        $brand = QuotationRequest::find($id);
        $brand->delete();
        return redirect()->route('owner.quotation.index')->with('success', 'Data is deleted successfully');
    }
}
