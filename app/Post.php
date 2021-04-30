<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $primary_key= 'id';

    protected $timeStamp = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
