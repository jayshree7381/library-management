<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create(){
        return view('books.create');
    }
    public function store(Request $request)
    {
        Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'price' => $request->input('price'),
        ]);
        return redirect()->route('books.index')->with('success', 'Book added sucessfully');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'price' => $request->input('price'),

        ]);
        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
