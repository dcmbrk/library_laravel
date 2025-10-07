<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get('database/data/news.json');
        $news = collect(json_decode($json, true));

        $news->each(function ($n) {
            News::create([
                'title' => $n['title'],
                'slug' => Str::slug($n['title']),
                'date' => $n['date'],
                'url' => $n['url'],
                'thumbnail' => $n['thumbnail'],
                'description' => $n['description'],
                'content_html' => $n['content_html'],
            ]);
        });
    }
}