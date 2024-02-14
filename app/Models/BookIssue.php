<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookIssue extends Model
{
    use HasFactory;
    protected $table = 'book_issues';
    protected $fillable = [
        'book_id','patron_name', 'book_id', 'issued_date', 'due_date','returned'
    ];

    protected $attributes=[
        'returned'=>false,
    ];

    public function book()
{
    return $this->belongsTo(Book::class, 'book_id');
}

public function return()
    {
     
        if (!$this->book) {
            return false;
        }
    
        $this->returned = true;
        $this->save();
    
        // Update the book's availability status
        $this->book->update(['checked_out' => false]);
    
        //update the last book issue's issued_date and due_date
        // $lastBookIssue = $this->book->bookIssues->last();
        // $lastBookIssue->update(['issued_date' => null, 'due_date' => null]);
    
        return true;
    }
}
