@extends('adminlte::page')

@section('template_title')
    Contrato
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('CONTRATOS') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('contratos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo Contrato') }}
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
                                        
										<th>REGISTRADO POR</th>
										<th>EMPLEADO </th>
										
										<th>ESTADO CONTRATO</th>
										<th>TURNO</th>
										<th>FECHA</th>
										<th>HORA</th>
										

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contratos as $contrato)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $contrato->user->empleados->nombre}}</td>
											<td>{{ $contrato->empleado->nombre }}</td>
											
											<td>{{ $contrato->estadoContrato->nombre }}</td>
											<td>{{ $contrato->turno->nombre }}</td>
											<td>{{ $contrato->fecha }}</td>
											<td>{{ $contrato->hora }}</td>
											

                                            <td>
                                                <form action="{{ route('contratos.destroy',$contrato->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('contratos.show',$contrato->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('contratos.edit',$contrato->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $contratos->links() !!}
            </div>
        </div>
    </div>
@endsection
