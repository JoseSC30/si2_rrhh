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
                            <a class="btn btn-primary" href="{{ route('empleosolicituds.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Puesto al que Postula:</strong>
                            {{ $empleosolicitud->puestolaboral->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre del Postulante:</strong>
                            {{ $empleosolicitud->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Correo Electrónico:</strong>
                            {{ $empleosolicitud->email }}
                        </div>
                        <div class="form-group">
                            <strong>Link del CV:</strong>
                            {{ $empleosolicitud->link_cv }}
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
