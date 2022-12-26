<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>empleadoPDF</title>

    
</head>


<body>
    <h2><center>- Reporte:Lista de empleados RRHH -</center></h2>
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
                                        
										<th>NOMBRE</th>
										<th>CI</th>
										<th>FECHA NACIMIENTO</th>
										<th>SEXO</th>
										<th>DIRECCION</th>
                                        <th>PUESTO LABORAL</th>
                                        <!-- 
										<th>USUARIO MOVIL</th>
                                        -->

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                {{ $i = 0 }}                      
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $empleado->nombre }}</td>
											<td>{{ $empleado->ci }}</td>
											<td>{{ $empleado->fnacimiento }}</td>
											<td>{{ $empleado->sexo }}</td>
											<td>{{ $empleado->direccion }}</td>
                                            <td>{{ $empleado->puestolaboral->nombre}}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
        </table>

    <h7>-------------------------------------------------------------------------------------------------------------------------------</h7>
    
</body>
</html>