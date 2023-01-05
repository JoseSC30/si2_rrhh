<?php

namespace App\Http\Controllers;

use App\Models\Empleosolicitud;
use App\Models\Puestolaboral;
use Illuminate\Http\Request;
use Auth;

/**
 * Class EmpleosolicitudController
 * @package App\Http\Controllers
 */
class EmpleosolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleosolicituds = Empleosolicitud::paginate();

        return view('empleosolicitud.index', compact('empleosolicituds'))
            ->with('i', (request()->input('page', 1) - 1) * $empleosolicituds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function solicitudesss()
    {
        $empleosolicitud = new Empleosolicitud();
        return view('empleosolicitud.solicitud', compact('empleosolicitud'));
    }

    public function create()
    {
        $empleosolicitud = new Empleosolicitud();
        
        $puestolaboralss = Puestolaboral::pluck('nombre','id');

        if(Auth::user()==null){
            return view('empleosolicitud.solicitud', compact('empleosolicitud','puestolaboralss'));
        }else{
            return view('empleosolicitud.create', compact('empleosolicitud','puestolaboralss'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Empleosolicitud::$rules);

        $empleosolicitud = Empleosolicitud::create($request->all());

        // return redirect()->route('empleosolicituds.index')
        //     ->with('success', 'Empleosolicitud created successfully.');
        return redirect()->route('welcomes.bienvenido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleosolicitud = Empleosolicitud::find($id);

        return view('empleosolicitud.show', compact('empleosolicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleosolicitud = Empleosolicitud::find($id);

        return view('empleosolicitud.edit', compact('empleosolicitud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Empleosolicitud $empleosolicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleosolicitud $empleosolicitud)
    {
        request()->validate(Empleosolicitud::$rules);

        $empleosolicitud->update($request->all());

        return redirect()->route('empleosolicituds.index')
            ->with('success', 'Empleosolicitud updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $empleosolicitud = Empleosolicitud::find($id)->delete();

        return redirect()->route('empleosolicituds.index')
            ->with('success', 'Empleosolicitud deleted successfully');
    }
}
