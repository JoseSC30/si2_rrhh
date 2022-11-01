@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('¡BIENVENIDO A LA PLATAFORMA PARA LA GESTION DE RECURSOS HUMANOS!') }}</div>

                <div class="card-body">
                    @if (session('status'))7
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Puedes iniciar con tus operaciones.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

