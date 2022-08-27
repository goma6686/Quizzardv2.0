<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \DB;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();

        DB::table('types')->insert([
                ['id' => '1', 'name' => 'Multiple Choice'],
                ['id' => '2', 'name' => 'True or False'],
        ]);
    }
}
