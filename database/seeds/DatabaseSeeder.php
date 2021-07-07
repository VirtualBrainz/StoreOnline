<?php

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
            UserTableSeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            ProductSeeder::class,
            ImagesSeeder::class,
          ]);
    }
}
