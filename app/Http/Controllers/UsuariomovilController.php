<?php

namespace App\Http\Controllers;

use App\Models\Usuariomovil;
use App\Models\Empleado;

use Illuminate\Http\Request;

/**
 * Class UsuariomovilController
 * @package App\Http\Controllers
 */
class UsuariomovilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuariomovils = Usuariomovil::paginate();

        return view('usuariomovil.index', compact('usuariomovils'))
            ->with('i', (request()->input('page', 1) - 1) * $usuariomovils->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuariomovil = new Usuariomovil();
        return view('usuariomovil.create', compact('usuariomovil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Usuariomovil::$rules);

        $usuariomovil = Usuariomovil::create($request->all());

        return redirect()->route('usuariomovils.index')
            ->with('success', 'Usuariomovil created successfully.');
    }
////////////////////// FUNCIONES DE EL API //////////////////////////
    public function enviarUsuariomovils()
    {
        $cuentas = Usuariomovil::all('id','usuario','contrasena');

        return response()->json($cuentas);
    }

    public function enviarEmpleados() 
    {
        $empleados = Empleado::all('id','nombre','ci','fnacimiento','sexo','direccion', 'puestolaboral_id','usuariomovil_id');

        return response()->json($empleados);
        
    }
    public function buscarEmpleado(Request $request)
    {
        $e_id = $request->input('id');

        $empleados = Empleado::all();
        foreach ($empleados as $key ) {
            if ($key->usuariomovil_id == $e_id) {
                return response()->json([
                    'id' => $key->id,
                    'nombre' => $key->nombre,
                    'ci' => $key->ci,
                    'fnacimiento' => $key->fnacimiento,
                    'sexo' => $key->sexo,
                    'direccion' => $key->direccion,
                    'puestoLLaboral' => $key->puestolaboral->nombre,
                ]);
            }
        }
    }

////////////////////////////////////////////////////////////////
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuariomovil = Usuariomovil::find($id);

        return view('usuariomovil.show', compact('usuariomovil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuariomovil = Usuariomovil::find($id);
        return view('usuariomovil.edit', compact('usuariomovil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Usuariomovil $usuariomovil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuariomovil $usuariomovil)
    {
        request()->validate(Usuariomovil::$rules);

        $usuariomovil->update($request->all());

        return redirect()->route('usuariomovils.index')
            ->with('success', 'Usuariomovil updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $usuariomovil = Usuariomovil::find($id)->delete();

        return redirect()->route('usuariomovils.index')
            ->with('success', 'Usuariomovil deleted successfully');
    }
}
