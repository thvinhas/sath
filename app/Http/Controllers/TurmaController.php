<?php

namespace App\Http\Controllers;

use App\Turma;
use Illuminate\Http\Request;
use App\Curso;
use App\Semestre;
use App\Turno;
use App\User;

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

        $cursos = Curso::all();
        $semestres = Semestre::all();
        $turnos = Turno::all();
        $alunos = User::all()->where('perfil', 'aluno');

        return view('turmas.create', compact('cursos', 'semestres', 'turnos', 'alunos'));
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
            'curso_id' => 'required|max:255',
            'semestre_id' => 'required|max:255',
            'turno_id' => 'required|max:255',
            
        ]);
        // var_dump($request);exit;
        $newTurma['creator_id'] = auth()->id();

        $turma = Turma::create($newTurma);

        $turma->alunos()->sync($request->get('alunos'));

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

        $cursos = Curso::all();
        $semestres = Semestre::all();
        $turnos = Turno::all();
        $alunos = User::all()->where('perfil', 'aluno');

        $alunosSelected = $turma->alunos()->allRelatedIds()->toArray();

        // var_dump($alunosSelected);exit();

        return view('turmas.edit', compact('turma', 'cursos', 'semestres', 'turnos', 'alunos', 'alunosSelected'));
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
            'curso_id' => 'required|max:255',
            'semestre_id' => 'required|max:255',
            'turno_id' => 'required|max:255',
            
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
