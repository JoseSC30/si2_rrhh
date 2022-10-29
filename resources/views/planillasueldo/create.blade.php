@extends('adminlte::page')

@section('template_title')
    Create Planillasueldo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Planilla-Sueldos</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('planillasueldos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('planillasueldo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
