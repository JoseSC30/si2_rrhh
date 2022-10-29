<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('usuario') }}
            {{ Form::text('usuario', $usuariomovil->usuario, ['class' => 'form-control' . ($errors->has('usuario') ? ' is-invalid' : ''), 'placeholder' => 'Usuario']) }}
            {!! $errors->first('usuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contrasena') }}
            {{ Form::text('contrasena', $usuariomovil->contrasena, ['class' => 'form-control' . ($errors->has('contrasena') ? ' is-invalid' : ''), 'placeholder' => 'Contrasena']) }}
            {!! $errors->first('contrasena', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>