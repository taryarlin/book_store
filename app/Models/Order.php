<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'student_id',
        'book_id'
    ];

    public function Student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function Book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
