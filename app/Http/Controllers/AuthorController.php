<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{

    public function index()
    {
        return view('authors.index', [
            'authors' => Author::get(),
        ]);
    }

    public function create()
    {
        return view('authors.create', [
            'author' => [],
        ]);
    }

    public function store(AuthorRequest $request)
    {
        Author::create($request->all());

        return redirect()->route('authors.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Author $author)
    {
        return view('authors.edit', [
            'author' => $author
        ]);
    }

    public function update(Request $request, AuthorRequest $author)
    {
        $author->update($request->all());

        return redirect()->route('authors.index');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index');
    }
}
