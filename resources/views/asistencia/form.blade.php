<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('hora_llegada') }}
            {{ Form::text('hora_llegada', $asistencia->hora_llegada, ['class' => 'form-control' . ($errors->has('hora_llegada') ? ' is-invalid' : ''), 'placeholder' => 'Hora Llegada']) }}
            {!! $errors->first('hora_llegada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_salida') }}
            {{ Form::text('hora_salida', $asistencia->hora_salida, ['class' => 'form-control' . ($errors->has('hora_salida') ? ' is-invalid' : ''), 'placeholder' => 'Hora Salida']) }}
            {!! $errors->first('hora_salida', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $asistencia->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('usuariomovil_id') }}
            {{ Form::select('usuariomovil_id', $usuariomovilss, $asistencia->usuariomovil_id, ['class' => 'form-control' . ($errors->has('usuariomovil_id') ? ' is-invalid' : ''), 'placeholder' => 'Usuariomovil Id']) }}
            {!! $errors->first('usuariomovil_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>