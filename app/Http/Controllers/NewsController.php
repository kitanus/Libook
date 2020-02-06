<?php

namespace App\Http\Controllers;

use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function showEdit($id)
    {
        $news = (new News())->getOne('id', $id);

        return view('news/edit', [
            'id' => $id,
            'content' => $this->getTextNews('news/'.$news->addres_text.'.txt'),
            'news' => $news
        ]);
    }

    public function edit($id, Request $request)
    {
        $news = News::find($id);

        $news->name = $request->name;

        $news->save();

        Storage::disk('public')->delete('news/'.$news->addres_text.".txt");
        Storage::disk('public')->put('news/'.$news->addres_text.".txt", $request->text);

        return redirect()->route('showNews', ['id' => $id]);
    }

    public function delete($id)
    {
        $news = News::find($id);
        Storage::disk('public')->delete('news/'.$news->addres_text.".txt");
        $news->delete();

        return redirect()->route('listNews');
    }

    public function create(Request $request)
    {

        $nameAuthor = (new User)->getOne('id', $request->author)->name;

        $news = new News();

        $news->id = count(DB::table('news')->get())+1;
        $news->name = $request->name;
        $news->addres_text = 'news'.date("d_h_i").'_'.$nameAuthor;
        $news->user_id = $request->author;
        $news->time = date("h:i:s");
        $news->date = date("Y-m-d");

        $news->save();

        Storage::disk('public')->put('news/news'.date("d_h_i").'_'.$nameAuthor.".txt", $request->text);

        return redirect()->route('admin');
    }

    public function list()
    {
        $news = (new News)->getAll();

        return view('news/list', [
            'news' => $news
        ]);
    }

    public function show($id)
    {
        $news = new News();

        $currentNews = $news->getOne('id', $id);

        if(empty($currentNews))
        {
            $currentNews = $news->getOne('id', 1);
        }

        return view('news/show', [
            'content' => $this->getTextNews('news/'.$currentNews->addres_text.'.txt'),
            'news' => $currentNews,
            'id' => $id,
            'user' => (new User)->getOne('id', $currentNews->user_id)
        ]);
    }

    public function getTextNews($path)
    {
        return explode("\n", Storage::disk('public')->get($path));
    }
}
