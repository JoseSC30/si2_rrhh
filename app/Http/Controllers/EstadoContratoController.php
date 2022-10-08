<?php

namespace App\Http\Controllers;

use App\Models\EstadoContrato;
use Illuminate\Http\Request;

/**
 * Class EstadoContratoController
 * @package App\Http\Controllers
 */
class EstadoContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadoContratos = EstadoContrato::paginate();

        return view('estado-contrato.index', compact('estadoContratos'))
            ->with('i', (request()->input('page', 1) - 1) * $estadoContratos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estadoContrato = new EstadoContrato();
        return view('estado-contrato.create', compact('estadoContrato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EstadoContrato::$rules);

        $estadoContrato = EstadoContrato::create($request->all());

        return redirect()->route('estado-contratos.index')
            ->with('success', 'EstadoContrato created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadoContrato = EstadoContrato::find($id);

        return view('estado-contrato.show', compact('estadoContrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadoContrato = EstadoContrato::find($id);

        return view('estado-contrato.edit', compact('estadoContrato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EstadoContrato $estadoContrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadoContrato $estadoContrato)
    {
        request()->validate(EstadoContrato::$rules);

        $estadoContrato->update($request->all());

        return redirect()->route('estado-contratos.index')
            ->with('success', 'EstadoContrato updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estadoContrato = EstadoContrato::find($id)->delete();

        return redirect()->route('estado-contratos.index')
            ->with('success', 'EstadoContrato deleted successfully');
    }
}
