<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $table = 'tweets';
    protected $fillable = ['id','user_id', 'body'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function liking($user,$liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id'   => $user ? $user->id : auth()->id(),
            ],
            [
                'Liked'     => $liked,
            ]
        );
    }

    public function like($user = null)
    {
        $this->liking($user, true);
    }

    public function dislike($user = null)
    {
        $this->liking($user, false);
    }

    public function isLikedBy(User $user){
        //return $this->likes()->where('user_id',$user->id)->exists();
        return (bool) $user->likes->where('tweet_id',$this->id)->where('Liked',true)->count();
    }
    public function isDislikedBy(User $user){
        //return $this->likes()->where('user_id',$user->id)->exists();
        return (bool) $user->likes->where('tweet_id',$this->id)->where('Liked',false)->count();
    }

    public function scopeWithLikes(Builder $query){
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

}
