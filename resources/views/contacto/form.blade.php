<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Seleccionar Empleado') }}
            {{ Form::select('empleado_id', $empleadoss, $contacto->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar...']) }}
            {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono_uno') }}
            {{ Form::text('telefono_uno', $contacto->telefono_uno, ['class' => 'form-control' . ($errors->has('telefono_uno') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Uno']) }}
            {!! $errors->first('telefono_uno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono_dos') }}
            {{ Form::text('telefono_dos', $contacto->telefono_dos, ['class' => 'form-control' . ($errors->has('telefono_dos') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Dos']) }}
            {!! $errors->first('telefono_dos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email_uno') }}
            {{ Form::text('email_uno', $contacto->email_uno, ['class' => 'form-control' . ($errors->has('email_uno') ? ' is-invalid' : ''), 'placeholder' => 'Email Uno']) }}
            {!! $errors->first('email_uno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email_dos') }}
            {{ Form::text('email_dos', $contacto->email_dos, ['class' => 'form-control' . ($errors->has('email_dos') ? ' is-invalid' : ''), 'placeholder' => 'Email Dos']) }}
            {!! $errors->first('email_dos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('red social_uno') }}
            {{ Form::text('redsocial_uno', $contacto->redsocial_uno, ['class' => 'form-control' . ($errors->has('redsocial_uno') ? ' is-invalid' : ''), 'placeholder' => 'Redsocial Uno']) }}
            {!! $errors->first('redsocial_uno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('red social_dos') }}
            {{ Form::text('redsocial_dos', $contacto->redsocial_dos, ['class' => 'form-control' . ($errors->has('redsocial_dos') ? ' is-invalid' : ''), 'placeholder' => 'Redsocial Dos']) }}
            {!! $errors->first('redsocial_dos', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</div>