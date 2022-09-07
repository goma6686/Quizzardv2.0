<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->delete();

        \DB::table('categories')->insert([
                ['id' => '1', 'name' => 'Unknown'],
                ['id' => '2', 'name' => 'Art'],
                ['id' => '3', 'name' => 'History'],
                ['id' => '4', 'name' => 'Science'],
                ['id' => '5', 'name' => 'Computer Science'],
                ['id' => '6', 'name' => 'Sports'],
        ]);
    }
}
