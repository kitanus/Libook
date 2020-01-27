<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->main();

        $this->command->info('Таблицы загружены данными!');
    }

    private function main()
    {
        DB::table('authors')->insert([[
            'id' => 1,
            'name' => "Александр",
            'surname' => "Даль"
        ],[
            'id' => 2,
            'name' => "Василий",
            'surname' => "Куприн"
        ]]);

        DB::table('category')->insert([[
            'id' => 1,
            'name' => "Романтика"
        ],[
            'id' => 2,
            'name' => "Драма"
        ],[
            'id' => 3,
            'name' => "Приключение"
        ]]);

        DB::table('news')->insert([[
            'id' => 1,
            'name' => "Первая новость",
            'addres_text' => 'first_news',
            'time' => '10',
            'date' => '10'
        ],[
            'id' => 2,
            'name' => "Вторая новость",
            'addres_text' => 'second_news',
            'time' => '11',
            'date' => '11'
        ]]);

        $this->command->info('Таблицы загружены данными!');
    }
}
