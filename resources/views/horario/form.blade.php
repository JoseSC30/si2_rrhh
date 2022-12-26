<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('hora inicio') }}
            {{ Form::text('horainicio', $horario->horainicio, ['class' => 'form-control' . ($errors->has('horainicio') ? ' is-invalid' : ''), 'placeholder' => 'Horainicio']) }}
            {!! $errors->first('horainicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora final') }}
            {{ Form::text('horafinal', $horario->horafinal, ['class' => 'form-control' . ($errors->has('horafinal') ? ' is-invalid' : ''), 'placeholder' => 'Horafinal']) }}
            {!! $errors->first('horafinal', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>