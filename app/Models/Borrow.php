<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'bookid',         // Foreign key referencing the books table
        'borrower_name', // Details of the borrower (e.g., name, ID, contact info)
        'borrow_date',     // Date when the book was borrowed
        'return_date',     // Expected return date
        'status',          // Status of the borrowed book (e.g., 'borrowed', 'returned')
    ];

    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }
}
