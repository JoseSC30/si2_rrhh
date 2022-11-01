<?php

namespace App\Http\Controllers;

use App\Models\Planillasueldo;
use Illuminate\Http\Request;

use App\Models\Empleado;

//
use PDF;

/**
 * Class PlanillasueldoController
 * @package App\Http\Controllers
 */
class PlanillasueldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planillasueldos = Planillasueldo::paginate();

        return view('planillasueldo.index', compact('planillasueldos'))
            ->with('i', (request()->input('page', 1) - 1) * $planillasueldos->perPage());
    }

    public function pdf(Request $request)
    {
        $planillasueldos = Planillasueldo::paginate();
        $pdf = PDF::loadView('planillasueldo.pdf',['planillasueldos'=>$planillasueldos]);  
        return $pdf->stream();                                            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planillasueldo = new Planillasueldo();
        $empleadoss = Empleado::pluck('nombre','id');
        return view('planillasueldo.create', compact('planillasueldo','empleadoss'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Planillasueldo::$rules);

        $planillasueldo = Planillasueldo::create($request->all());

        return redirect()->route('planillasueldos.index')
            ->with('success', 'Planillasueldo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planillasueldo = Planillasueldo::find($id);

        return view('planillasueldo.show', compact('planillasueldo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planillasueldo = Planillasueldo::find($id);
        $empleadoss = Empleado::pluck('nombre','id');

        return view('planillasueldo.edit', compact('planillasueldo','empleadoss'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Planillasueldo $planillasueldo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planillasueldo $planillasueldo)
    {
        request()->validate(Planillasueldo::$rules);

        $planillasueldo->update($request->all());

        return redirect()->route('planillasueldos.index')
            ->with('success', 'Planillasueldo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $planillasueldo = Planillasueldo::find($id)->delete();

        return redirect()->route('planillasueldos.index')
            ->with('success', 'Planillasueldo deleted successfully');
    }
}
