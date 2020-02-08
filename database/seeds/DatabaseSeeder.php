<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Book;
use App\Author;
use App\Http\Controllers\Parser\SeedParser;

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
        $infoBooks = new SeedParser();

        Author::truncate();

        $id=1;

        $infoAuthors = array_map(function ($book){
            return $book['authors'];
        }, $infoBooks->getBookInfo());

        $infoAuthors = array_unique($infoAuthors);
        foreach($infoAuthors as $infoAuthor)
        {
            $author = new Author();
            $author->id = $id;
            $author->name = $infoAuthor;
            $author->save();
            $id++;
        }

        $this->command->info('Загружены авторы!');

        Book::truncate();

        $id=1;

        foreach ($infoBooks->getBookInfo() as $infoBook)
        {
            $book = new Book();

            $book->id = $id;
            $book->name = $infoBook['names'];
            $book->isbn = rand(1000000, 9999999);
            $book->count_page = rand(50, 800);

            $author = Author::where('name', $infoBook['authors'])->first();
            $book->author_id = $author->id;
            $book->category_id = 1;
            $book->year = $infoBook['year'];

            $book->save();

            $id++;
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
