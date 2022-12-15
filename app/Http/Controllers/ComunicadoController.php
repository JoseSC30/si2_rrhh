<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\BitacoraController;

use Carbon\carbon;
use Auth;

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
        $usuarioss = User::pluck('email','id');

        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->toDateString();

        return view('comunicado.create', compact('comunicado','usuarioss','hora','fecha'));
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

        //CODIGO PARA LA BITACORA
        $detalle = "Registro de COMUNICADO: ".$comunicado->titulo;
        app(BitacoraController::class)->registrar($detalle);
        //

        return redirect()->route('comunicados.index')
            ->with('success', 'Comunicado created successfully.');
    }

    // FUNCION PARA EL API
    public function enviarComunicados()
    {
        $rec = Comunicado::all('id','titulo','detalle','fecha','hora');

        return response()->json($rec);
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
        $usuarioss = User::pluck('email','id');

        //CODIGO PARA LA BITACORA
        $detalle = "Se EDITÓ los datos del COMUNICADO: ".$comunicado->titulo;
        app(BitacoraController::class)->registrar($detalle);
        //

        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->toDateString();
        return view('comunicado.edit', compact('comunicado','usuarioss','hora','fecha'));
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
        $comunicado = Comunicado::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Se ELIMINÓ el COMUNICADO: ".$comunicado->titulo;
        app(BitacoraController::class)->registrar($detalle);
        //

        $comunicado->delete();

        return redirect()->route('comunicados.index')
            ->with('success', 'Comunicado deleted successfully');
    }
}
