<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Http\Request;

class OwnerProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('owner.pages.project.index', [
            'type_menu'  => '',
            'projects' => $projects
        ]);
    }

    public function create()
    {
        return view('owner.pages.project.create', [
            'type_menu' => ''
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'          => ['required', 'unique:portofolio,title'],
            'picture' => ['required', 'mimes:jpeg,png,gif']
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;

        $final_name = 'picture_url_project_' . time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('uploads'), $final_name);
        $project->picture = $final_name;
        $project->save();

        return redirect()->route('owner.project.index')->with('success', 'Data is added successfully');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('owner.pages.project.edit', ['type_menu' => '', 'project' => $project]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:portofolio,title,' . $id],
        ]);

        $project = Project::find($id);

        if ($request->picture != null) {
            $filePath = 'uploads/' . $project->picture;
            if (file_exists($filePath) && is_file($filePath)) {
                unlink(public_path($filePath));
            }

            $final_name = 'picture_url_project_' . time() . '.' . $request->picture_url->extension();
            $request->picture_url->move(public_path('uploads'), $final_name);
            $project->picture = $final_name;
        }

        $project->title = $request->title;
        $project->description = $request->description;
        $project->update();

        return redirect()->route('owner.project.index')->with('success', __('Data is updated successfully'));
    }

    public function destroy($id)
    {
        $project = Project::find($id);

        if ($project->picture) {
            $filePath = 'uploads/' . $project->picture;
            if (file_exists($filePath) && is_file($filePath)) {
                unlink(public_path($filePath));
            }
        }
        $project->delete();

        return redirect()->route('owner.project.index')->with('success', __('Data is deleted successfully'));
    }
}
