<?php

namespace App\Http\Controllers;

use App\Models\Tipocontrato;
use Illuminate\Http\Request;
//
use App\Http\Controllers\BitacoraController;
//

/**
 * Class TipocontratoController
 * @package App\Http\Controllers
 */
class TipocontratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipocontratos = Tipocontrato::paginate();

        return view('tipocontrato.index', compact('tipocontratos'))
            ->with('i', (request()->input('page', 1) - 1) * $tipocontratos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipocontrato = new Tipocontrato();
        return view('tipocontrato.create', compact('tipocontrato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tipocontrato::$rules);

        $tipocontrato = Tipocontrato::create($request->all());

        //CODIGO PARA LA BITACORA
        $detalle = "Registro de nuevo TIPO CONTRATO: ".$tipocontrato->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return redirect()->route('tipocontratos.index')
            ->with('success', 'Tipocontrato created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipocontrato = Tipocontrato::find($id);

        return view('tipocontrato.show', compact('tipocontrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipocontrato = Tipocontrato::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Edición de TIPO CONTRATO: ".$tipocontrato->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return view('tipocontrato.edit', compact('tipocontrato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tipocontrato $tipocontrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipocontrato $tipocontrato)
    {
        request()->validate(Tipocontrato::$rules);

        $tipocontrato->update($request->all());

        return redirect()->route('tipocontratos.index')
            ->with('success', 'Tipocontrato updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipocontrato = Tipocontrato::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Se eliminó TIPO CONTRATO: ".$tipocontrato->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        $tipocontrato->delete();

        return redirect()->route('tipocontratos.index')
            ->with('success', 'Tipocontrato deleted successfully');
    }
}
