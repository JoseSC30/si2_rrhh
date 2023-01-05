<?php

namespace App\Http\Controllers;

use App\Models\Sueldo;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Carbon\carbon;
/**
 * Class SueldoController
 * @package App\Http\Controllers
 */
class SueldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sueldos = Sueldo::paginate();

        return view('sueldo.index', compact('sueldos'))
            ->with('i', (request()->input('page', 1) - 1) * $sueldos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sueldo = new Sueldo();
        $empleado = Empleado::pluck('nombre','id');

        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->toDateString();

        return view('sueldo.create', compact('sueldo','empleado','fecha','hora'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Sueldo::$rules);

        $sueldo = Sueldo::create($request->all());

        return redirect()->route('sueldos.index')
            ->with('success', 'Sueldo created successfully.');
    }

    // FUNCION PARA EL API
    // public function enviarSueldos(Request $request)
    // {
    //     // $empleado;
    //     // $sueldosEmpleado;
    //     $sueldosEmpleado;

    //     // $empleados = Empleado::all();
    //     // foreach ($empleados as $key) {
    //     //     if ($key->id == $request) {
    //     //         $empleado = $key;
    //     //     }
    //     // }

    //     $sueldos = Sueldo::all();
    //     foreach ($sueldos as $key) {
    //         if($key->empleado_id == $request->body) {
    //             // $sueldosEmpleado[] = $key ;
    //             $sueldosEmpleado[] = [
    //                 'id'    => $key->id,
    //                 'empleado_id'=> $key->empleado_id,
    //                 'monto' => $key->monto,
    //                 'fecha' => $key->fecha,
    //                 'hora'  => $key->hora
    //                 ];
    //         }
    //     }

    //     // $rec = Sueldo::all('id','monto','fecha','hora');

    //     return response()->json($sueldosEmpleado);
    // }
    public function enviarSueldos()
    {
        $rec = Sueldo::all('id','empleado_id','monto','fecha','hora');

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
        $sueldo = Sueldo::find($id);

        return view('sueldo.show', compact('sueldo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sueldo = Sueldo::find($id);
        $empleado = Empleado::pluck('nombre','id');

        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->toDateString();

        return view('sueldo.edit', compact('sueldo','empleado','fecha','hora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sueldo $sueldo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sueldo $sueldo)
    {
        request()->validate(Sueldo::$rules);

        $sueldo->update($request->all());

        return redirect()->route('sueldos.index')
            ->with('success', 'Sueldo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sueldo = Sueldo::find($id)->delete();

        return redirect()->route('sueldos.index')
            ->with('success', 'Sueldo deleted successfully');
    }
}
