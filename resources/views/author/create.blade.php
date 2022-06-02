@extends('layouts.app')

@section('template_title')
    Crear autor
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Author</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('authors.store') }}"  role="form" enctype="multipart/form-data">
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
        <button type="submit" class="btn btn-primary">Agregar</button>
    </div>
</div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
