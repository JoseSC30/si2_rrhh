@extends('adminlte::page')

@section('content')

<div class="container">
    <!--
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('¡BIENVENIDO A LA PLATAFORMA PARA LA GESTION DE RECURSOS HUMANOS!') }}</div>

                <div class="card-body">
                    @if (session('status'))7
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     {{ __('Puedes iniciar con tus operaciones.') }} 
                </div>

            </div>
        </div>   
    </div>
    -->

     <!-- CARRUCEL DE IMAGENES -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="vendor/adminlte/dist/img/panel11.jpeg" alt="First slide">
            
            <div class="card-img-overlay">
                <h2 class="card-text text-danger">¡BIENVENIDO A LA PLATAFORMA PARA LA GESTION DE RECURSOS HUMANOS!</h2>
            </div>

            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="vendor/adminlte/dist/img/panel22.jpeg" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="vendor/adminlte/dist/img/panel33.jpeg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon bg-danger" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon bg-danger" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    

    <!-- TARJETAS INFORMATIVAS -->
    <div class="content">
        <div class="card">
            <div class= "row">
                <!-- total de empleados -->
                <div class="col-lg-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                          <h4> {{$totalEmpleados}} </h4>
                            <p>{{ __('Total de Empleados') }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-people"></i>
                        </div>
                        <a href="{{ url('empleados')}}" style="cursor:pointer;" class="small-box-footer">  Mas info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Total de comunicados -->
                <div class="col-lg-3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h4> {{$totalComunicados}} </h4>

                            <p>Total de comunicados</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                        <a href="{{ url('comunicados')}}"  style="cursor:pointer;" class="small-box-footer">  Mas info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            
                <!-- Total solicitudes de empleo del mes -->
                <div class="col-lg-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4>{{$totalSolicitudEmpleoMes}}</h4>
                            <p>Solicitudes de empleo del mes</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-globe"></i>
                        </div>
                        <a href="{{ url('empleosolicituds')}}" style="cursor:pointer;" class="small-box-footer">  Mas info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Total de contactos -->
                <div class="col-lg-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4 >{{$totalContactos}} </h4>
                            <p>contactos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-filing"></i>
                        </div>
                        <a href="{{ url('contactos')}}" style="cursor:pointer;" class="small-box-footer">  Mas info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>    
                </div>

            </div>

            
            <div class= "row">
                <!-- ULTIMO COMUNICADO-->
                <div class="col-lg-5" >
                    <div class="small-box">
                        <div class="card card-warning">
                            <div class="card-header" >
                                <h1 class="card-title" >ULTIMO COMUNICADO</h1>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                    <i class="fas fa-expand"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div> 
                        
                            <div class="card-body"> 
                                <div class="inner">
                                    <h5> {{$ultimoComunicado->titulo}} </h5>
                                    <h5> {{$ultimoComunicado->detalle}}</h5>
                                <!--     
                                <div class="icon col-lg-10 md-2" >    
                                    <i class="ion ion-clipboard"></i>
                                </div>
                                -->
                                
                                <a href="{{ route('comunicados.show',$ultimoComunicado->id) }}" style="cursor:pointer;" class="small-box-footer bg-dark">Leer mas <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        
                        </div> 
                    </div>  
                </div>
                
                <!-- INFO ultima solicitud de empleo-->
                <div class="col-lg-12">
                        <div class="card card-success">
                            <div class="card-header" >
                                <h1 class="card-title" >INFO ultima solicitud de empleo</h1>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                    <i class="fas fa-expand"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div> 
                        
                            <div class="card-body"> 
                                    <h6> Puesto: {{$ultimoSolicitudEmpleo->id}}</h6>
                                    <h6> Nombre: {{$ultimoSolicitudEmpleo->nombre}}</h6>
                                    <h6> Email: {{$ultimoSolicitudEmpleo->email}}</h6>
                                    <h6> CV:<a href="{{$ultimoSolicitudEmpleo->link_cv}}" class="card-link" > {{$ultimoSolicitudEmpleo->link_cv}}</a></h6>

                                <a href="{{ url('empleosolicituds')}}" style="cursor:pointer;" class="small-box-footer bg-dark">ver mas solicitudes <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        
                        </div> 
                   
                </div>

            </div>

            <!-- imagen -->
            <div class= "card card-col-lg-1">
                <img class="h-100 d-inline-block" style="width: 550px; height: 100px" src="vendor/adminlte/dist/img/panel4.jpeg" >
            </div>
        

        </div> 
    </div> 

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


</div>
@endsection

