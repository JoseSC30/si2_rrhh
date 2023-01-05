@extends('adminlte::page')

@section('template_title')
    Create Comunicado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crea un nuevo Comunicado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('comunicados.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('comunicado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
