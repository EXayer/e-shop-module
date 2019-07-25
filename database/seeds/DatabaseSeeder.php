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
        $this->call(LangTableSeeder::class);
        $this->call(AttributeSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
