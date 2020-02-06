<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function getAll()
    {
        return self::all();
    }

    public function getLastNews()
    {

        $lastNews = array_slice($this->getAll()->toArray(), -2, 2);

        $result['last'] = $lastNews[1];
        $result['preLast'] = $lastNews[0];

        return $result;
    }

    public function getUser()
    {
        return (new User)->getAll()->where('id', $this->user_id)->first();
    }

    public function getOne($name, $value){
        return self::all()->where($name, $value)->first();
    }
}
