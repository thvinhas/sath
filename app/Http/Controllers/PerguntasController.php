<?php

namespace App\Http\Controllers;

use App\Perguntas;
use Illuminate\Http\Request;

class PerguntasController extends Controller
{
    /**
     * Display a listing of the perguntas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $perguntasQuery = Perguntas::query();
        $perguntasQuery->where('name', 'like', '%'.request('q').'%');
        $perguntas = $perguntasQuery->paginate(25);

        return view('perguntas.index', compact('perguntas'));
    }

    /**
     * Show the form for creating a new perguntas.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Perguntas);

        return view('perguntas.create');
    }

    /**
     * Store a newly created perguntas in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Perguntas);

        $newPerguntas = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newPerguntas['creator_id'] = auth()->id();

        $perguntas = Perguntas::create($newPerguntas);

        return redirect()->route('perguntas.show', $perguntas);
    }

    /**
     * Display the specified perguntas.
     *
     * @param  \App\Perguntas  $perguntas
     * @return \Illuminate\View\View
     */
    public function show(Perguntas $perguntas)
    {
        return view('perguntas.show', compact('perguntas'));
    }

    /**
     * Show the form for editing the specified perguntas.
     *
     * @param  \App\Perguntas  $perguntas
     * @return \Illuminate\View\View
     */
    public function edit(Perguntas $perguntas)
    {
        $this->authorize('update', $perguntas);

        return view('perguntas.edit', compact('perguntas'));
    }

    /**
     * Update the specified perguntas in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perguntas  $perguntas
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Perguntas $perguntas)
    {
        $this->authorize('update', $perguntas);

        $perguntasData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $perguntas->update($perguntasData);

        return redirect()->route('perguntas.show', $perguntas);
    }

    /**
     * Remove the specified perguntas from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perguntas  $perguntas
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Perguntas $perguntas)
    {
        $this->authorize('delete', $perguntas);

        $request->validate(['perguntas_id' => 'required']);

        if ($request->get('perguntas_id') == $perguntas->id && $perguntas->delete()) {
            return redirect()->route('perguntas.index');
        }

        return back();
    }
}
