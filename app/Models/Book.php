<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'title', 'author', 'price'
        
    ];
    protected $attributes = [
        'checked_out' => false,
    ];

    public function bookissues(): HasMany
    {
        return $this->hasMany(BookIssue::class);
    }
}
