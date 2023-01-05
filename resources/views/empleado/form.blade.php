<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('elegir puesto laboral') }}
            {{ Form::select('puestolaboral_id', $puestolaboralss, $empleado->puestolaboral_id, ['class' => 'form-control' . ($errors->has('puestolaboral_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar...']) }}
            {!! $errors->first('puestolaboral_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('elegir usuario movil') }}
            {{ Form::select('usuariomovil_id', $usuariomovilss, $empleado->usuariomovil_id, ['class' => 'form-control' . ($errors->has('usuariomovil_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar...']) }}
            {!! $errors->first('usuariomovil_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre completo') }}
            {{ Form::text('nombre', $empleado->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => '...']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Numero de carnet') }}
            {{ Form::text('ci', $empleado->ci, ['class' => 'form-control' . ($errors->has('ci') ? ' is-invalid' : ''), 'placeholder' => '...']) }}
            {!! $errors->first('ci', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha de nacimiento') }}
            {{ Form::text('fnacimiento', $empleado->fnacimiento, ['class' => 'form-control' . ($errors->has('fnacimiento') ? ' is-invalid' : ''), 'placeholder' => '...']) }}
            {!! $errors->first('fnacimiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sexo') }}
            {{ Form::text('sexo', $empleado->sexo, ['class' => 'form-control' . ($errors->has('sexo') ? ' is-invalid' : ''), 'placeholder' => 'Sexo']) }}
            {!! $errors->first('sexo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion domiciliar') }}
            {{ Form::text('direccion', $empleado->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => '...']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>