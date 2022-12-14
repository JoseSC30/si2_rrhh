@extends('adminlte::page')

@section('template_title')
    {{ $estadoContrato->name ?? 'Show Estado Contrato' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Estado Contrato</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estado-contratos.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $estadoContrato->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
