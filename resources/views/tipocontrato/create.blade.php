@extends('adminlte::page')

@section('template_title')
    Create Tipocontrato
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear un nuevo tipo de contrato</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipocontratos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tipocontrato.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
