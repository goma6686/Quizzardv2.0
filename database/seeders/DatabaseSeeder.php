<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
<<<<<<< HEAD
            TypeSeeder::class,
            QuestionSeeder::class,
=======
>>>>>>> 3435db419e1b57988185f5d2060c78375189396d
        ]);
        $this->command->info('All tables seeded successfully!');
    }
}
