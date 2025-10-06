<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/books.json');
        $books = collect(json_decode($json, true));
        $books->each(function($book){
            Book::create([
                'title' => $book['title'],
                'author_id' => $book['author_id'],
                'translator' => $book['translator'],
                'publisher' => $book['publisher'],
                'publish_date' => $book['publish_date'],
                'pages' => $book['pages'],
                'size' => $book['size'],
                'total_copies' => $book['total_copies'],
                'available_copies' => $book['available_copies'],
                'description' => $book['description'],
                'url' => $book['url'],
                'image' => $book['image'],
                'category_id' => $book['category_id'],
                'slug' => $book['slug'],
            ]);
        });
    }
}