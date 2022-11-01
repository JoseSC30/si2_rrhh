@extends('adminlte::page')

@section('template_title')
    Asistencia
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('REGISTRO DE ASISTENCIAS') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('asistencias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Marcar Hora') }}
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
                                        
                                        <th>USUARIO MOVIL</th>
                                        <th>FECHA</th>
										<th>HORA LLEGADA</th>
										<th>HORA SALIDA</th>										

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asistencias as $asistencia)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $asistencia->usuariomovil->usuario }}</td>
                                            <td>{{ $asistencia->fecha }}</td>
											<td>{{ $asistencia->hora_llegada }}</td>
											<td>{{ $asistencia->hora_salida }}</td>

                                            <td>
                                                <form action="{{ route('asistencias.destroy',$asistencia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('asistencias.show',$asistencia->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('asistencias.edit',$asistencia->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $asistencias->links() !!}
            </div>
        </div>
    </div>
@endsection
