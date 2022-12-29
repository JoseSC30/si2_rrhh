@extends('adminlte::page')

@section('content')
<div class="container">
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


    <!-- Esto es un comentario -->
    <div class="content">
    <div class="card">
            <div class= "row">
                <!-- total de empleados registrados -->
                <div class="col-lg-4">
                    <div class="small-box bg-info">
                        <div class="inner">
                          <!--  <h4 id="totalEmpleados"> 6 </h4> -->
                          <h4> 6 </h4>
                            <p>{{ __('Empleados registrados') }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                        <a href="{{ url('empleados')}}" style="cursor:pointer;" class="small-box-footer">  Mas info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- total de flatas registrados -->
                <div class="col-lg-4">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h4 id="totalComunicados">3 </h4>

                            <p>Total de comunicados</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                        <a style="cursor:pointer;" class="small-box-footer">  Mas info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            

            <!-- total de empleados registrados -->
            <div class="col-lg-4">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4 id="totalEmpleados">5 </h4>

                            <p> Total solicitudes de permiso</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-list"></i>
                        </div>
                        <a style="cursor:pointer;" class="small-box-footer">  Mas info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
        </div>

        <div class= "row">
             <!-- total de empleados registrados -->
             <div class="col-lg-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4 id="totalEmpleados">2 </h4>

                            <p>Puesto laboral disponible</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-filing"></i>
                        </div>
                        <a style="cursor:pointer;" class="small-box-footer">  Mas info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
             <!-- total de empleados registrados -->
             <div class="col-lg-4">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h4 id="totalEmpleados">22 </h4>

                            <p>contactos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                        <a style="cursor:pointer;" class="small-box-footer">  Mas info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
            </div>

            <!-- total de empleados registrados -->
            <div class="col-lg-4">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h4 id="totalEmpleados"> ...</h4>

                            <p>...</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-calendar"></i>
                        </div>
                        <a style="cursor:pointer;" class="small-box-footer">  Mas info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
            </div>

        </div>

    </div> 
    </div> 

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">




</div>
@endsection

