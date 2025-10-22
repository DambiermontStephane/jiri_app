<?php

namespace App\Http\Controllers;

use App\Events\JiriCreatedEvent;
use App\Http\Requests\StoreJiriRequest;
use App\Mail\JiriCreatedMail;
use App\Models\Jiri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JiriController extends Controller
{
    public function index()
    {
        $jiris = Jiri::get()->all();

        return view('jiris.index', compact('jiris'));
    }

    public function store(StoreJiriRequest $request)
    {
        $validated = $request->validated();

        $jiri = auth()->user()->jiris()->create($validated);
        $jiri->projects()->attach($validated['projects']);

        event(new JiriCreatedEvent($jiri));

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
