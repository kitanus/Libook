<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class ListBooksController extends Controller
{
    public function index($page)
    {
        $books = Book::skip(0+($page-1)*15)->take(15)->get();

        $booksCount = count(Book::all());

        $booksCount = $booksCount/15;

        return view('list', [
            'words' => $this->getAllWords(),
            'books' => $books,
            'pages' => $booksCount
        ]);
    }

    public function getAllWords()
    {
        $words = [];

        for($i=0; $i < 10; $i++){
            $words[] = $i;
        }

        foreach(range('a','z') as $a) {
            $words[] = $a;
        }

        for ($i = 224; $i <= 255; $i++) {
            $words[] = iconv('CP1251', 'UTF-8', chr($i));
        }

        return $words;
    }
}
