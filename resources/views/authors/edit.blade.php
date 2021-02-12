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
            <div class="card-header">Редактирование автора</div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br>
                @endif
                <form class="form-horizontal" action="{{route('authors.update', $author) }}" method="post">
                    <input type="hidden" name="_method" value="put">
                    @csrf
                    <fieldset class="form-horizontal">
                        <div class="form-group"><label class="col-sm-2 control-label">Имя:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" placeholder="" value="{{$author->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">Сохранить</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
