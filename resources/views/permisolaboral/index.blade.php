@extends('adminlte::page')

@section('template_title')
    Permisolaboral
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('REGISTRO DE LOS PERMISOS') }}
                            </span>

                             <!-- <div class="float-right">
                                <a href="{{ route('permisolaborals.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo Permiso') }}
                                </a>
                              </div> -->
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
                                        
										<th>EMPLEADO</th>
										<th>FECHA</th>
										<th>HORA</th>
										<th>DETALLE DEL PERMISO</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permisolaborals as $permisolaboral)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $permisolaboral->empleado->nombre }}</td>
											<td>{{ $permisolaboral->fecha }}</td>
											<td>{{ $permisolaboral->hora }}</td>
											<td>{{ $permisolaboral->detalle }}</td>

                                            <td>
                                                <form action="{{ route('permisolaborals.destroy',$permisolaboral->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('permisolaborals.show',$permisolaboral->id) }}"><i class="fa fa-fw fa-eye"></i> Más Información</a>
                                                    <!-- <a class="btn btn-sm btn-success" href="{{ route('permisolaborals.edit',$permisolaboral->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a> -->
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button> -->
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $permisolaborals->links() !!}
            </div>
        </div>
    </div>
@endsection
