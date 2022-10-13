@extends('adminlte::page')

@section('template_title')
    {{ $turno->name ?? 'Show Turno' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Turno</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('turnos.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $turno->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Horario inicio :</strong>
                            {{ $turno->horario->horainicio }}
                        </div>

                        <div class="form-group">
                            <strong>Horario final:</strong>
                            {{ $turno->horario->horafinal }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
