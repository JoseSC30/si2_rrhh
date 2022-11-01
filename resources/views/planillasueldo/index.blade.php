@extends('adminlte::page')

@section('template_title')
    Planilla-Sueldo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('PLANILLA DE SUELDOS') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('planillasueldos.pdf') }}" class="btn btn-primary btn-sm "  data-placement="left">
                                  {{ __('Generar reporte') }}
                                </a>
&nbsp;
                                <a href="{{ route('planillasueldos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva Planilla') }}
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
                                        
										<th>EMPLEADO</th>
										<th>MONTO</th>
										<th>HORA</th>
										<th>FECHA</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($planillasueldos as $planillasueldo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $planillasueldo->empleado->nombre }}</td>
											<td>{{ $planillasueldo->monto }}</td>
											<td>{{ $planillasueldo->hora }}</td>
											<td>{{ $planillasueldo->fecha }}</td>

                                            <td>
                                                <form action="{{ route('planillasueldos.destroy',$planillasueldo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('planillasueldos.show',$planillasueldo->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('planillasueldos.edit',$planillasueldo->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $planillasueldos->links() !!}
            </div>
        </div>
    </div>
@endsection
