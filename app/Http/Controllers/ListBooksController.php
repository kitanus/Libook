<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class ListBooksController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('list', [
            'words' => $this->getAllWords(),
            'books' => $books
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
