<?php

namespace App\Http\Controllers;

use App\User;
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

        $news = DB::table('news')->get();

        $lastNews = $news[count($news)-1];
        $preLastNews = $news[count($news)-2];

        $arrNews = [
            $this->getTextNews('news/'.$preLastNews->addres_text.'.txt'),
            $this->getTextNews('news/'.$lastNews->addres_text.'.txt')
        ];

        $arrNamesNews = [
            $preLastNews->name,
            $lastNews->name
        ];

        return view('main', [
            'news' => $arrNews,
            'nameNews' => $arrNamesNews,
            'user' => $user
        ]);
    }

    public function getTextNews($path)
    {
        return explode("\n", Storage::disk('public')->get($path));
    }
}
