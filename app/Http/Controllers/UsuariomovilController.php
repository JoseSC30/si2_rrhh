<?php

namespace App\Http\Controllers;

use App\Models\Usuariomovil;
use App\Models\Empleado;
use App\Models\Sueldo;

use Illuminate\Http\Request;

//
use Illuminate\Support\Facades\Hash;
//

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

      ////////  $usuariomovil = Usuariomovil::create($request->all());      //solo estba esto

       //
        $usuariomovil = Usuariomovil::create([
           // 'empleado_id' => $request['empleado_id'],
            'usuario' => $request['usuario'],
            'contrasena' => Hash::make($request['contrasena']),
        ]);
        //

        return redirect()->route('usuariomovils.index')
            ->with('success', 'Usuario Movil Creado.');
    }
////////////////////// FUNCIONES DE EL API //////////////////////////
 /*   public function enviarUsuariomovils()
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
*/
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

        // $usuariomovil->update($request->all());

        $usuariomovil->update([
             'usuario' => $request['usuario'],
             'contrasena' => Hash::make($request['contrasena']),
         ]);

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


    //------------------------------------------------------------------------------------------------------
    //adicional funciones para el Api sanctum --------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------

    /* 
    //cambiar la variable users a usuariomovils y sus atributos correspondientes 
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de usuario exitoso!",
        ]);
    } 
    */

    public function login(Request $request){
        $request->validate([
            'usuario' => 'required|email',
            'contrasena' => 'required'
        ]);

        $usuariomovil=usuariomovil::where("usuario","=", $request->usuario)->first();
        
        if( isset($usuariomovil->id) ){
            if(Hash::check($request->contrasena, $usuariomovil->contrasena)){
                //creamos el token
                $token = $usuariomovil->createToken("auth_token")->plainTextToken;
                //Busca al empleado al que pertenece el usuario movil.
                $empleado;
                // $sueldosEmpleado;
                $sueldosEmpleado;

                $empleados = Empleado::all();
                foreach ($empleados as $key) {
                    if ($key->usuariomovil_id == $usuariomovil->id) {
                        $empleado = $key;
                    }
                }

                $sueldos = Sueldo::all();
                foreach ($sueldos as $key) {
                    if($key->empleado_id == $empleado->id) {
                        // $sueldosEmpleado[] = $key ;
                        $sueldosEmpleado[] = [
                            'id'    => $key->id,
                            'monto' => $key->monto,
                            'fecha' => $key->fecha,
                            'hora'  => $key->hora
                            ];
                    }
                }

                //si está todo bien
                return response()->json([
                    //TOKEN y CONFIRMACIÓN (Para enviar al celular)
                    "status" => 1,
                    "msg" => "¡Usuario logueado exitosamente!",
                    "access_token" => $token,

                    //INFORMACION DEL EMPLEADO (Para enviar al celular)
                    'id' => $empleado->id,
                    'nombre' => $empleado->nombre,
                    'ci' => $empleado->ci,
                    'fnacimiento' => $empleado->fnacimiento,
                    'sexo' => $empleado->sexo,
                    'direccion' => $empleado->direccion,
                    'puestoLLaboral' => $empleado->puestolaboral->nombre,
                    'usuariomovil_id' => $usuariomovil->id,
                    
                    //HISTORIAL DE SUELDOS (Para enviar al celular)
                    // 'sueldos' => $sueldosEmpleado,
                ]);        
            }else{
                return response()->json([
                    "status" => 0,
                    "msg" => "La password es incorrecta",
                ], 404);    
            }

        }else{
            return response()->json([
                "status" => 0,
                "msg" => "Usuario no registrado",
            ], 404);  
        }
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

    /*
    public function userProfile(){
        return response()->json([
            "status" => 0,
            "msg" => "Acerca del perfil de usuario",
            "data" => auth()->usuariomovils()
        ]);     
    }
    */

    public function logout(){
        auth()->usuariomovils()->tokens()->delete();
        
        return response()->json([
            "status" => 1,
            "msg" => "Cierre de Sesión",            
        ]);

    }
    //-------------------------------------------------------------------------------------------

}
