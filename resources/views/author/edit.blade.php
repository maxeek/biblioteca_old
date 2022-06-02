@extends('layouts.app')

@section('template_title')
    Update Author
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar autor</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('authors.update', $author->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            {{-- @include('author.form') --}}

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


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
