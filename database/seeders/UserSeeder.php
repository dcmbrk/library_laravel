<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/users.json');
        $users = collect(json_decode($json, true));
        $users->each(function($user){
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'role' => $user['role'],
                'status' => $user['status']
            ]);
        });
    }
}
