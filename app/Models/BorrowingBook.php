<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowingBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'book_id',
        'borrow',
        'return',
        'date_return',
        'mulct',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
