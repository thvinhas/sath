<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the curso.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cursoQuery = Curso::query();
        $cursoQuery->where('name', 'like', '%'.request('q').'%');
        $cursos = $cursoQuery->paginate(25);

        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new curso.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Curso);

        return view('cursos.create');
    }

    /**
     * Store a newly created curso in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Curso);

        $newCurso = $request->validate([
            'name'        => 'required|max:60',
        ]);
        $newCurso['creator_id'] = auth()->id();

        $curso = Curso::create($newCurso);

        return redirect()->route('cursos.show', $curso);
    }

    /**
     * Display the specified curso.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\View\View
     */
    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified curso.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\View\View
     */
    public function edit(Curso $curso)
    {
        $this->authorize('update', $curso);

        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified curso in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Curso $curso)
    {
        $this->authorize('update', $curso);

        $cursoData = $request->validate([
            'name'        => 'required|max:60',
        ]);
        $curso->update($cursoData);

        return redirect()->route('cursos.show', $curso);
    }

    /**
     * Remove the specified curso from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Curso $curso)
    {
        $this->authorize('delete', $curso);

        $request->validate(['curso_id' => 'required']);

        if ($request->get('curso_id') == $curso->id && $curso->delete()) {
            return redirect()->route('cursos.index');
        }

        return back();
    }
}
