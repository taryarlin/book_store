<?php

namespace Database\Seeders;

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
        $this->call(AdminSeeder::class);

        \App\Models\Category::factory()->count(20)->create();
        \App\Models\Student::factory()->count(50)->create();
        \App\Models\Book::factory(40)->create();
    }
}
