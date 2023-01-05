@extends('adminlte::page')

@section('template_title')
    Estado Contrato
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('ESTADO CONTRATO') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('estado-contratos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo Estado Contrato') }}
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
                                        
										<th>NOMBRE DEL ESTADO</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estadoContratos as $estadoContrato)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $estadoContrato->nombre }}</td>

                                            <td>
                                                <form action="{{ route('estado-contratos.destroy',$estadoContrato->id) }}" method="POST">
                                                    <!-- <a class="btn btn-sm btn-primary " href="{{ route('estado-contratos.show',$estadoContrato->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('estado-contratos.edit',$estadoContrato->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a> -->
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
                {!! $estadoContratos->links() !!}
            </div>
        </div>
    </div>
@endsection
