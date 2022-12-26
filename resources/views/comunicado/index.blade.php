@extends('adminlte::page')

@section('template_title')
    Comunicado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Comunicado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('comunicados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
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
                                        
										<th>AUTOR</th>
										<th>TITULO DEL COMUNICADO</th>
										<th>FECHA</th>
										<th>HORA</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comunicados as $comunicado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $comunicado->usuario->empleados->nombre }}</td>
											<td>{{ $comunicado->titulo }}</td>
											<td>{{ $comunicado->fecha }}</td>
											<td>{{ $comunicado->hora }}</td>

                                            <td>
                                                <form action="{{ route('comunicados.destroy',$comunicado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('comunicados.show',$comunicado->id) }}"><i class="fa fa-fw fa-eye"></i> Más Información</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('comunicados.edit',$comunicado->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $comunicados->links() !!}
            </div>
        </div>
    </div>
@endsection
