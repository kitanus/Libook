<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book')->insert([
            'id' => 2,
            'name' => 'newWord',
            'isbn' => 190,
            'count_page' => 123,
        ]);
    }
}
