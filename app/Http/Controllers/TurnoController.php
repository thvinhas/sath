<?php

namespace App\Http\Controllers;

use App\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    /**
     * Display a listing of the turno.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $turnoQuery = Turno::query();
        $turnoQuery->where('name', 'like', '%'.request('q').'%');
        $turnos = $turnoQuery->paginate(25);

        return view('turnos.index', compact('turnos'));
    }

    /**
     * Show the form for creating a new turno.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Turno);

        return view('turnos.create');
    }

    /**
     * Store a newly created turno in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Turno);

        $newTurno = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newTurno['creator_id'] = auth()->id();

        $turno = Turno::create($newTurno);

        return redirect()->route('turnos.show', $turno);
    }

    /**
     * Display the specified turno.
     *
     * @param  \App\Turno  $turno
     * @return \Illuminate\View\View
     */
    public function show(Turno $turno)
    {
        return view('turnos.show', compact('turno'));
    }

    /**
     * Show the form for editing the specified turno.
     *
     * @param  \App\Turno  $turno
     * @return \Illuminate\View\View
     */
    public function edit(Turno $turno)
    {
        $this->authorize('update', $turno);

        return view('turnos.edit', compact('turno'));
    }

    /**
     * Update the specified turno in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turno  $turno
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Turno $turno)
    {
        $this->authorize('update', $turno);

        $turnoData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $turno->update($turnoData);

        return redirect()->route('turnos.show', $turno);
    }

    /**
     * Remove the specified turno from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turno  $turno
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Turno $turno)
    {
        $this->authorize('delete', $turno);

        $request->validate(['turno_id' => 'required']);

        if ($request->get('turno_id') == $turno->id && $turno->delete()) {
            return redirect()->route('turnos.index');
        }

        return back();
    }
}
