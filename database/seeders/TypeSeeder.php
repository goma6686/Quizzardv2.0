<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('types')->delete();

        \DB::table('types')->insert([
                ['id' => '1', 'name' => 'Simple'],
                ['id' => '2', 'name' => 'Multiple Choice'],
                ['id' => '3', 'name' => 'True or False'],
        ]);
    }
}
