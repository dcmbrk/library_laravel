<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = [
    'title',
    'slug',
    'author',
    'translator',
    'publisher',
    'publish_date',
    'pages',
    'size',
    'total_copies',
    'available_copies',
    'description',
    'url',
    'image',
    'category_id',
];


    public function users() {
        return $this->belongsToMany(User::class, 'book_user')
                ->withPivot(['status', 'borrow_date', 'due_date', 'return_date']);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }
}
