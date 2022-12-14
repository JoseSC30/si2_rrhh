<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use Illuminate\Http\Request;

/**
 * Class ComunicadoController
 * @package App\Http\Controllers
 */
class ComunicadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunicados = Comunicado::paginate();

        return view('comunicado.index', compact('comunicados'))
            ->with('i', (request()->input('page', 1) - 1) * $comunicados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comunicado = new Comunicado();
        return view('comunicado.create', compact('comunicado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Comunicado::$rules);

        $comunicado = Comunicado::create($request->all());

        return redirect()->route('comunicados.index')
            ->with('success', 'Comunicado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comunicado = Comunicado::find($id);

        return view('comunicado.show', compact('comunicado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comunicado = Comunicado::find($id);

        return view('comunicado.edit', compact('comunicado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Comunicado $comunicado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comunicado $comunicado)
    {
        request()->validate(Comunicado::$rules);

        $comunicado->update($request->all());

        return redirect()->route('comunicados.index')
            ->with('success', 'Comunicado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $comunicado = Comunicado::find($id)->delete();

        return redirect()->route('comunicados.index')
            ->with('success', 'Comunicado deleted successfully');
    }
}
