<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('puesto laboral') }}
            {{ Form::text('puestolaboral_id', $empleosolicitud->puestolaboral_id, ['class' => 'form-control' . ($errors->has('puestolaboral_id') ? ' is-invalid' : ''), 'placeholder' => 'Puestolaboral Id']) }}
            {!! $errors->first('puestolaboral_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre completo') }}
            {{ Form::text('nombre', $empleosolicitud->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('correo electrónico') }}
            {{ Form::text('email', $empleosolicitud->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('link del CV') }}
            {{ Form::text('link_cv', $empleosolicitud->link_cv, ['class' => 'form-control' . ($errors->has('link_cv') ? ' is-invalid' : ''), 'placeholder' => 'Link Cv']) }}
            {!! $errors->first('link_cv', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('valoracion') }}
            {{ Form::text('valoracion', $empleosolicitud->valoracion, ['class' => 'form-control' . ($errors->has('valoracion') ? ' is-invalid' : ''), 'placeholder' => 'Valoracion']) }}
            {!! $errors->first('valoracion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</div>