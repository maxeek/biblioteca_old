@extends('layouts.app')

@section('template_title')
    {{ $userBook->name ?? 'Show User Book' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show User Book</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('user-books.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Book:</strong>
                            {{ $userBook->id_book }}
                        </div>
                        <div class="form-group">
                            <strong>Id Category:</strong>
                            {{ $userBook->id_category }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
