<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>planillasueldoPDF</title>

    
</head>


<body>
    <h2><center>- Reporte de planillas de sueldos -</center></h2>

    <h4> Recursos Humanos <br> 
    Fecha:{{$fecha}} <br> 
    Hora: {{$hora}} </h4>
    <h7>-------------------------------------------------------------------------------------------------------------------------------</h7>
    <h7>-------------------------------------------------------------------------------------------------------------------------------</h7>

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

                                    {{ $i = 0 }}  
                                    @foreach ($planillasueldos as $planillasueldo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $planillasueldo->empleado->nombre }}</td>
											<td>{{ $planillasueldo->monto }}</td>
											<td>{{ $planillasueldo->hora }}</td>
											<td>{{ $planillasueldo->fecha }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
    </table>
    <h7>-------------------------------------------------------------------------------------------------------------------------------</h7>

</body>
</html>