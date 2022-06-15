@extends('layouts.app')

@section('template_title')
    Book
@endsection
@section('css')
    <!-- Styles -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css
                                    ">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css
                                    ">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">


    @endsection




@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Libros
                            </span>

                            <div class="float-right">
                                <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    Crear nuevo
                                    {{-- {{ __('Create New') }} --}}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="libros" class="table table-striped table-hover">
                                {{-- <table id="beneficiarios" class="table table-dark table-striped table-bordered shadow-lg mt-4 table-hover" style="100%"> --}}
                                <thead class="thead">
                                    <tr>
                                        {{-- <th></th> --}}
                                        <th>N° Inventario</th>

                                        <th>Título</th>
                                        <th>Autor</th>

                                        <th>Edición</th>




                                        <th>Condición</th>





                                        <th with="35%">Acciones</th>
                                        <th style='visibility:collapse'>Etiqueta</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    {{-- @foreach ($books as $book)
                                        <tr>
                                            <td style="visibility:hidden"></td>
                                            <td>{{ $book->inventory }}</td>

                                            <td style="width: 30%">{{ $book->title }}</td>
                                            <td class="text-uppercase" style="width: 30%">
                                                {{ $book->author->name . ' ' . $book->author->surname }}</td>

                                            <td>{{ $book->others_auth }}</td>
                                            <td>{{ $book->edition }}</td>

                                            @if ($book->condition == 1)
                                                <td style="width: 8%">Disponible</td>
                                            @else
                                                <td style="width: 8%">Prestado</td>
                                            @endif









                                            <td style="width: 35%">
                                                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('books.show', $book->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('books.edit', $book->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                            <td style='visibility:collapse'>{{ $book->tags }}</td>

                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $books->links() !!} --}}

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    {{-- <script type="text/javascript" src="/DataTables/datatables.min.js"></script> --}}

<script>



    $(document).ready(() => {
            $('#libros').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    "lengthMenu": "Mostrar " +
                        `<select>
                    <option value='5'>5</option>
                    <option value='10'>10</option>
                    <option value='25'>25</option>
                    <option value='50'>50</option>
                    <option value='-1'>Todos</option>
                    </select>` + " registros por página",
                    "zeroRecords": "Nada encontrado - Disculpa",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    'search': 'Buscar:',
                    "processing": 'Procesando...',
                    'paginate': {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                },
                processing: true,
                serverSide: true,

                ajax: "{{ route('books.index') }}",
                columns: [{
                        data: 'inventory'

                    },
                    {
                        data: 'title'

                    },
                    {
                        data: 'autor', name: 'autor'
                    },
                    {
                        data: 'edition'
                    },
                     {
                        data: 'condition'
                    },

                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },

                    {
                        data: 'tags',
                        visible: false,
                        searchable: true,
                    }
                ]
            });
        });

</script>


    <script>
    //     $('#libros').DataTable({
    //         responsive: true,
    //         autoWidth: false,
    //         // aca oculto la columna de etiquetas o tag
    //         // para que una columna no sea searchable hay que poner falso ej:
    //         // searchable: false,

    //         ///// otros ejemplos
    //         //        columnDefs: [
    //         //     {
    //         //         target: 2,
    //         //         visible: false,
    //         //         searchable: false,
    //         //     },
    //         //     {
    //         //         target: 8,
    //         //         visible: false,
    //         //     },
    //         // ],
    //         columnDefs: [{

    //             target: 8,
    //             visible: false
    //         }, ],


    //         "language": {
    //             "lengthMenu": "Mostrar " +
    //                 `<select>
    //             <option value='5'>5</option>
    //             <option value='10'>10</option>
    //             <option value='25'>25</option>
    //             <option value='50'>50</option>
    //             <option value='-1'>Todos</option>
    //             </select>` + " registros por página",
    //             "zeroRecords": "Nada encontrado - Disculpa",
    //             "info": "Mostrando la página _PAGE_ de _PAGES_",
    //             "infoEmpty": "No records available",
    //             "infoFiltered": "(filtrado de _MAX_ registros totales)",
    //             'search': 'Buscar:',
    //             'paginate': {
    //                 'next': 'Siguiente',
    //                 'previous': 'Anterior'
    //             }
    //         }
    //     });
    // </script>
@endsection
