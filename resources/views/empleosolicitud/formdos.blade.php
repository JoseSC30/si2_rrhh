<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('    Elige el puesto al que pretendes postular') }}
            {{ Form::select('puestolaboral_id', $puestolaboralss , $empleosolicitud->puestolaboral_id, ['class' => 'form-control' . ($errors->has('puestolaboral_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar..']) }}
            {!! $errors->first('puestolaboral_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre completo') }}
            {{ Form::text('nombre', $empleosolicitud->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => '...']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('correo electrónico principal') }}
            {{ Form::text('email', $empleosolicitud->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => '...']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('link de tu CV') }}
            {{ Form::text('link_cv', $empleosolicitud->link_cv, ['class' => 'form-control' . ($errors->has('link_cv') ? ' is-invalid' : ''), 'placeholder' => '...']) }}
            {!! $errors->first('link_cv', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>