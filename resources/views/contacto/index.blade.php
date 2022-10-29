@extends('adminlte::page')

@section('template_title')
    Contacto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Contacto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('contactos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo Contacto') }}
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
                                        
										<th>EMPLEADO Id</th>
										<th>TELEFONO UNO</th>
										<th>TELEFONO DOS</th>
										<th>EMAIL UNO</th>
										<th>EMAIL DOS</th>
										<th>REDSOCIAL UNO</th>
										<th>REDSOCIAL DOS</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contactos as $contacto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $contacto->empleado_id }}</td>
											<td>{{ $contacto->telefono_uno }}</td>
											<td>{{ $contacto->telefono_dos }}</td>
											<td>{{ $contacto->email_uno }}</td>
											<td>{{ $contacto->email_dos }}</td>
											<td>{{ $contacto->redsocial_uno }}</td>
											<td>{{ $contacto->redsocial_dos }}</td>

                                            <td>
                                                <form action="{{ route('contactos.destroy',$contacto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('contactos.show',$contacto->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('contactos.edit',$contacto->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $contactos->links() !!}
            </div>
        </div>
    </div>
@endsection
