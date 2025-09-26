<?php

namespace App\Http\Controllers;

use App\Models\Jiri;
use App\Models\Project;
use Illuminate\Http\Request;

class JiriController extends Controller
{
    public function index()
    {
        $jiris = Jiri::get()->all();

        return view('jiris.index', compact('jiris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'description' => 'nullable',
            'projects' => 'array'
        ]);

        $jiri = Jiri::create($validated);
        $jiri->projects()->attach($validated['projects']);

        return redirect(route('jiris.index'));
    }

    public function show(string $id)
    {
        $jiri = Jiri::findOrFail($id);

        return view('jiris.show', compact('jiri'));
    }

    public function create()
    {
        return view('jiris.create');
    }
}
