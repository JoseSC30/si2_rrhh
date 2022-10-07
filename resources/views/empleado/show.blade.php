@extends('adminlte::page')

@section('template_title')
    {{ $empleado->name ?? 'Show Empleado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Puestolaboral Id:</strong>
                            {{ $empleado->puestolaboral_id }}
                        </div>
                        <div class="form-group">
                            <strong>Usuariomovil Id:</strong>
                            {{ $empleado->usuariomovil_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Ci:</strong>
                            {{ $empleado->ci }}
                        </div>
                        <div class="form-group">
                            <strong>Fnacimiento:</strong>
                            {{ $empleado->fnacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo:</strong>
                            {{ $empleado->sexo }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $empleado->direccion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
