@extends('adminlte::page')

@section('template_title')
    Recursoasignado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Aquí se habilitaran los recursos y beneficios para los empleados.') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('recursoasignados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Asignar Nuevo Recurso') }}
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
                                        
										<th>RECURSO</th>
										<th>PUESTO LABORAL</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recursoasignados as $recursoasignado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $recursoasignado->recurso->nombre}}</td>
											<td>{{ $recursoasignado->puestolaboral->nombre }}</td>

                                            <td>
                                                <form action="{{ route('recursoasignados.destroy',$recursoasignado->id) }}" method="POST">
                                                    <!-- <a class="btn btn-sm btn-primary " href="{{ route('recursoasignados.show',$recursoasignado->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a> -->
                                                    <a class="btn btn-sm btn-success" href="{{ route('recursoasignados.edit',$recursoasignado->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $recursoasignados->links() !!}
            </div>
        </div>
    </div>
@endsection
