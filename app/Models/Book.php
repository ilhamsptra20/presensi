<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'publisher_id',
        'writer_id',
        'thumbnail',
        'slug',
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }

    public function borrows()
    {
        return $this->hasMany(BorrowingBook::class);
    }
}
