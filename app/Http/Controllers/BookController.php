<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index()
    {
        return view('books.index', [
            'books' => Book::get(),
        ]);
    }

    public function create()
    {
        return view('books.create', [
            'book' => [],
            'authors' => Author::get(),
        ]);
    }

    public function store(BookRequest $request)
    {
        Book::create($request->all());

        return redirect()->route('books.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Book $book)
    {
        return view('books.edit', [
            'book' => $book,
            'authors' => Author::where('id', '!=', $book->author->id)->get(),
        ]);
    }

    public function update(Request $request, BookRequest $book)
    {
        $book->update($request->all());

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
