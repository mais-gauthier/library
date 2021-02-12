<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin', [
            'count_authors' => Author::get()->count(),
            'count_books' => Book::get()->count(),
        ]);
    }
}
