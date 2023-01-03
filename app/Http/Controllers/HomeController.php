<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//
use App\Models\Empleado;
use App\Models\Comunicado;
use App\Models\Contacto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalEmpleados = Empleado::count();
        $totalComunicados = Comunicado::count();

        $todoscomun = Comunicado::all('id','titulo','detalle');
        $cadena = json_decode($todoscomun);
        $Comun = end($cadena);
        $xComun = $Comun;

        $totalContactos = Contacto::count();

        return view('home', compact('totalEmpleados','totalComunicados','xComun','totalContactos'));

    }


}
