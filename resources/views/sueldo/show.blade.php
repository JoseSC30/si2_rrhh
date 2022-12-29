@extends('adminlte::page')

@section('template_title')
    {{ $sueldo->name ?? 'Show SUELDOS' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show SUELDOS</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sueldos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empleado:</strong>
                            {{ $sueldo->empleado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $sueldo->monto }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $sueldo->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $sueldo->hora }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
