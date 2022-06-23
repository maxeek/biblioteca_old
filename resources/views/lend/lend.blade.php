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
                                <span class="card-title">Prestar libro</span>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('books.index') }}"> Atrás</a>
                            </div>
                        </div>

                        <div class="card-body border border-warning rounded">
                            <h1 class="text-uppercase text-center"> {{ $book->title }}</h1>

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

                                    </tr>

                                </table>


                                <br>
                                <br>
                                <strong>Descripción: </strong> {{ $book->description }}

                                    <br>
                                    <br>

                                <table>
                                    <tr>


                                        <td style="width:40%">

                                            {{ Form::label('Usuario') }}
                                            <select name="usersbook" id="usersbook" class="form-group">

                                                @for ($i = 0; $i < count($usersbook); $i++)
                                                    <option value={{ $usersbook[$i]->id }}>
                                                        {{ $usersbook[$i]->surname }}
                                                        {{ $usersbook[$i]->name }} -> {{ $usersbook[$i]->dni }}
                                                    </option>
                                                @endfor




                                            </select>


                                        </td>
                                        {{-- <td></td> --}}
                                        <td style="width:10%">
                                            <input value=0 type="hidden" name="condition" id="condition">
                                            <input value={{$book->id}} type="hidden" name="book_id" id="book_id">

                                            <button class="btn btn-warning mr-2">Prestar</button>


                                        </td>


                                    </tr>

                                </table>




                                <div class="form-group">

                                </div>





                            </div>
                        </div>



                    </div>


                </div>

        </form>
    </section>
@endsection
