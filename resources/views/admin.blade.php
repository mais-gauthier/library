@extends('layouts.app')

@section('content')
    <div class="col-md-8 mb-1">
        <div class="card">
            <div class="card-header">
                <nav class="nav d-flex justify-content-around">
                    <a class="text-muted" href="{{route('authors.index')}}">Авторы</a>
                    <a class="text-muted" href="{{route('books.index')}}">Книги</a>
                </nav>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Административная панель</div>
            <div class="card-body">
                <p>Количество авторов: {{ $count_authors }}</p>
                <p>Количество книг: {{ $count_books }}</p>
            </div>
        </div>
    </div>
@endsection
