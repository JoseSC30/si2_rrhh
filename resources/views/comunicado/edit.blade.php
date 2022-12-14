@extends('adminlte::page')

@section('template_title')
    Update Comunicado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualiza el contenido del Comunicado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('comunicados.update', $comunicado->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('comunicado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
