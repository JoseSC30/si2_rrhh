@extends('adminlte::page')

@section('template_title')
    {{ $contacto->name ?? 'Show Contacto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">INFORMACION DE CONTACTO DEL EMPLEADO</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('contactos.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre del Empleado:</strong>
                            {{ $contacto->empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono Uno:</strong>
                            {{ $contacto->telefono_uno }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono Dos:</strong>
                            {{ $contacto->telefono_dos }}
                        </div>
                        <div class="form-group">
                            <strong>Email Uno:</strong>
                            {{ $contacto->email_uno }}
                        </div>
                        <div class="form-group">
                            <strong>Email Dos:</strong>
                            {{ $contacto->email_dos }}
                        </div>
                        <div class="form-group">
                            <strong>Redsocial Uno:</strong>
                            {{ $contacto->redsocial_uno }}
                        </div>
                        <div class="form-group">
                            <strong>Redsocial Dos:</strong>
                            {{ $contacto->redsocial_dos }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
