<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->book();

        $this->command->info('Таблицы загружены данными!');
    }

    private function book()
    {
        $namesVern = [
          "Пять недель на воздушном шаре",
          "Путешествие к центру земли",
          "Вокруг Луны",
          "Плавающий город",
          "Вокруг света за восемьдесят лет",
          "В стране мехов",
          "Таинственный остров",
          "Паровой дом"
        ];

        $namesAkunin = [
            "Азазель",
            "Турецкий гамбит",
            "Статский советник",
            "Шпионский роман",
            "Фантастика",
            "Квест",
            "Детская книга для девочек"
        ];

        foreach ($namesVern as $nameV)
        {
            $book = new Book();

            $book->name = $nameV;
            $book->isbn = rand(1000000, 9999999);
            $book->count_page = rand(50, 800);
            $book->author_id = 1;
            $book->category_id = 1;

            $book->save();
        }

        foreach ($namesAkunin as $nameA)
        {
            $book = new Book();

            $book->name = $nameA;
            $book->isbn = rand(1000000, 9999999);
            $book->count_page = rand(50, 800);
            $book->author_id = 2;
            $book->category_id = 1;

            $book->save();
        }
    }

    private function main()
    {
        DB::table('authors')->insert([[
            'id' => 1,
            'name' => "Жюль",
            'surname' => "Верн"
        ],[
            'id' => 2,
            'name' => "Борис",
            'surname' => "Акунин"
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
