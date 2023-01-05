@extends('adminlte::page')

@section('template_title')
    Tipocontrato
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('TIPOS DE CONTRATOS') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tipocontratos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Definir Nuevo Tipo de Contrato') }}
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
										<th>DESCRIPCIÓN</th>
										<th>DURACIÓN</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipocontratos as $tipocontrato)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tipocontrato->nombre }}</td>
											<td>{{ $tipocontrato->descripcion }}</td>
											<td>{{ $tipocontrato->duracion }}</td>

                                            <td>
                                                <form action="{{ route('tipocontratos.destroy',$tipocontrato->id) }}" method="POST">
                                                    <!-- <a class="btn btn-sm btn-primary " href="{{ route('tipocontratos.show',$tipocontrato->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a> -->
                                                    <a class="btn btn-sm btn-success" href="{{ route('tipocontratos.edit',$tipocontrato->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $tipocontratos->links() !!}
            </div>
        </div>
    </div>
@endsection
