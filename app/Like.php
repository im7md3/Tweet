<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable=['id','user_id','tweet_id','Liked','created_at','updated_at'];
}
