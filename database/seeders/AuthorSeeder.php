<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/authors.json');
        $books = collect(json_decode($json, true));
        $books->each(function($author){
            Author::create([
                'id' => $author['id'],
                'name' => $author['name'],
                'url' => $author['url'],
                'image' => $author['image'],
                'slug' => $author['slug'],
                'bio' => $author['bio'],
            ]);
        });
    }
}
