<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class News extends Controller
{
    public function index()
    {
        if(!$_GET)
        {
            $news = DB::table('news')->where('id', '1')->first();
            $id = 1;
        }
        else
        {
            $news = DB::table('news')->where('id', $_GET['news_id'])->first();
            $id = $_GET['news_id'];

            if(empty($news))
            {
                $news = DB::table('news')->where('id', '1')->first();
                $id = 1;
            }
        }

        return view('news', [
            'content' => $this->getTextNews('news/'.$news->addres_text.'.txt'),
            'name' => $news->name,
            'id' => $id
        ]);
    }

    public function getTextNews($path)
    {
        return explode("\n", Storage::disk('public')->get($path));
    }
}
