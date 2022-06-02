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
                            <span class="card-title">Show Book</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Author:</strong>
                            {{ $book->id_author }}
                        </div>
                        <div class="form-group">
                            <strong>Inventory:</strong>
                            {{ $book->inventory }}
                        </div>
                        <div class="form-group">
                            <strong>Others Auth:</strong>
                            {{ $book->others_auth }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $book->title }}
                        </div>
                        <div class="form-group">
                            <strong>Edition:</strong>
                            {{ $book->edition }}
                        </div>
                        <div class="form-group">
                            <strong>Land:</strong>
                            {{ $book->land }}
                        </div>
                        <div class="form-group">
                            <strong>Editorial:</strong>
                            {{ $book->editorial }}
                        </div>
                        <div class="form-group">
                            <strong>Year:</strong>
                            {{ $book->year }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $book->description }}
                        </div>
                        <div class="form-group">
                            <strong>Category:</strong>
                            {{ $book->category }}
                        </div>
                        <div class="form-group">
                            <strong>Tags:</strong>
                            {{ $book->tags }}
                        </div>
                        <div class="form-group">
                            <strong>Observation:</strong>
                            {{ $book->observation }}
                        </div>
                        <div class="form-group">
                            <strong>Condition:</strong>
                            {{ $book->condition }}
                        </div>
                        <div class="form-group">
                            <strong>Signatura Top:</strong>
                            {{ $book->signatura_top }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
