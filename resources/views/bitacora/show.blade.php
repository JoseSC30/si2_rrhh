@extends('adminlte::page')

@section('template_title')
    {{ $bitacora->name ?? 'Show Bitacora' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Información completa de bitácora</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bitacoras.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Detalle:</strong>
                            {{ $bitacora->detalle }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $bitacora->hora }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $bitacora->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre de empleado a cargo:</strong>
                            {{ $bitacora->user->empleados->nombre }}
                            <strong>    Username:</strong>
                            {{ $bitacora->user->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
