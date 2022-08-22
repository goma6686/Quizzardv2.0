<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'teapot admin',
            'email' => 'judesysmail@gmail.com',
            'is_admin' => true,
            'password' => Hash::make('demo'),
        ];

        $data2 = [
            'name' => 'teapot',
            'email' => 'judesysmail2@gmail.com',
            'is_admin' => false,
            'password' => Hash::make('demo2'),
        ];

        User::create($data); //one admin
        User::create($data2);
        User::factory(5)->create(); //5 random

        DB::update('UPDATE users SET profile_pic = CONCAT("https://picsum.photos/seed/", name, "/125.jpg")');
    }
}