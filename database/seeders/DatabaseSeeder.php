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
        // \App\Models\User::factory(10)->create();

        $this->call(AdminSeeder::class);
        $this->call(CategorySeeder::class);

        \App\Models\Category::factory()->count(20)->create();
        \App\Models\Student::factory()->count(50)->create();
        \App\Models\Book::factory(40)->create();
    }
}
