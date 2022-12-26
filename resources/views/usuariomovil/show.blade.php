@extends('adminlte::page')

@section('template_title')
    {{ $usuariomovil->name ?? 'Show Usuariomovil' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Usuario Movil</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('usuariomovils.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Usuario:</strong>
                            {{ $usuariomovil->usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Contrasena:</strong>
                            {{ $usuariomovil->contrasena }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
