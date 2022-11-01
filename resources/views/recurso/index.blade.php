@extends('adminlte::page')

@section('template_title')
    Recurso
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('RECURSO PARA LOS EMPLEADOS') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('recursos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre</th>
										<th>Detalle</th>
										<th>Fecha Inicio</th>
										<th>Fecha Final</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recursos as $recurso)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $recurso->nombre }}</td>
											<td>{{ $recurso->detalle }}</td>
											<td>{{ $recurso->fecha_inicio }}</td>
											<td>{{ $recurso->fecha_final }}</td>

                                            <td>
                                                <form action="{{ route('recursos.destroy',$recurso->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('recursos.show',$recurso->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('recursos.edit',$recurso->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $recursos->links() !!}
            </div>
        </div>
    </div>
@endsection
