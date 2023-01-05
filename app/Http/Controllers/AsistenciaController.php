<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;
use App\Models\Usuariomovil;
use Carbon\carbon;

/**
 * Class AsistenciaController
 * @package App\Http\Controllers
 */
class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencias = Asistencia::paginate();

        return view('asistencia.index', compact('asistencias'))
            ->with('i', (request()->input('page', 1) - 1) * $asistencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asistencia = new Asistencia();
        $usuariomovilss = Usuariomovil::pluck('usuario','id');
        return view('asistencia.create', compact('asistencia','usuariomovilss'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Asistencia::$rules);

        $asistencia = Asistencia::create($request->all());

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia created successfully.');
    }
    /////////////////////CODIGO PARA EL API //////////////////////////
    public function registrosAsistencias(){

        $rec = Asistencia::all('id','hora_llegada','hora_salida','fecha','usuariomovil_id');

        return response()->json($rec);
    
    }

    public function registrarLlegada(Request $request){
        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->format('Y-m-d'); 

        $marcarLlegada = new Asistencia();

        $datos = json_decode($request->getContent());

        $marcarLlegada->usuariomovil_id = $datos->usuariomovil_id;
        $marcarLlegada->hora_llegada = $hora;
        $marcarLlegada->hora_salida = '00:00:00';
        $marcarLlegada->fecha = $fecha;
        $marcarLlegada->save();

        return response()->json($marcarLlegada);
    }

    public function registrarSalida(Request $request){

        $datos = json_decode($request->getContent());
        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();

        $marcarLlegada = Asistencia::where("usuariomovil_id","=", $datos->usuariomovil_id )->where("hora_salida","=",'00:00:00')->first();
    
        if($marcarLlegada) {
            $marcarLlegada->hora_salida = $hora;
            $marcarLlegada->save();
            return response()->json($marcarLlegada);
        } else {
            // Devolver una respuesta de error
            return response()->json([
                'status' => 'error',
                'message' => 'No se ha encontrado el registro especificado'
            ]);
        } 
    }
    //////////////////////////////////////////////////////////////////

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asistencia = Asistencia::find($id);

        return view('asistencia.show', compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asistencia = Asistencia::find($id);
        $usuariomovilss = Usuariomovil::pluck('usuario','id');
        return view('asistencia.edit', compact('asistencia','usuariomovilss'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        request()->validate(Asistencia::$rules);

        $asistencia->update($request->all());

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::find($id)->delete();

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia deleted successfully');
    }
}
