<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_book') }}
            {{ Form::text('id_book', $userBook->id_book, ['class' => 'form-control' . ($errors->has('id_book') ? ' is-invalid' : ''), 'placeholder' => 'Id Book']) }}
            {!! $errors->first('id_book', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_category') }}
            {{ Form::text('id_category', $userBook->id_category, ['class' => 'form-control' . ($errors->has('id_category') ? ' is-invalid' : ''), 'placeholder' => 'Id Category']) }}
            {!! $errors->first('id_category', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>