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
                                {{ __('Lista de sueldo de los empleados') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('sueldos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Registrar Nuevo Sueldo') }}
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
                                            
											<td>{{ $sueldo->empleado->nombre }}</td>
											<td>{{ $sueldo->monto }} bs.</td>
											<td>{{ $sueldo->fecha }}</td>
											<td>{{ $sueldo->hora }}</td>

                                            <td>
                                                <form action="{{ route('sueldos.destroy',$sueldo->id) }}" method="POST">
                                                    <!-- <a class="btn btn-sm btn-primary " href="{{ route('sueldos.show',$sueldo->id) }}"><i class="fa fa-fw fa-eye"></i> Más Información</a> -->
                                                    <a class="btn btn-sm btn-success" href="{{ route('sueldos.edit',$sueldo->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
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
