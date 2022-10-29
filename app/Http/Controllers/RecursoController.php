<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use Illuminate\Http\Request;

/**
 * Class RecursoController
 * @package App\Http\Controllers
 */
class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recursos = Recurso::paginate();

        return view('recurso.index', compact('recursos'))
            ->with('i', (request()->input('page', 1) - 1) * $recursos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recurso = new Recurso();
        return view('recurso.create', compact('recurso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Recurso::$rules);

        $recurso = Recurso::create($request->all());

        return redirect()->route('recursos.index')
            ->with('success', 'Recurso created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recurso = Recurso::find($id);

        return view('recurso.show', compact('recurso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recurso = Recurso::find($id);

        return view('recurso.edit', compact('recurso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Recurso $recurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recurso $recurso)
    {
        request()->validate(Recurso::$rules);

        $recurso->update($request->all());

        return redirect()->route('recursos.index')
            ->with('success', 'Recurso updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $recurso = Recurso::find($id)->delete();

        return redirect()->route('recursos.index')
            ->with('success', 'Recurso deleted successfully');
    }
}
