<?php

namespace App\Http\Controllers;

use App\Questionario;
use Illuminate\Http\Request;
use App\Turma;
use App\Perguntas;

class QuestionarioController extends Controller
{
    /**
     * Display a listing of the questionario.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $questionarioQuery = Questionario::query();
        $questionarioQuery->where('name', 'like', '%'.request('q').'%');
        $questionarios = $questionarioQuery->paginate(25);

        return view('questionarios.index', compact('questionarios'));
    }

    /**
     * Show the form for creating a new questionario.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Questionario);

        $turmas = Turma::all();
        $perguntas = Perguntas::all();

        return view('questionarios.create', compact('turmas', 'perguntas'));
    }

    /**
     * Store a newly created questionario in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Questionario);

        $newQuestionario = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newQuestionario['creator_id'] = auth()->id();

        $questionario = Questionario::create($newQuestionario);

        return redirect()->route('questionarios.show', $questionario);
    }

    /**
     * Display the specified questionario.
     *
     * @param  \App\Questionario  $questionario
     * @return \Illuminate\View\View
     */
    public function show(Questionario $questionario)
    {
        return view('questionarios.show', compact('questionario'));
    }

    /**
     * Show the form for editing the specified questionario.
     *
     * @param  \App\Questionario  $questionario
     * @return \Illuminate\View\View
     */
    public function edit(Questionario $questionario)
    {
        $this->authorize('update', $questionario);

        return view('questionarios.edit', compact('questionario'));
    }

    /**
     * Update the specified questionario in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Questionario  $questionario
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Questionario $questionario)
    {
        $this->authorize('update', $questionario);

        $questionarioData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $questionario->update($questionarioData);

        return redirect()->route('questionarios.show', $questionario);
    }

    /**
     * Remove the specified questionario from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Questionario  $questionario
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Questionario $questionario)
    {
        $this->authorize('delete', $questionario);

        $request->validate(['questionario_id' => 'required']);

        if ($request->get('questionario_id') == $questionario->id && $questionario->delete()) {
            return redirect()->route('questionarios.index');
        }

        return back();
    }
}
