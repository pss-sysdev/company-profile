<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class OwnerClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('owner.pages.client.index', [
            'type_menu'  => '',
            'clients' => $clients
        ]);
    }

    public function create()
    {
        return view('owner.pages.client.create', [
            'type_menu' => ''
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => ['required', 'unique:portofolio_client,client_name'],
            'picture_url' => ['required', 'mimes:jpeg,png,gif']
        ]);

        $client = new Client();
        $client->client_name = $request->name;

        $final_name = 'picture_url_client_' . time() . '.' . $request->picture_url->extension();
        $request->picture_url->move(public_path('uploads'), $final_name);
        $client->client_logo = $final_name;
        $client->save();

        return redirect()->route('owner.client.index')->with('success', 'Data is added successfully');
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('owner.pages.client.edit', ['type_menu' => '', 'client' => $client]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:portofolio_client,client_name,' . $id],
        ]);

        $client = Client::find($id);

        if ($request->picture_url != null) {
            $filePath = 'uploads/' . $client->client_logo;
            if (file_exists($filePath) && is_file($filePath)) {
                unlink(public_path($filePath));
            }

            $final_name = 'picture_url_client_' . time() . '.' . $request->picture_url->extension();
            $request->picture_url->move(public_path('uploads'), $final_name);
            $client->client_logo = $final_name;
        }

        $client->client_name = $request->name;
        $client->update();

        return redirect()->route('owner.client.index')->with('success', __('Data is updated successfully'));
    }

    public function destroy($id)
    {
        $client = Client::find($id);

        if ($client->client_logo) {
            $filePath = 'uploads/' . $client->client_logo;
            if (file_exists($filePath) && is_file($filePath)) {
                unlink(public_path($filePath));
            }
        }
        $client->delete();

        return redirect()->route('owner.client.index')->with('success', __('Data is deleted successfully'));
    }
}
