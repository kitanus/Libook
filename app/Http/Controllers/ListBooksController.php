<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class ListBooksController extends Controller
{
    public function index($page)
    {
        $books = Book::skip(0+($page-1)*15)->take(15)->get();

        $booksCount = count(Book::all())/15;

        $kindType['name'] = route('filterWord', ['kind'=>'name', 'word'=>'a', 'page'=>1]);
        $kindType['name-author'] = route('filterWord', ['kind'=>'name-author', 'word'=>'a', 'page'=>1]);
        $kindType['surname-author'] = route('filterWord', ['kind'=>'surname-author', 'word'=>'a', 'page'=>1]);

        return view('list', [
            'words' => $this->getAllWords(),
            'books' => $books,
            'countPages' => $booksCount,
            'page' => $page,
            'kindType' => $kindType
        ]);
    }

    public function filterWord($kind, $word, $page)
    {
        $names = [];

        switch ($kind) {
            case 'name':
                $books = Book::
                break;
            case 1:
                echo "i равно 1";
                break;
            case 2:
                echo "i равно 2";
                break;
        }
        $authors = Author::where('surname', 'like', mb_strtoupper($word).'%')->with('books')->get();

        $filtBooks = collect();

        foreach ($authors as $author)
        {
            $filtBooks->push($author->books()->with('author')->get());
        }

        $filtBooks = $filtBooks->collapse();
        $books = $filtBooks->slice(0+($page-1)*15)->take(15)->all();


        $kindType['name'] = route('filterWord', ['kind'=>'name', 'word'=>$word, 'page'=>1]);
        $kindType['name-author'] = route('filterWord', ['kind'=>'name-author', 'word'=>$word, 'page'=>1]);
        $kindType['surname-author'] = route('filterWord', ['kind'=>'surname-author', 'word'=>$word, 'page'=>1]);

        return view('list', [
            'words' => $this->getAllWords(),
            'books' => $books,
            'countPages' => count($filtBooks)/15,
            'page' => $page,
            'wordPage' => $word,
            'kindType' => $kindType,
            'kind' => $kind
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
