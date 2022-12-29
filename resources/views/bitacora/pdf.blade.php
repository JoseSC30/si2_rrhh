<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bitacoraPDF</title>

    
</head>


<body>
    <h2><center>- Reporte Bitacora RRHH -</center></h2>
    <h4><br> 
    Fecha:{{$fecha}} <br> 
    Hora: {{$hora}} <br>
    </h4>
    <h7>-------------------------------------------------------------------------------------------------------------------------------</h7>
    <h7>-------------------------------------------------------------------------------------------------------------------------------</h7>
    
        <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>N°</th>
                                        
										<th>DETALLE</th>
										<th>HORA</th>
										<th>FECHA</th>
										<th>USUARIO</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                {{ $i = 0 }}                      
                                @foreach (array_reverse(iterator_to_array($bitacoras)) as $bitacora)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $bitacora->detalle }}</td>
											<td>{{ $bitacora->hora }}</td>
											<td>{{ $bitacora->fecha }}</td>
											<td>{{ $bitacora->user->empleados->nombre }}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
        </table>

    <h7>-------------------------------------------------------------------------------------------------------------------------------</h7>
    
</body>
</html>