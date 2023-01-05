@extends('adminlte::page')

@section('template_title')
    Turno
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('TURNOS') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('turnos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo Turno') }}
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
										<th>HORA INCIO</th>
                                        <th>HORA FINAL</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($turnos as $turno)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $turno->nombre }}</td>
											<td>{{ $turno->horario->horainicio}}</td>
                                            <td>{{ $turno->horario->horafinal}}</td>
                                            
                                            <td>
                                                <form action="{{ route('turnos.destroy',$turno->id) }}" method="POST">
                                                    <!-- <a class="btn btn-sm btn-primary " href="{{ route('turnos.show',$turno->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a> -->
                                                    <!-- <a class="btn btn-sm btn-success" href="{{ route('turnos.edit',$turno->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a> -->
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
                {!! $turnos->links() !!}
            </div>
        </div>
    </div>
@endsection
