<?php

namespace App\Http\Controllers;

use App\Models\Jiri;

class JiriController extends Controller
{

    public function index()
    {
        $jiris = Jiri::get()->all();
        return view('jiris.index', compact('jiris'));
    }
    public function store()
    {
        Jiri::create(request()->all());
        return redirect(route('jiris.index'));
    }

    public function show(string $id)
    {
        $jiri = Jiri::findOrFail($id);
        return view('jiri.show', compact('jiri'));
    }
}
