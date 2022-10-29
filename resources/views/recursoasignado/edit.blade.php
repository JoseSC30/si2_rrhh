@extends('adminlte::page')

@section('template_title')
    Update Recursoasignado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Recursoasignado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('recursoasignados.update', $recursoasignado->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('recursoasignado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
