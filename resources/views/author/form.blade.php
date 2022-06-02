<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Apellido') }}
            {{ Form::text('surname', $author->surname, ['class' => 'form-control' . ($errors->has('surname') ? ' is-invalid' : ''), 'placeholder' => 'Apellido']) }}
            {!! $errors->first('surname', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $author->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>
</div>
