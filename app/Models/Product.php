<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'books';

    public $fillable = [
        'name',
        'author_id',
        'publisher_id',
        'year_published',
        'short_description',
        'description',
        'price',
        'price_sale',
        'category_id',
        'image',
    ];
    public function images()
    {
        return $this->hasMany(ImageUrl::class, 'product_id');
    }

    public function cartDetails()
    {
        return $this->hasMany(CartDetail::class, 'product_id');
    }
    // Thiết lập mối quan hệ với model ImageUrl
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
