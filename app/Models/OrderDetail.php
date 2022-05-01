<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'student_id',
        'status'
    ];

    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function Student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
