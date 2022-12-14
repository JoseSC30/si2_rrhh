<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contratoPDF</title>

    
</head>


<body>
    <h2><center>- Lista de contratos -</center></h2>

    <h4>Recursos Humanos <br> 
    Fecha:{{$fecha}} <br> 
    Hora: {{$hora}} <br>
    </h4>
    <h7>-------------------------------------------------------------------------------------------------------------------------------</h7>
    <h7>-------------------------------------------------------------------------------------------------------------------------------</h7>

    <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>N°</th>
                                        
										<th>REGISTRADO_POR</th>
										<th>EMPLEADO </th>
										
										<th>ESTADO</th>
										<th>TURNO</th>
										<th>FECHA</th>
										<th>HORA</th>
										
                                    </tr>
                                </thead>
                                <tbody>

                                    {{ $i = 0 }}  
                                    @foreach ($contratos as $contrato)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $contrato->user->empleados->nombre}}</td>
											<td>{{ $contrato->empleado->nombre }}</td>
											
											<td>{{ $contrato->estadoContrato->nombre }}</td>
											<td>{{ $contrato->turno->nombre }}</td>
											<td>{{ $contrato->fecha }}</td>
											<td>{{ $contrato->hora }}</td>
											
                                        </tr>
                                    @endforeach
                                </tbody>
    </table>
    <h7>-------------------------------------------------------------------------------------------------------------------------------</h7>

</body>
</html>