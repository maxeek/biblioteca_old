@extends('layouts.app')

@section('template_title')
    Libros prestados
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
                                Libros prestados
                            </span>

                            {{-- <div class="float-right">
                                <a href="{{ route('authors.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    Agregar autor
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="librosprestados" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        {{-- <th>No</th> --}}

                                        <th>Título</th>
                                        <th>Lector</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prestados as $prestado)
                                        <tr>
                                            {{-- <td>{{ ++$i }}</td> --}}

                                            <td>{{ $prestado->libroprestado_->title }}</td>
                                            <td>{{ $prestado->lector->name }} {{ $prestado->lector->surname }}</td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>






  <script>
        $('#librosprestados').DataTable({
            responsive: true,
            autoWidth: false,
            "language": {
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
                "infoEmpty": "No hay registros",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                'search': 'Buscar:',
                'paginate': {
                    'next': 'Siguiente',
                    'previous': 'Anterior'
                }
            }
        });
    </script>

@endsection
