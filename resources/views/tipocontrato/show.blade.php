@extends('adminlte::page')

@section('template_title')
    {{ $tipocontrato->name ?? 'Show Tipocontrato' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tipocontrato</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipocontratos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tipocontrato->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $tipocontrato->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Duracion:</strong>
                            {{ $tipocontrato->duracion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
