<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    public $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'user_id',
        'status'
    ];
}
