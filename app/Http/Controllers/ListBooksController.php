<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class ListBooksController extends Controller
{

    public $countPage;

    public function index($page)
    {
        $books = Book::skip(0+($page-1)*15)->take(15)->get();

        $booksCount = count(Book::all())/15;

        $kindType['name'] = route('filterWord', ['kind'=>'name', 'word'=>'a', 'page'=>1]);
        $kindType['name-author'] = route('filterWord', ['kind'=>'name-author', 'word'=>'а', 'page'=>1]);
        $kindType['surname-author'] = route('filterWord', ['kind'=>'surname-author', 'word'=>'а', 'page'=>1]);

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
        switch ($kind)
        {
            case 'name':
                $books = Book::with('author')->get();
                $this->countPage = count($books)/15;
                $books = $books->skip(0+($page-1)*15)->take(15)->get();
                break;
            case "name-author":
                $books = $this->getBooksFilterAuthors('name', $word, $page);
                break;
            case "surname-author":
                $books = $this->getBooksFilterAuthors('surname', $word, $page);
                break;
        }

        $kindType['name'] = route('filterWord', ['kind'=>'name', 'word'=>$word, 'page'=>1]);
        $kindType['name-author'] = route('filterWord', ['kind'=>'name-author', 'word'=>$word, 'page'=>1]);
        $kindType['surname-author'] = route('filterWord', ['kind'=>'surname-author', 'word'=>$word, 'page'=>1]);

        return view('list', [
            'words' => $this->getAllWords(),
            'books' => $books,
            'countPages' => $this->countPage,
            'page' => $page,
            'wordPage' => $word,
            'kindType' => $kindType,
            'kind' => $kind
        ]);
    }

    public function getBooksFilterAuthors($kind, $word, $page)
    {
        $authors = Author::where($kind, 'like', mb_strtoupper($word).'%')->with('books')->get();

        $filtBooks = collect();

        foreach ($authors as $author)
        {
            $filtBooks->push($author->books()->with('author')->get());
        }

        $filtBooks = $filtBooks->collapse();

        $this->countPage = count($filtBooks)/15;

        return $filtBooks->slice(0+($page-1)*15)->take(15)->all();
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
