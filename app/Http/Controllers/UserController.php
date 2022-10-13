<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Rol;
use App\Models\Empleado;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
//
use App\Http\Controllers\BitacoraController;
//

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();

        $rols = Rol::pluck('nombre','id');
        $empleados = Empleado::pluck('nombre','id');

        return view('user.create', compact('user','rols','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        //$user = User::create($request->all());

        $user = User::create([
            'rol_id' => $request['rol_id'],
            'empleado_id' => $request['empleado_id'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        //CODIGO PARA LA BITACORA
        $detalle = "Registro de nuevo USUARIO para el EMPLEADO: ".$user->empleados->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $rols = Rol::pluck('nombre','id');
        $empleados = Empleado::pluck('nombre','id');

        //CODIGO PARA LA BITACORA
        $detalle = "Se EDITÓ el USUARIO del empleado: ".$user->empleados->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return view('user.edit', compact('user','rols','empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Se eliminó el USUARIO del EMPLEADO: ".$user->empleados->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
