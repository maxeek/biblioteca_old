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

                                    {{-- <div class="form-group">
                                        {{ Form::label('Autor') }}
                                        {{ Form::text('author_id', $book->author_id, ['class' => 'form-control' . ($errors->has('author_id') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese autor']) }}
                                        {!! $errors->first('author_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div> --}}

                                    <div class="form-group">
                                        {{ Form::label('Autor') }}
                                        <select name="author_id" id="author_id" class="form-group">

                                            @for ($i = 0; $i < count($authors); $i++)
                                                <option value={{ $authors[$i]->id }}>{{ $authors[$i]->surname }}
                                                    {{ $authors[$i]->name }} </option>
                                            @endfor




                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Categoría') }}
                                        <select name="category_id" id="category_id" class="form-group">

                                            @for ($i = 0; $i < count($categories); $i++)
                                                <option value={{ $categories[$i]->id }}>{{ $categories[$i]->name }}
                                                </option>
                                            @endfor




                                        </select>
                                    </div>



                                    <div class="form-group">
                                        {{ Form::label('Inventario') }}
                                        {{ Form::text('inventory', $book->inventory, ['class' => 'form-control' . ($errors->has('inventory') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese N° de inventario']) }}
                                        {!! $errors->first('inventory', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Otros autores') }}
                                        {{ Form::text('others_auth', $book->others_auth, ['class' => 'form-control' . ($errors->has('others_auth') ? ' is-invalid' : ''), 'placeholder' => 'Otros autores']) }}
                                        {!! $errors->first('others_auth', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Título') }}
                                        {{ Form::text('title', $book->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese título']) }}
                                        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Edición') }}
                                        {{ Form::text('edition', $book->edition, ['class' => 'form-control' . ($errors->has('edition') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese edición']) }}
                                        {!! $errors->first('edition', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('País') }}
                                        {{ Form::text('land', $book->land, ['class' => 'form-control' . ($errors->has('land') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese país']) }}
                                        {!! $errors->first('land', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Editorial') }}
                                        {{ Form::text('editorial', $book->editorial, ['class' => 'form-control' . ($errors->has('editorial') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese editorial']) }}
                                        {!! $errors->first('editorial', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Año') }}
                                        {{ Form::text('year', $book->year, ['class' => 'form-control' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese año']) }}
                                        {!! $errors->first('year', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Descripción') }}
                                        {{ Form::text('description', $book->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese description']) }}
                                        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('Etiquetas') }}
                                        {{ Form::text('tags', $book->tags, ['class' => 'form-control' . ($errors->has('tags') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese etiquetas']) }}
                                        {!! $errors->first('tags', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Observación') }}
                                        {{ Form::text('observation', $book->observation, ['class' => 'form-control' . ($errors->has('observation') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese observación']) }}
                                        {!! $errors->first('observation', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    {{-- <div class="form-group">
                                        {{ Form::label('condition') }}
                                        {{ Form::text('condition', $book->condition, ['class' => 'form-control' . ($errors->has('condition') ? ' is-invalid' : ''), 'placeholder' => 'Condition']) }}
                                        {!! $errors->first('condition', '<div class="invalid-feedback">:message</div>') !!}
                                    </div> --}}
                                    <div class="form-group">
                                        {{ Form::label('Signatura topográfica') }}
                                        {{ Form::text('signatura_top', $book->signatura_top, ['class' => 'form-control' . ($errors->has('signatura_top') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese signatura topográfica']) }}
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
