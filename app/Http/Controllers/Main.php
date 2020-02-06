<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Empty_;
use PHPUnit\Framework\StaticAnalysis\HappyPath\AssertNotInstanceOf\A;

class Main extends Controller
{
    public function index()
    {

        if(!empty(Auth::user()->name))
        {
            $user = Auth::user()->name;
        }
        else
        {
            $user=false;
        }

        $lastNews = (new News)->getLastNews();

        $textNews = [
            $this->getTextNews('news/'.$lastNews['preLast']->addres_text.'.txt'),
            $this->getTextNews('news/'.$lastNews['last']->addres_text.'.txt')
        ];

        return view('main', [
            'textNews' => $textNews,
            'lastNews' => $lastNews,
            'user' => $user
        ]);
    }

    public function getTextNews($path)
    {
        return explode("\n", Storage::disk('public')->get($path));
    }
}
