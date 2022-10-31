<?php

namespace App\Http\Controllers;

use App\Models\Puestolaboral;
use App\Models\Recurso;
use App\Models\Recursoasignado;
use Illuminate\Http\Request;

/**
 * Class RecursoasignadoController
 * @package App\Http\Controllers
 */
class RecursoasignadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recursoasignados = Recursoasignado::paginate();

        return view('recursoasignado.index', compact('recursoasignados'))
            ->with('i', (request()->input('page', 1) - 1) * $recursoasignados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recursoasignado = new Recursoasignado();
        $recursoss = Recurso::pluck('nombre','id');
        $puestolaboralss = Puestolaboral::pluck('nombre','id');
        return view('recursoasignado.create', compact('recursoasignado','recursoss','puestolaboralss'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Recursoasignado::$rules);

        $recursoasignado = Recursoasignado::create($request->all());

        return redirect()->route('recursoasignados.index')
            ->with('success', 'Recursoasignado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recursoasignado = Recursoasignado::find($id);

        return view('recursoasignado.show', compact('recursoasignado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recursoasignado = Recursoasignado::find($id);
        $recursoss = Recurso::pluck('nombre','id');
        $puestolaboralss = Puestolaboral::pluck('nombre','id');
        return view('recursoasignado.edit', compact('recursoasignado','recursoss','puestolaboralss'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Recursoasignado $recursoasignado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recursoasignado $recursoasignado)
    {
        request()->validate(Recursoasignado::$rules);

        $recursoasignado->update($request->all());

        return redirect()->route('recursoasignados.index')
            ->with('success', 'Recursoasignado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $recursoasignado = Recursoasignado::find($id)->delete();

        return redirect()->route('recursoasignados.index')
            ->with('success', 'Recursoasignado deleted successfully');
    }
}
