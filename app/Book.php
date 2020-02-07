<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function getAuthor()
    {
        return Author::all()->where('id', $this->author_id)->first();
    }
}
