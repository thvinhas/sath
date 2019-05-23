<?php

namespace App\Http\Controllers;

use App\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    /**
     * Display a listing of the turma.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $turmaQuery = Turma::query();
        $turmaQuery->where('name', 'like', '%'.request('q').'%');
        $turmas = $turmaQuery->paginate(25);

        return view('turmas.index', compact('turmas'));
    }

    /**
     * Show the form for creating a new turma.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Turma);

        return view('turmas.create');
    }

    /**
     * Store a newly created turma in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Turma);

        $newTurma = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newTurma['creator_id'] = auth()->id();

        $turma = Turma::create($newTurma);

        return redirect()->route('turmas.show', $turma);
    }

    /**
     * Display the specified turma.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\View\View
     */
    public function show(Turma $turma)
    {
        return view('turmas.show', compact('turma'));
    }

    /**
     * Show the form for editing the specified turma.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\View\View
     */
    public function edit(Turma $turma)
    {
        $this->authorize('update', $turma);

        return view('turmas.edit', compact('turma'));
    }

    /**
     * Update the specified turma in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turma  $turma
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Turma $turma)
    {
        $this->authorize('update', $turma);

        $turmaData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $turma->update($turmaData);

        return redirect()->route('turmas.show', $turma);
    }

    /**
     * Remove the specified turma from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turma  $turma
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Turma $turma)
    {
        $this->authorize('delete', $turma);

        $request->validate(['turma_id' => 'required']);

        if ($request->get('turma_id') == $turma->id && $turma->delete()) {
            return redirect()->route('turmas.index');
        }

        return back();
    }
}
