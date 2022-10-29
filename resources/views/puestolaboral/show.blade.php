@extends('adminlte::page')

@section('template_title')
    {{ $puestolaboral->name ?? 'Show Puestolaboral' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Puestolaboral</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('puestolaborals.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $puestolaboral->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $puestolaboral->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Espacios:</strong>
                            {{ $puestolaboral->espacios }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
