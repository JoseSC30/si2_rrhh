@extends('adminlte::page')

@section('template_title')
    {{ $recursoasignado->name ?? 'Show Recursoasignado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Recurso Asignado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('recursoasignados.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Recurso Id:</strong>
                            {{ $recursoasignado->recurso_id }}
                        </div>
                        <div class="form-group">
                            <strong>Puestolaboral Id:</strong>
                            {{ $recursoasignado->puestolaboral_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
