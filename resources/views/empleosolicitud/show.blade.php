@extends('adminlte::page')

@section('template_title')
    {{ $empleosolicitud->name ?? 'Show Empleosolicitud' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">SOLICITUDES DE EMPLEO</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleosolicituds.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Puestolaboral Id:</strong>
                            {{ $empleosolicitud->puestolaboral_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $empleosolicitud->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $empleosolicitud->email }}
                        </div>
                        <div class="form-group">
                            <strong>Link Cv:</strong>
                            <a href="{{$empleosolicitud->link_cv}}" class="card-link" > {{$empleosolicitud->link_cv}}</a>
                        </div>
                        <div class="form-group">
                            <strong>Valoracion:</strong>
                            {{ $empleosolicitud->valoracion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
