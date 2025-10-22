<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::get()->all();

        return view('projects.index', compact('projects'));
    }

    public function store()
    {
        $data = Project::create(request()->all());

        $project = auth()->user()->projects()->create($data);

        return redirect(route('projects.index'));
    }

    public function show(string $id)
    {
        $project = Project::findOrFail($id);

        return view('projects.show', compact('project'));
    }
}
