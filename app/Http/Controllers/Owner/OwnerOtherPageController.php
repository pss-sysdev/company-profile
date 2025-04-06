<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class OwnerOtherPageController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        $company = CompanyProfile::find(1);
        return view('owner.pages.other_page.index', [
            'type_menu' => 'other-page',
            'company' => $company
        ]);
    }

    public function updatePageAboutUs(Request $request)
    {
        $request->validate([
            'overview' => ['required'],
            'history' => ['required'],
            'growth' => ['required'],
            'industries' => ['required'],
            'commitment' => ['required'],
            'vision' => ['required'],
            'mission' => ['required'],
            'motto' => ['required'],
        ]);

        $company = CompanyProfile::find(1);
        $company->overview = $request->overview;
        $company->history = $request->history;
        $company->growth = $request->growth;
        $company->industries = $request->industries;
        $company->commitment = $request->commitment;
        $company->vision = $request->vision;
        $company->mission = $request->mission;
        $company->motto = $request->motto;
        $company->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }
}
