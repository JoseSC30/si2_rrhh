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
                            <span class="card-title">Show Asistencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('asistencias.index') }}"> Back</a>
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
                            <strong>Usuariomovil Id:</strong>
                            {{ $asistencia->usuariomovil_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
