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
        $result['last'] = $this->getAll()[count($this->getAll())-1];
        $result['preLast'] = $this->getAll()[count($this->getAll())-2];

        return $result;
    }

    public function getOne($name, $value){
        return self::all()->where($name, $value)->first();
    }
}
