<?php

namespace App\Http\Controllers;

use App\Projeto;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use App\User;
use App\Turma;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the projeto.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $projetoQuery = Projeto::query();
        $projetoQuery->where('name', 'like', '%'.request('q').'%');
        $projetos = $projetoQuery->paginate(25);

        return view('projetos.index', compact('projetos'));
    }

    /**
     * Show the form for creating a new projeto.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Projeto);

        $alunos = User::all()->where('perfil', 'aluno');
        $professores = User::all()->where('perfil', 'professores');
        $turmas = Turma::all();

        return view('projetos.create', compact('alunos', 'professores', 'turmas'));
    }

    /**
     * Store a newly created projeto in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Projeto);

        $newProjeto = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newProjeto['creator_id'] = auth()->id();

        $projeto = Projeto::create($newProjeto);

        return redirect()->route('projetos.show', $projeto);
    }

    /**
     * Display the specified projeto.
     *
     * @param  \App\Projeto  $projeto
     * @return \Illuminate\View\View
     */
    public function show(Projeto $projeto)
    {
        return view('projetos.show', compact('projeto'));
    }

    /**
     * Show the form for editing the specified projeto.
     *
     * @param  \App\Projeto  $projeto
     * @return \Illuminate\View\View
     */
    public function edit(Projeto $projeto)
    {
        $this->authorize('update', $projeto);

        return view('projetos.edit', compact('projeto'));
    }

    /**
     * Update the specified projeto in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projeto  $projeto
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Projeto $projeto)
    {
        $this->authorize('update', $projeto);

        $projetoData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $projeto->update($projetoData);

        return redirect()->route('projetos.show', $projeto);
    }

    /**
     * Remove the specified projeto from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projeto  $projeto
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Projeto $projeto)
    {
        $this->authorize('delete', $projeto);

        $request->validate(['projeto_id' => 'required']);

        if ($request->get('projeto_id') == $projeto->id && $projeto->delete()) {
            return redirect()->route('projetos.index');
        }

        return back();
    }
}
