@extends('adminlte::page')

@section('template_title')
    {{ $planillasueldo->name ?? 'Show Planillasueldo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Planillasueldo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('planillasueldos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empleado Id:</strong>
                            {{ $planillasueldo->empleado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $planillasueldo->monto }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $planillasueldo->hora }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $planillasueldo->fecha }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
