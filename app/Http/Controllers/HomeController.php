<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//
use Illuminate\Support\Carbon;
use App\Models\Empleado;
use App\Models\Comunicado;
use App\Models\Empleosolicitud;
use App\Models\Contacto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //
    //La funcion comentada me pide estar autenticado para
    //para poder usar las posteriores funciones.
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalEmpleados = Empleado::count();
        $totalComunicados = Comunicado::count();

        //$diaActual=;
        //$añoActual=;
        $mesActual= Carbon::now()->format('m'); 

        $totalSolicitudEmpleoMes = Empleosolicitud::whereMonth('created_at',$mesActual)->count();
        $totalContactos = Contacto::count();

        //ultimoComunicado 
        $allComunicados = Comunicado::all('id','titulo','detalle');
        $cadenacomun = json_decode($allComunicados);
        $ultimoComunicado = end($cadenacomun);

        //ultimoSolicitudEmpleo
        $allSolicitudEmpleo = Empleosolicitud::all();
        $cadenasoli = json_decode($allSolicitudEmpleo);
        $ultimoSolicitudEmpleo= end($cadenasoli);

        return view('home', compact('totalEmpleados','totalComunicados','totalSolicitudEmpleoMes','totalContactos',
                                    'ultimoComunicado','ultimoSolicitudEmpleo'));

    }

    public function bienvenido()
    {
        return view('welcome');
    }
}
