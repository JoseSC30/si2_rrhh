@extends('adminlte::page')

@section('template_title')
    Empleado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('LISTA DE EMPLEADOS') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('empleados.pdf') }}" class="btn btn-primary btn-sm "  data-placement="left">
                                  {{ __('Generar reporte') }}
                                </a>
&nbsp;
                                <a href="{{ route('empleados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Registar Nuevo Empleado') }}
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
										
										<th>NOMBRE</th>

										<th>CI</th>	

                                        <th>PUESTO LABORAL</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $empleado->nombre }}</td>
											<td>{{ $empleado->ci }}</td>
                                            <td>{{ $empleado->puestolaboral->nombre }}</td>

                                            <td>
                                                <form action="{{ route('empleados.destroy',$empleado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empleados.show',$empleado->id) }}"><i class="fa fa-fw fa-eye"></i> Más Información</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empleados.edit',$empleado->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $empleados->links() !!}
            </div>
        </div>
    </div>
@endsection


