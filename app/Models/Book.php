<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'summary',
        'cover'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Student()
    {
        return $this->belongsTo(Student::class);
    }

    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}
