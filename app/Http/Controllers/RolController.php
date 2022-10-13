<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
//
use App\Http\Controllers\BitacoraController;
//

/**
 * Class RolController
 * @package App\Http\Controllers
 */
class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rols = Rol::paginate();

        return view('rol.index', compact('rols'))
            ->with('i', (request()->input('page', 1) - 1) * $rols->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rol = new Rol();
        return view('rol.create', compact('rol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Rol::$rules);

        $rol = Rol::create($request->all());

        //CODIGO PARA LA BITACORA
        $detalle = "Registro de ROL: ".$rol->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return redirect()->route('rols.index')
            ->with('success', 'Rol created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Rol::find($id);

        return view('rol.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Rol::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Edición de ROL: ".$rol->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return view('rol.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Rol $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $rol)
    {
        request()->validate(Rol::$rules);

        $rol->update($request->all());

        return redirect()->route('rols.index')
            ->with('success', 'Rol updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rol = Rol::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Se ELIMINÓ el ROL: ".$rol->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        $rol->delete();

        return redirect()->route('rols.index')
            ->with('success', 'Rol deleted successfully');
    }
}
