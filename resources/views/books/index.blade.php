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
            <div class="card-header">
                Книги
                <a href="{{route('books.create')}}" class="btn btn-primary">Создать</a>
            </div>
            <div class="card-body">
                <table class="footable table table-stripped toggle-arrow-tiny">
                    <thead>
                    <tr>
                        <th data-toggle="true">Имя книги</th>
                        <th data-toggle="true">Автор</th>
                        <th class="text-right" data-sort-ignore="true">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author->name }}</td>
                                <td class="text-right">
                                    <form action="{{ route('books.destroy', $book) }}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        @csrf
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="{{ route('books.edit', $book) }}">Редактировать</a>
                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h2 class="ui center aligned icon header" class="center aligned">
                                        <i class="circular database icon"></i>
                                        Данные отсутствуют
                                    </h2>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
