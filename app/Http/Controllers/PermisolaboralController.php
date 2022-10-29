<?php

namespace App\Http\Controllers;

use App\Models\Permisolaboral;
use Illuminate\Http\Request;

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
        return view('permisolaboral.create', compact('permisolaboral'));
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

        return view('permisolaboral.edit', compact('permisolaboral'));
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
