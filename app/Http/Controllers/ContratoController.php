<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Illuminate\Http\Request;
//
use App\Http\Controllers\BitacoraController;
//
//
use App\Models\User;
use App\Models\Empleado;
use App\Models\Tipocontrato;
use App\Models\Turno;
use App\Models\EstadoContrato;
//
use Carbon\carbon;
use PDF;


/**
 * Class ContratoController
 * @package App\Http\Controllers
 */
class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::paginate();

        return view('contrato.index', compact('contratos'))
            ->with('i', (request()->input('page', 1) - 1) * $contratos->perPage());
    }

    public function pdf(Request $request)
    {
        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->format('d-m-Y');

        $contratos = Contrato::paginate();
        $pdf = PDF::loadView('contrato.pdf',['contratos'=>$contratos],compact('hora','fecha'));  
        return $pdf->stream();                                            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->format('Y-m-d');

        $contrato = new Contrato();
        $usu = User::pluck('empleado_id','id');
        $empl = Empleado::pluck('nombre','id');
        $tcon = Tipocontrato::pluck('nombre','id');
        $tur = Turno::pluck('nombre','id');
        $econ = EstadoContrato::pluck('nombre','id');

        return view('contrato.create', compact('contrato','usu','empl','tcon','tur','econ','hora','fecha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Contrato::$rules);

        $contrato = Contrato::create($request->all());

        //CODIGO PARA LA BITACORA
        $detalle = "Registro de CONTRATO de: ".$contrato->empleado->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return redirect()->route('contratos.index')
            ->with('success', 'Contrato created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato = Contrato::find($id);

        return view('contrato.show', compact('contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->format('Y-m-d');

        $contrato = Contrato::find($id);
        $usu = User::pluck('empleado_id','id');
        $empl = Empleado::pluck('nombre','id');
        $tcon = Tipocontrato::pluck('nombre','id');
        $tur = Turno::pluck('nombre','id');
        $econ = EstadoContrato::pluck('nombre','id');

        //CODIGO PARA LA BITACORA
        $detalle = "Se EDITÓ los datos del CONTRATO de: ".$contrato->empleado->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return view('contrato.edit', compact('contrato','usu','empl','tcon','tur','econ','hora','fecha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Contrato $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contrato)
    {
        request()->validate(Contrato::$rules);

        $contrato->update($request->all());

        return redirect()->route('contratos.index')
            ->with('success', 'Contrato updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $contrato = Contrato::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Se ELIMINÓ el CONTRATO de: ".$contrato->empleado->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        $contrato->delete();

        return redirect()->route('contratos.index')
            ->with('success', 'Contrato deleted successfully');
    }
}
