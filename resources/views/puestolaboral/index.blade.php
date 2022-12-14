@extends('adminlte::page')

@section('template_title')
    Puestolaboral
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('PUESTO LABORAL') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('puestolaborals.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo Puesto Laboral') }}
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
										<th>Descripcion</th>
										<th>Espacios</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($puestolaborals as $puestolaboral)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $puestolaboral->nombre }}</td>
											<td>{{ $puestolaboral->descripcion }}</td>
											<td>{{ $puestolaboral->espacios }}</td>

                                            <td>
                                                <form action="{{ route('puestolaborals.destroy',$puestolaboral->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('puestolaborals.show',$puestolaboral->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('puestolaborals.edit',$puestolaboral->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $puestolaborals->links() !!}
            </div>
        </div>
    </div>
@endsection
