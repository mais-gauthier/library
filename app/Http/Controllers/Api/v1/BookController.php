<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function list()
    {
        $books = Book::all();

        $books = $books->map(function($book){
            $data['id'] = $book->id;
            $data['title'] = $book->title;
            $data['author'] = $book->author->name;

            return collect($data);
        });

        return response()->json($books, 200);
    }

    public function getId($id)
    {
        $book = Book::find($id);
        if ( is_null($book)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        return response()->json(Book::find($id), 200);
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return response()->json($book, 200);
    }

    public function delete(Request $request, Book $book)
    {
        $book->delete();
        return response()->json(null, 204);
    }
}
