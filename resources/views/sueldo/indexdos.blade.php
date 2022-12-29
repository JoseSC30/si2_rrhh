@extends('adminlte::page')

@section('template_title')
    Sueldo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('SUELDOS') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('sueldos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Empleado</th>
										<th>Monto</th>
										<th>Fecha</th>
										<th>Hora</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sueldos as $sueldo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $sueldo->empleado_id }}</td>
											<td>{{ $sueldo->monto }}</td>
											<td>{{ $sueldo->fecha }}</td>
											<td>{{ $sueldo->hora }}</td>

                                            <td>
                                                <form action="{{ route('sueldos.destroy',$sueldo->id) }}" method="POST">
                                                    
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $sueldos->links() !!}
            </div>
        </div>
    </div>
@endsection
