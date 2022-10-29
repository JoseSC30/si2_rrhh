<?php

namespace App\Http\Controllers;

use App\Models\Puestolaboral;
use Illuminate\Http\Request;

/**
 * Class PuestolaboralController
 * @package App\Http\Controllers
 */
class PuestolaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestolaborals = Puestolaboral::paginate();

        return view('puestolaboral.index', compact('puestolaborals'))
            ->with('i', (request()->input('page', 1) - 1) * $puestolaborals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puestolaboral = new Puestolaboral();
        return view('puestolaboral.create', compact('puestolaboral'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Puestolaboral::$rules);

        $puestolaboral = Puestolaboral::create($request->all());

        return redirect()->route('puestolaborals.index')
            ->with('success', 'Puestolaboral created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $puestolaboral = Puestolaboral::find($id);

        return view('puestolaboral.show', compact('puestolaboral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puestolaboral = Puestolaboral::find($id);

        return view('puestolaboral.edit', compact('puestolaboral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Puestolaboral $puestolaboral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Puestolaboral $puestolaboral)
    {
        request()->validate(Puestolaboral::$rules);

        $puestolaboral->update($request->all());

        return redirect()->route('puestolaborals.index')
            ->with('success', 'Puestolaboral updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $puestolaboral = Puestolaboral::find($id)->delete();

        return redirect()->route('puestolaborals.index')
            ->with('success', 'Puestolaboral deleted successfully');
    }
}
