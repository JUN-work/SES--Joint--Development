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
        $this->call('JS_Questions_TableSeeder');
        $this->call('css_questions_TableSeeder');
    }
}
