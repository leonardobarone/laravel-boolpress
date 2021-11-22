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
            CategoriesTableSeeder::class,
            PostsTableSeeder::class
        ]);
        // $this->call(UserSeeder::class oppure [array di UserSeeder::class, e altri senza importare le classi]);
        // php artisan db:seed (senza aggiungere altro)
    }
}

// composer dump-autoload