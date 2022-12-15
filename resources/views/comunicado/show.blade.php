@extends('adminlte::page')

@section('template_title')
    {{ $comunicado->name ?? 'Show Comunicado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Comunicado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('comunicados.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Autor de Comunicado:</strong>
                            {{ $comunicado->usuario->empleados->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $comunicado->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Detalle:</strong>
                            {{ $comunicado->detalle }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $comunicado->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $comunicado->hora }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
