@extends('adminlte::page')

@section('template_title')
    {{ $recurso->name ?? 'Show Recurso' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Información Completa Recurso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('recursos.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre del Recurso o Beneficio:</strong>
                            {{ $recurso->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Detalles:</strong>
                            {{ $recurso->detalle }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $recurso->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Final:</strong>
                            {{ $recurso->fecha_final }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
