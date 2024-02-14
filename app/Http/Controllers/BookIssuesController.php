<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookIssue;
use App\Models\Book;
use App\Models\Transaction;

class BookIssuesController extends Controller
{
    public function index()
    {
        $bookissues = BookIssue::all();
        return view('bookissues.index', compact('bookissues'));
    }
    
    public function create()
    {
        $books = Book::where('checked_out', false)->get();
        return view('bookissues.create', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patron_name' => 'required',
            'book_id' => 'required',
        ]);

        $bookIssue = new BookIssue($request->only(['book_id', 'patron_name']));

        if ($bookIssue->save()) {
            Transaction::create([
                'book_id' => $bookIssue->book_id,
                'patron_name' => $bookIssue->patron_name,
                'transaction_type' => 'issue',
                'transaction_date' => now(),
            ]);
            $bookIssue->update([
                'issued_date' => now(),
                'due_date' => now()->addDays(7),
            ]);
            
            $bookIssue->book()->update([
                'checked_out' => true,
            ]);


            session()->flash('success', 'Item issued successfully.');
            return redirect()->route('books.index');
        } else {
            return view('books.new  ');
        }
    }


    public function return($id)
    {
        $book_issue = BookIssue::find($id);
        

        if ($book_issue) { // && $book_issue->return()
            $book_issue->book()->update(['checked_out'=>false]);
            Transaction::create([
                'book_id' => $book_issue->book_id,
                'patron_name' => $book_issue->patron_name,
                'transaction_type' => 'return',
                'transaction_date' => now(),
            ]);
            $book_issue = BookIssue::find($id)->delete();
            session()->flash('success', 'Item returned successfully.');
        } else {
            session()->flash('error', 'Return failed. Please contact library staff.');
        }

        return redirect()->route('books.index');
    }
}
