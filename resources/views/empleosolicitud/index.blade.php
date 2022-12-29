@extends('adminlte::page')

@section('template_title')
    SOLICITUDES DE EMPLEO
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('SOLICITUDES DE EMPLEO') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('empleosolicituds.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>PUESTO POSTULADO</th>
										<th>NOMBRE</th>
										<th>VALORACION</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleosolicituds as $empleosolicitud)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $empleosolicitud->puestolaboral_id }}</td>
											<td>{{ $empleosolicitud->nombre }}</td>
											<td>{{ $empleosolicitud->valoracion }}</td>

                                            <td>
                                                <form action="{{ route('empleosolicituds.destroy',$empleosolicitud->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empleosolicituds.show',$empleosolicitud->id) }}"><i class="fa fa-fw fa-eye"></i> VER CV</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empleosolicituds.edit',$empleosolicitud->id) }}"><i class="fa fa-fw fa-edit"></i> AÑADIR VALORACION</a>
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
                {!! $empleosolicituds->links() !!}
            </div>
        </div>
    </div>
@endsection
