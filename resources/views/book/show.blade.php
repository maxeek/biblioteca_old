@extends('layouts.app')

@section('template_title')
    {{ $book->name ?? 'Show Book' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar libro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('books.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Autor:</strong>
                            {{ $book->author->name }} {{ $book->author->surname }}
                        </div>
                        <div class="form-group">
                            <strong>Inventario:</strong>
                            {{ $book->inventory }}
                        </div>
                        <div class="form-group">
                            <strong>Otros autores:</strong>
                            {{ $book->others_auth }}
                        </div>
                        <div class="form-group">
                            <strong>Título:</strong>
                            {{ $book->title }}
                        </div>
                        <div class="form-group">
                            <strong>Edición:</strong>
                            {{ $book->edition }}
                        </div>
                        <div class="form-group">
                            <strong>País:</strong>
                            {{ $book->land }}
                        </div>
                        <div class="form-group">
                            <strong>Editorial:</strong>
                            {{ $book->editorial }}
                        </div>
                        <div class="form-group">
                            <strong>Año:</strong>
                            {{ $book->year }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $book->description }}
                        </div>
                        <div class="form-group">
                            <strong>Categoría:</strong>
                            {{ $book->categ->name }}
                        </div>
                        <div class="form-group">
                            <strong>Etiquetas:</strong>
                            {{ $book->tags }}
                        </div>
                        <div class="form-group">
                            <strong>Observación:</strong>
                            {{ $book->observation }}
                        </div>
                        <div class="form-group">

                            <strong>Condición:</strong>

                            @if ($book->condition == 1)
                                <td>Disponible</td>
                            @else
                                <td>Prestado</td>
                            @endif


                        </div>
                        <div class="form-group">
                            <strong>Signatura Top:</strong>
                            {{ $book->signatura_top }}
                        </div>
                        {{-- <div class="form-group">
                            <strong>Categoría o materia:</strong>
                            {{ $book->categ_r->category_id }}
                        </div> --}}


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
