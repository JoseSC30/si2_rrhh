@extends('adminlte::page')

@section('template_title')
    {{ $permisolaboral->name ?? 'Show Permisolaboral' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Permiso Laboral</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('permisolaborals.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Detalle del Permiso:</strong>
                            {{ $permisolaboral->detalle }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $permisolaboral->hora }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $permisolaboral->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Movil:</strong>
                            {{ $permisolaboral->usuariomovil->usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre del Empleado:</strong>
                            {{ $permisolaboral->empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Puesto Laboral:</strong>
                            {{ $permisolaboral->empleado->puestolaboral->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
