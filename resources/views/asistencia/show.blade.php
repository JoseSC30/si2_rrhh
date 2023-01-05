@extends('adminlte::page')

@section('template_title')
    {{ $asistencia->name ?? 'Show Asistencia' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Asistencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('asistencias.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Hora Llegada:</strong>
                            {{ $asistencia->hora_llegada }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Salida:</strong>
                            {{ $asistencia->hora_salida }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $asistencia->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre del Empleado:</strong>
                            {{ $asistencia->empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Movil:</strong>
                            {{ $asistencia->usuariomovil->usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Puesto Laboral:</strong>
                            {{ $asistencia->empleado->puestolaboral->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
