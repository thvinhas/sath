<?php

namespace App\Http\Controllers;

use App\Questionario;
use Illuminate\Http\Request;
use App\Turma;
use App\Perguntas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Resultado;

class QuestionarioController extends Controller
{
    /**
     * Display a listing of the questionario.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {   
        if(Auth::user()->perfil == 'administrador') {
            $questionarioQuery = Questionario::query();
            $questionarioQuery->where('name', 'like', '%'.request('q').'%');
            $questionarios = $questionarioQuery->paginate(25);
            return view('questionarios.index', compact('questionarios'));
        } else if(Auth::user()->perfil == 'aluno') {
            $turmas = Auth::user()->turmas;
            $questionarios=[];
            // var_dump($turmas);exit
            foreach($turmas as $turma) {
                $questionarioQuery = Questionario::query();
                $questionarioQuery->where('turma_id', $turma->id);
                $questionarios = $questionarioQuery->paginate(25);

            }
            
            return view('questionarios.aluno', compact('questionarios'));
        }

      
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
            'Turma_id'    => 'required|max:60',
        ]);
        $newQuestionario['creator_id'] = auth()->id();

        $questionario = Questionario::create($newQuestionario);

        $questionario->perguntas()->sync($request->get('perguntas'));
        // var_dump($questionario);exit();

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

        $turmas = Turma::all();
        $perguntas = Perguntas::all();

        $perguntasSelected = $questionario->perguntas()->allRelatedIds()->toArray();

        return view('questionarios.edit', compact('questionario', 'turmas', 'perguntas', 'perguntasSelected'));
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

    public function questionarioResposta(Request $request)
    {
        
        $questionario = Questionario::findOrFail($request->get('id'));
       
        return view('questionarios.resposta', compact('questionario'));
    }
    
    public function questionarioRespostaSalvar(Request $request)
    {
        $perguntas = $request->get('name');
        foreach ($perguntas as $key => $value) {
            $resultado = new Resultado();
            $resultado->pergunta_id = $key;
            $resultado->Questionario_id = $request->get('questionario');
            $resultado->Aluno_id = Auth::user()->id;
            $resultado->resposta =$value;
            $resultado->save();

        }

        return redirect('/questionarios');
    }

    public function relatorio(Request $request) {
        $questionario = Questionario::findOrFail($request->get('id-questionario'));       

            // var_dump($respostas);exit();
            return view('questionarios.relatorio', compact('questionario') );
    }

    public function getDados(Request $request) {

        $query = DB::table('resposta')
            ->where('resposta.Questionario_id', $request->get('questionarioId'))
            ->join('perguntas', 'resposta.id', '=', 'perguntas.id')
            ->join('questionarios', 'resposta.id', '=', 'questionarios.id')
            ->select('resposta.*', 'perguntas.name')
            ->get();
            // var_dump($query);exit();

            $resposta = [];
            foreach($query as $resultado) {
                // var_dump($resultado);exit;
                if(isset($resposta[$resultado->pergunta_id])) {
                    $resposta[$resultado->pergunta_id]['resposta'] += $resultado->resposta;
                    $resposta[$resultado->pergunta_id]['qtd'] ++;
                }else {
                    $resposta[$resultado->pergunta_id] = ['nome' => $resultado->name, 'resposta'=> $resultado->resposta, 'qtd'=>1];
                }
            }

            return $resposta;
    }                   
}
