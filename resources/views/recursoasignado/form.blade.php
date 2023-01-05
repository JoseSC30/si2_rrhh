<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('elegir recurso') }}
            {{ Form::select('recurso_id', $recursoss, $recursoasignado->recurso_id, ['class' => 'form-control' . ($errors->has('recurso_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar...']) }}
            {!! $errors->first('recurso_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('elegir puesto laboral para asignar el recurso') }}
            {{ Form::select('puestolaboral_id', $puestolaboralss, $recursoasignado->puestolaboral_id, ['class' => 'form-control' . ($errors->has('puestolaboral_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar...']) }}
            {!! $errors->first('puestolaboral_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>