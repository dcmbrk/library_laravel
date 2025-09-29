<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('data/book_user.json'));
        $rows = collect(json_decode($json, true));

        $rows->each(function ($row) {
            DB::table('book_user')->insert([
                'book_id'     => $row['book_id'],
                'user_id'     => $row['user_id'],
                'borrow_date' => $row['borrow_date'] ?? Carbon::now()->subDays(5),
                'due_date'    => $row['due_date'] ?? Carbon::now()->addDays(5),
                'return_date' => $row['return_date'] ?? null,
                'status'      => $row['status'] ?? 'borrowing',
            ]);
        });
    }
}
