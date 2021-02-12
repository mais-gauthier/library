<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Library</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 justify-content-between">
        <a class="navbar-brand" href="/">Library</a>
        <div class="text-right">
            @guest
                <a class="navbar-brand" href="{{ route('login') }}">Войти</a>
                <a class="navbar-brand" href="{{ route('register') }}">Регистрация</a>
            @else
                <a class="navbar-brand" href="{{ route('admin') }}">Админ панель</a>
                <a class="navbar-brand" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Выйти
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            @endguest
        </div>
    </nav>

    <main role="main" class="container">

        <table class="footable table table-stripped toggle-arrow-tiny">
            <thead>
                <tr>
                    <th data-toggle="true">Автор</th>
                    <th data-toggle="true">Книги</th>
                </tr>
            </thead>
            <tbody>
                @forelse($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>
                            @forelse($author->books as $book)
                                {{ $book->title }}
                                <br>
                            @empty
                                У автора нету книг
                            @endforelse
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
    </main>
    </body>
</html>
