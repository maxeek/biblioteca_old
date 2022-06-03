@extends('layouts.app')

@section('template_title')
    Agregar Book
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Agregar libro</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('books.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            {{-- @include('book.form') --}}


                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        {{ Form::label('author_id') }}
                                        {{ Form::text('author_id', $book->author_id, ['class' => 'form-control' . ($errors->has('author_id') ? ' is-invalid' : ''), 'placeholder' => 'author_id']) }}
                                        {!! $errors->first('author_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('inventory') }}
                                        {{ Form::text('inventory', $book->inventory, ['class' => 'form-control' . ($errors->has('inventory') ? ' is-invalid' : ''), 'placeholder' => 'Inventory']) }}
                                        {!! $errors->first('inventory', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('others_auth') }}
                                        {{ Form::text('others_auth', $book->others_auth, ['class' => 'form-control' . ($errors->has('others_auth') ? ' is-invalid' : ''), 'placeholder' => 'Others Auth']) }}
                                        {!! $errors->first('others_auth', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('title') }}
                                        {{ Form::text('title', $book->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
                                        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('edition') }}
                                        {{ Form::text('edition', $book->edition, ['class' => 'form-control' . ($errors->has('edition') ? ' is-invalid' : ''), 'placeholder' => 'Edition']) }}
                                        {!! $errors->first('edition', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('land') }}
                                        {{ Form::text('land', $book->land, ['class' => 'form-control' . ($errors->has('land') ? ' is-invalid' : ''), 'placeholder' => 'Land']) }}
                                        {!! $errors->first('land', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('editorial') }}
                                        {{ Form::text('editorial', $book->editorial, ['class' => 'form-control' . ($errors->has('editorial') ? ' is-invalid' : ''), 'placeholder' => 'Editorial']) }}
                                        {!! $errors->first('editorial', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('year') }}
                                        {{ Form::text('year', $book->year, ['class' => 'form-control' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Year']) }}
                                        {!! $errors->first('year', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('description') }}
                                        {{ Form::text('description', $book->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
                                        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('tags') }}
                                        {{ Form::text('tags', $book->tags, ['class' => 'form-control' . ($errors->has('tags') ? ' is-invalid' : ''), 'placeholder' => 'Tags']) }}
                                        {!! $errors->first('tags', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('observation') }}
                                        {{ Form::text('observation', $book->observation, ['class' => 'form-control' . ($errors->has('observation') ? ' is-invalid' : ''), 'placeholder' => 'Observation']) }}
                                        {!! $errors->first('observation', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('condition') }}
                                        {{ Form::text('condition', $book->condition, ['class' => 'form-control' . ($errors->has('condition') ? ' is-invalid' : ''), 'placeholder' => 'Condition']) }}
                                        {!! $errors->first('condition', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('signatura_top') }}
                                        {{ Form::text('signatura_top', $book->signatura_top, ['class' => 'form-control' . ($errors->has('signatura_top') ? ' is-invalid' : ''), 'placeholder' => 'Signatura Top']) }}
                                        {!! $errors->first('signatura_top', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Agregar libro</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
