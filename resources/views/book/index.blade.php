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










                                        <th with="35%">Acciones</th>
                                        <th style='visibility:collapse'>Etiqueta</th>
                                    </tr>

                                </thead>
                                <tbody>


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
                    //  {
                    //     data: 'condition'
                    // },

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
