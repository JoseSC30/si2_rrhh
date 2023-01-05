@extends('adminlte::page')

@section('template_title')
    Create Sueldo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Ingrese los datos necesarios para registrar el sueldo.</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sueldos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('sueldo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
