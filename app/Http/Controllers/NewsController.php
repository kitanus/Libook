<?php

namespace App\Http\Controllers;

use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function create(Request $request)
    {

        $nameAuthor = (new User)->getOne('id', $request->author)->name;

        $news = new News();

        $news->id = count(DB::table('news')->get())+1;
        $news->name = $request->name;
        $news->addres_text = 'news'.date("d_h_i").'_'.$nameAuthor;
        $news->id_user = $request->author;
        $news->time = date("h:i:s");
        $news->date = date("Y-m-d");

        $news->save();

        Storage::disk('public')->put('news/news'.date("d_h_i").'_'.$nameAuthor.".txt", $request->text);

        return redirect()->route('admin');
    }

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

        $user = DB::table('users')->where('id', $news->id_user)->first();

        return view('news/show', [
            'content' => $this->getTextNews('news/'.$news->addres_text.'.txt'),
            'news' => $news,
            'id' => $id,
            'user' => $user
        ]);
    }

    public function getTextNews($path)
    {
        return explode("\n", Storage::disk('public')->get($path));
    }
}
