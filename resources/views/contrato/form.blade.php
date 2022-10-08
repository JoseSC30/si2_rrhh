<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('Registrado por') }}
                {{ Form::text('usuario_id', $contrato->usuario_id, ['class' => 'form-control' . ($errors->has('usuario_id') ? ' is-invalid' : ''), 'Value' => Auth::user()->empleados->id, 'readonly']) }}
                {!! $errors->first('usuario_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            </div>

            <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('fecha') }}
                {{ Form::text('fecha', $contrato->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'Value' => $fecha, 'readonly']) }}
                {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            </div>

            <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('hora') }}
               {{ Form::text('hora', $contrato->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'Value' => $hora, 'readonly']) }}
               {!! $errors->first('hora', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            </div>
        </div>

        

        <div class="row">
            <div class="col-md-7">
            <div class="form-group">
                {{ Form::label('empleado') }}
                {{ Form::select('empleado_id',$empl, $contrato->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => 'Empleado ']) }}
                {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            </div>

            <div class="col-md-5">
            <div class="form-group">
                {{ Form::label('tipoContrato') }}
                {{ Form::select('tipoContrato_id',$tcon, $contrato->tipoContrato_id, ['class' => 'form-control' . ($errors->has('tipoContrato_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipocontrato ']) }}
                {!! $errors->first('tipoContrato_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('estadoContrato') }}
                {{ Form::select('estadoContrato_id',$econ, $contrato->estadoContrato_id, ['class' => 'form-control' . ($errors->has('estadoContrato_id') ? ' is-invalid' : ''), 'placeholder' => 'Estadocontrato ']) }}
                {!! $errors->first('estadoContrato_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            </div>

            <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('turno') }}
                {{ Form::select('turno_id',$tur, $contrato->turno_id, ['class' => 'form-control' . ($errors->has('turno_id') ? ' is-invalid' : ''), 'placeholder' => 'Turno']) }}
                {!! $errors->first('turno_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('latitud') }}
                {{ Form::text('latitud', $contrato->latitud, ['class' => 'form-control' . ($errors->has('latitud') ? ' is-invalid' : ''), 'placeholder' => 'Latitud']) }}
                {!! $errors->first('latitud', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('longitud') }}
                {{ Form::text('longitud', $contrato->longitud, ['class' => 'form-control' . ($errors->has('longitud') ? ' is-invalid' : ''), 'placeholder' => 'Longitud']) }}
                {!! $errors->first('longitud', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            </div>
        </div>    

        <!-- Mapa -->
        <div class="card">
            <div class="row">
                    <div class="col-md-12">
                        <div id="mapa" style="width 100%; height: 400px"></div>
                    </div>
            </div>

            <script>
            
                function iniciarMapa(){
                    var latitud = -17.789218;
                    var longitud = -63.186886;
                    coordenadas ={
                        lng: longitud,
                        lat: latitud
                    }
                    generarMapa(coordenadas);
                } 
                
                function generarMapa(coordenadas){
                    var mapa = new google.maps.Map(document.getElementById('mapa'),
                    {
                        zoom : 12,
                        center:new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
                    });    
                    marcador = new google.maps.Marker({
                        map: mapa,
                        draggable: true,
                        position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
                    });
                    marcador.addListener('dragend',function(event){
                        document.getElementById("latitud").value = this.getPosition().lat();
                        document.getElementById("longitud").value = this.getPosition().lng();
                    })
                        
                }
                
            </script> 
        </div>           

        <script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapa"></script>



    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>