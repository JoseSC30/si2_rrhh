@extends('adminlte::page')

@section('template_title')
    {{ $contrato->name ?? 'Show Contrato' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostar detalle de Contrato</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('contratos.index') }}"> volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Registrado por:</strong>
                            {{ $contrato->user->empleados->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Empleado:</strong>
                            {{ $contrato->empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de contrato:</strong>
                            {{ $contrato->tipoContrato->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Estado del contrato:</strong>
                            {{ $contrato->estadoContrato->nombre}}
                        </div>
                        <div class="form-group">
                            <strong>Turno:</strong>
                            {{ $contrato->turno->nombre}}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $contrato->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $contrato->hora }}
                        </div>
                        <div class="form-group">
                            <strong>Latitud:</strong>
                            {{ $contrato->latitud }}
                        </div>
                        <div class="form-group">
                            <strong>Longitud:</strong>
                            {{ $contrato->longitud }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
