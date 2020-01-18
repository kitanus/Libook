<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function list()
    {
        $news = DB::table('news')->get();

        return view('news/list', [
            'news' => $news
        ]);
    }

    public function show($id)
    {
        $news = DB::table('news')->where('id', $id)->first();

        if(empty($news))
        {
            $news = DB::table('news')->where('id', '1')->first();
        }

        return view('news/show', [
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
