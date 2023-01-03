<?php

namespace App\Http\Controllers;

use App\Models\Sueldo;
use Illuminate\Http\Request;

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
        return view('sueldo.create', compact('sueldo'));
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

        return view('sueldo.edit', compact('sueldo'));
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
