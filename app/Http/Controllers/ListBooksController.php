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
            'countPages' => $booksCount,
            'page' => $page
        ]);
    }

    public function filterWord($word, $page)
    {
        $book = Book::all();

        $names = $book->map(function ($item, $key)
        {
            return mb_substr($item->name,0,1);
        });

        $filtBooks = collect();

        foreach ($names as $id => $name)
        {
            if(mb_strtolower($name) == mb_strtolower($word))
            {
                $filtBooks->push($book->get($id));
            }
        }

        $books = $filtBooks->slice(0+($page-1)*15)->take(15)->all();

        $booksCount = count($filtBooks)/15;

        return view('list', [
            'words' => $this->getAllWords(),
            'books' => $books,
            'countPages' => $booksCount,
            'page' => $page,
            'wordPage' => $word
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
