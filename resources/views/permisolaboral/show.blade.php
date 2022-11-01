@extends('adminlte::page')

@section('template_title')
    {{ $permisolaboral->name ?? 'Show Permisolaboral' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Permisolaboral</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('permisolaborals.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Detalle:</strong>
                            {{ $permisolaboral->detalle }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $permisolaboral->hora }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $permisolaboral->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Usuariomovil Id:</strong>
                            {{ $permisolaboral->usuariomovil_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
