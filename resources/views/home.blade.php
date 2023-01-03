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
            

                <!-- Total solicitudes de permiso -->
                <div class="col-lg-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4>5 </h4>
                            <p> Total solicitudes de permiso</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-globe"></i>
                        </div>
                        <a style="cursor:pointer;" class="small-box-footer">  Mas info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- total de contactos -->
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
                <div class="col-lg-5">

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
                                    <h5> {{$xComun->titulo}} </h5>
                                    <h5> {{$xComun->detalle}}</h5>
                                <!--     
                                <div class="icon col-lg-10 md-2" >    
                                    <i class="ion ion-clipboard"></i>
                                </div>
                                -->
                                <a href="{{ route('comunicados.show',$xComun->id) }}" style="cursor:pointer;" class="small-box-footer bg-dark">Leer mas <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        
                        </div> 
                    </div>  
                </div>


                <!-- INFO PUESTO LABORAL DISPONIBLE-->
                <div class="col-lg-12">
                        <div class="card card-success">
                            <div class="card-header" >
                                <h1 class="card-title" >INFO PUESTO DISPONIBLE</h1>
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
                                    <h5> {{$xComun->detalle}}</h5>
                                <a href="{{ route('comunicados.show',$xComun->id) }}" style="cursor:pointer;" class="small-box-footer bg-dark">Leer mas <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        
                        </div> 
                   
                </div>

            </div>

            <!-- imagen -->
            <div class= "card card-col-lg-1">
                <img class="h-100 d-inline-block" style="width: 550px; height: 100px" src="vendor/adminlte/dist/img/panel4.jpeg" >
            </div>
            




            <!-- NOSE---------------------------------Main node for this component -->
                <div class="timeline">
                <!-- Timeline time label -->
                <div class="time-label">
                    <span class="bg-green">23 Aug. 2019</span>
                </div>
                <div>
                <!-- Before each timeline item corresponds to one icon on the left scale -->
                    <i class="fas fa-envelope bg-blue"></i>
                    <!-- Timeline item -->
                    <div class="timeline-item">
                    <!-- Time -->
                    <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                    <!-- Header. Optional -->
                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                    <!-- Body -->
                    <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <!-- Placement of additional controls. Optional -->
                    <div class="timeline-footer">
                        <a class="btn btn-primary btn-sm">Read more</a>
                        <a class="btn btn-danger btn-sm">Delete</a>
                    </div>
                    </div>
                </div>
                <!-- The last icon means the story is complete -->
                <div>
                    <i class="fas fa-clock bg-gray"></i>
                </div>
                </div>





        </div> 
    </div> 

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


</div>
@endsection

