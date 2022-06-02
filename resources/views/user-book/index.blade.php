@extends('layouts.app')

@section('template_title')
    User Book
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('User Book') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('user-books.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Id Book</th>
										<th>Id Category</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userBooks as $userBook)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $userBook->id_book }}</td>
											<td>{{ $userBook->id_category }}</td>

                                            <td>
                                                <form action="{{ route('user-books.destroy',$userBook->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('user-books.show',$userBook->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('user-books.edit',$userBook->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $userBooks->links() !!}
            </div>
        </div>
    </div>
@endsection
