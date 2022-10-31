<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Puestolaboral;
use App\Models\Usuariomovil;
use Illuminate\Http\Request;

use App\Http\Controllers\BitacoraControllr;
/**
 * Class EmpleadoController
 * @package App\Http\Controllers
 */
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::paginate();

        return view('empleado.index', compact('empleados'))
            ->with('i', (request()->input('page', 1) - 1) * $empleados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = new Empleado();
        $puestolaboralss = Puestolaboral::pluck('nombre','id');
        $usuariomovilss = Usuariomovil::pluck('usuario','id');
        return view('empleado.create', compact('empleado','puestolaboralss','usuariomovilss'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Empleado::$rules);

        $empleado = Empleado::create($request->all());

        //CODIGO PARA LA BITACORA
        $detalle = "Registro de EMPLEADO: ".$empleado->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);

        return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $puestolaboralss = Puestolaboral::pluck('nombre','id');
        $usuariomovilss = Usuariomovil::pluck('usuario','id');

        //CODIGO PARA LA BITACORA
        $detalle = "Se EDITÓ los datos de EMPLEADO: ".$empleado->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return view('empleado.edit', compact('empleado','puestolaboralss','usuariomovilss'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Empleado $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        request()->validate(Empleado::$rules);

        $empleado->update($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Se ELIMINÓ los datos de EMPLEADO: ".$empleado->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado deleted successfully');
    }
}
