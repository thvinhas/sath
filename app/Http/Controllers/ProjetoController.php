<?php

namespace App\Http\Controllers;

use App\Projeto;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use App\User;
use App\Turma;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the projeto.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // var_dump
        if(Auth::user()->perfil == 'administrador') {
            $projetoQuery = Projeto::query();
            $projetoQuery->where('name', 'like', '%'.request('q').'%');
            $projetos = $projetoQuery->paginate(25);
            return view('projetos.index', compact('projetos'));
        } else if(Auth::user()->perfil == 'professor') {
            $projetos = Auth::user()->projetosProfessores;
            return view('projetos.professor', compact('projetos'));
        }else if(Auth::user()->perfil == 'aluno') {
            $projetos = Auth::user()->projetosAlunos;
            return view('projetos.aluno', compact('projetos'));
        }
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
        $professores = User::all()->where('perfil', 'professor');
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
            'turma_id'    => 'required',
        ]);


        $newProjeto['creator_id'] = auth()->id();

        $projeto = Projeto::create($newProjeto);
        $projeto->professores()->sync($request->get('professores'));
        $projeto->alunos()->sync($request->get('alunos'));

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

    public function projetoProfessorEdit(Request $request)
    {
        $id = $request->get('id');
        // $this->authorize('update', $projeto);
        $projeto = Projeto::findOrFail($id);
        // var_dump($id);exit();

        return view('projetos.professor-edit', compact('projeto'));
    }

    public function projetoProfessorUpdate(Request $request){
        $idPrpjeto = $request->get('id_projeto');
        $nota = $request->get('nota');

       $hue =  DB::table('projeto_professor')
            ->where('projeto_id', $idPrpjeto)
            ->where('aluno_id', Auth::user()->id)
            ->update(['media' =>  $nota]);


            $projeto = Projeto::where('id', $idPrpjeto)->first();

            // var_dump($projeto);exit();

            $notas = $projeto->professores;
            // var_dump($notas);exit();
            $media = 0;
            $qtdProfessores = 0;
            foreach ($notas as $key => $nota) {
                // var_dump($nota->pivot->media);exit();
               $media += $nota->pivot->media;
               $qtdProfessores++;
            }

            // var_dump($media);exit();

            $data = $media/$qtdProfessores;
            // var_dump($data);exit; 

            DB::table('projetos')
            ->where('id', $idPrpjeto)
            ->update(['media' =>  $data]);

            
            return redirect('/projetos');
    }
}
