<?php

use Illuminate\Database\Seeder;
use App\Models\Language;

class LangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'code' => 'en',
            'title' => 'English',
        ]);

        Language::create([
            'code' => 'ru',
            'title' => 'Русский',
        ]);
    }
}
