<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;
//
use App\Models\Horario;
//
use App\Http\Controllers\BitacoraController;
//

/**
 * Class TurnoController
 * @package App\Http\Controllers
 */
class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turnos = Turno::paginate();

        return view('turno.index', compact('turnos'))
            ->with('i', (request()->input('page', 1) - 1) * $turnos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turno = new Turno();

        $hor = Horario::pluck('horainicio','id');

        return view('turno.create', compact('turno','hor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Turno::$rules);

        $turno = Turno::create($request->all());

        //CODIGO PARA LA BITACORA
        $detalle = "Registro de nuevo TURNO: ".$turno->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return redirect()->route('turnos.index')
            ->with('success', 'Turno created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turno = Turno::find($id);

        return view('turno.show', compact('turno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turno = Turno::find($id);

        $hor = Horario::pluck('horainicio','id');

        //CODIGO PARA LA BITACORA
        $detalle = "Se EDITÓ los datos de TURNO: ".$turno->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return view('turno.edit', compact('turno','hor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Turno $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turno $turno)
    {
        request()->validate(Turno::$rules);

        $turno->update($request->all());

        return redirect()->route('turnos.index')
            ->with('success', 'Turno updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $turno = Turno::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Se ELIMINÓ el TURNO: ".$turno->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        $turno->delete();

        return redirect()->route('turnos.index')
            ->with('success', 'Turno deleted successfully');
    }
}
