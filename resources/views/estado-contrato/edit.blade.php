@extends('adminlte::page')

@section('template_title')
    Update Estado Contrato
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Estado Contrato</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('estado-contratos.update', $estadoContrato->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('estado-contrato.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
