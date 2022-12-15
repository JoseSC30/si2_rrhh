<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_recurso') }}
            {{ Form::select('recurso_id', $recursoss, $recursoasignado->recurso_id, ['class' => 'form-control' . ($errors->has('recurso_id') ? ' is-invalid' : ''), 'placeholder' => 'Recurso Id']) }}
            {!! $errors->first('recurso_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_puestolaboral') }}
            {{ Form::select('puestolaboral_id', $puestolaboralss, $recursoasignado->puestolaboral_id, ['class' => 'form-control' . ($errors->has('puestolaboral_id') ? ' is-invalid' : ''), 'placeholder' => 'Puestolaboral Id']) }}
            {!! $errors->first('puestolaboral_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>