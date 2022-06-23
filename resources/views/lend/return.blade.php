@extends('layouts.app')

@section('template_title')
    {{ $book->name ?? 'Show Book' }}
@endsection

@section('content')
    <section class="content container-fluid">

        {{-- {{ route('books.lends', $book->id) }} --}}
        <form method="POST" action="{{ route('lends.update', $book->id) }}" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            <div class="row">
                <div class="col-md-12 p-4">
                    <div class="card ">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title">Devolver libro</span>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('books.index') }}"> Atrás</a>
                            </div>
                        </div>

                        <div class="card-body border border-danger rounded">

                            <h1 class="text-uppercase text-center"> {{ $book->title }}</h1>

                            {{-- >>>>>Variable: {{ $encontrado }} --}}



                            <p class="font-weight-bold">  Libro prestado a <span class="text-danger">{{ $datoslease->lector->name }} {{ $datoslease->lector->surname }}</span></p>


                            <br>
                            <br>
                            <div class="form-group">


                                <table style="width:100%">

                                    <tr>
                                        <td style="width:5%"><strong>Autor:</strong></td>
                                        <td style="width:25%"> {{ $book->author->name }} {{ $book->author->surname }}
                                            </th>
                                        <td style="width:5%"><strong>Inventario:</strong></td>
                                        <td style="width:12%">
                                            {{ $book->inventory }}</td>
                                        <td style="width:5%"><strong>Categoría:</strong>
                                        </td>
                                        <td style="width:12%">{{ $book->categ->name }}</td>
                                        <td style="width:5%"><strong>Edición:</strong></td>
                                        <td>{{ $book->edition }}</td>
                                        <td style="width:5%"><strong>Condición:</strong></td>


                                        @if ($book->condition == 1)
                                            <td>Disponible</td>
                                        @else
                                            <td>Prestado</td>
                                        @endif
                                        </td>
                                    </tr>



                                </table>
                                <br>
                                <br>
                                <table>
                                    <tr>


                                        <td style="width:5%"><strong>País:</strong>
                                        </td>
                                        <td style="width:15%">{{ $book->land }}</td>

                                        <td style="width:5%"><strong>Año:</strong>
                                        </td>
                                        <td style="width:10%">{{ $book->year }}</td>
                                        <td style="width:15%"><strong>Signatura Top:</strong></td>
                                        <td> {{ $book->signatura_top }}</td>
                                        <td style="width:45%"> <input value=1 type="hidden" name="condition" id="condition">
                                            <button class="btn btn-outline-danger mr-2">Devolver</button>
                                        </td>

                                    </tr>

                                </table>








                            </div>
                        </div>



                    </div>


                </div>

        </form>
    </section>
@endsection
