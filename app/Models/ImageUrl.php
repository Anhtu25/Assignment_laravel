<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageUrl extends Model
{
    use HasFactory;
    protected $table = 'image_url';

    public $fillable = [
        'img_url',
        'books_id',
        'image_type'
    ];

    // Thiết lập mối quan hệ với model Book
    public function book()
    {
        return $this->belongsTo(Book::class, 'books_id');
    }
}
