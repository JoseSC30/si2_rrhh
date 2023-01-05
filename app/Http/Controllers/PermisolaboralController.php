<?php

namespace App\Http\Controllers;

use App\Models\Permisolaboral;
use App\Models\Usuariomovil;
use Illuminate\Http\Request;
use Carbon\carbon;

/**
 * Class PermisolaboralController
 * @package App\Http\Controllers
 */
class PermisolaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisolaborals = Permisolaboral::paginate();

        return view('permisolaboral.index', compact('permisolaborals'))
            ->with('i', (request()->input('page', 1) - 1) * $permisolaborals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisolaboral = new Permisolaboral();
        $usuariomovilss = Usuariomovil::pluck('usuario','id');
        return view('permisolaboral.create', compact('permisolaboral','usuariomovilss'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Permisolaboral::$rules);

        $permisolaboral = Permisolaboral::create($request->all());

        return redirect()->route('permisolaborals.index')
            ->with('success', 'Permisolaboral created successfully.');
    }
////////////////////// FUNCION PARA EL API /////////////////////////////////
    public function enviarPermisos()
    {
        $rec = Permisolaboral::all('id','usuariomovil_id','detalle','fecha','hora');

        return response()->json($rec);
    }

    public function registrarPermisos(Request $request)
    {   
        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->format('Y-m-d'); 

        $permisoARegistrar = new Permisolaboral();

        $datos = json_decode($request->getContent());

        $permisoARegistrar->detalle = $datos->detalle;
        $permisoARegistrar->usuariomovil_id = $datos->usuariomovil_id;
        $permisoARegistrar->hora = $hora;
        $permisoARegistrar->fecha = $fecha;
        $permisoARegistrar->save();

        return response()->json($permisoARegistrar);
    }
///////////////////////////////////////////////////////////////////////////
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permisolaboral = Permisolaboral::find($id);

        return view('permisolaboral.show', compact('permisolaboral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permisolaboral = Permisolaboral::find($id);
        $usuariomovilss = Usuariomovil::pluck('usuario','id');
        return view('permisolaboral.edit', compact('permisolaboral','usuariomovilss'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Permisolaboral $permisolaboral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permisolaboral $permisolaboral)
    {
        request()->validate(Permisolaboral::$rules);

        $permisolaboral->update($request->all());

        return redirect()->route('permisolaborals.index')
            ->with('success', 'Permisolaboral updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $permisolaboral = Permisolaboral::find($id)->delete();

        return redirect()->route('permisolaborals.index')
            ->with('success', 'Permisolaboral deleted successfully');
    }
}
