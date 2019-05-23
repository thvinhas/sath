<?php

namespace App\Http\Controllers;

use App\Semestre;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
    /**
     * Display a listing of the semestre.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $semestreQuery = Semestre::query();
        $semestreQuery->where('name', 'like', '%'.request('q').'%');
        $semestres = $semestreQuery->paginate(25);

        return view('semestres.index', compact('semestres'));
    }

    /**
     * Show the form for creating a new semestre.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Semestre);

        return view('semestres.create');
    }

    /**
     * Store a newly created semestre in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Semestre);

        $newSemestre = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newSemestre['creator_id'] = auth()->id();

        $semestre = Semestre::create($newSemestre);

        return redirect()->route('semestres.show', $semestre);
    }

    /**
     * Display the specified semestre.
     *
     * @param  \App\Semestre  $semestre
     * @return \Illuminate\View\View
     */
    public function show(Semestre $semestre)
    {
        return view('semestres.show', compact('semestre'));
    }

    /**
     * Show the form for editing the specified semestre.
     *
     * @param  \App\Semestre  $semestre
     * @return \Illuminate\View\View
     */
    public function edit(Semestre $semestre)
    {
        $this->authorize('update', $semestre);

        return view('semestres.edit', compact('semestre'));
    }

    /**
     * Update the specified semestre in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Semestre  $semestre
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Semestre $semestre)
    {
        $this->authorize('update', $semestre);

        $semestreData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $semestre->update($semestreData);

        return redirect()->route('semestres.show', $semestre);
    }

    /**
     * Remove the specified semestre from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Semestre  $semestre
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Semestre $semestre)
    {
        $this->authorize('delete', $semestre);

        $request->validate(['semestre_id' => 'required']);

        if ($request->get('semestre_id') == $semestre->id && $semestre->delete()) {
            return redirect()->route('semestres.index');
        }

        return back();
    }
}
