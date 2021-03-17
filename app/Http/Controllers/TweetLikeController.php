<?php

namespace App\Http\Controllers;

use App\Like;
use App\Tweet;

class TweetLikeController extends Controller
{
    public function store($id){
        $tweet=Tweet::find($id);
        /* Like::updateOrCreate(
            [
                'user_id'   => auth()->id(),
                
                
            ],
            [
                'tweet_id'  => $tweet->id,
            ],
            [
                'Liked'     => true,
            ]
            
            ); */
            $tweet->like(current_user());
        return back();
    }

    public function destroy($id){
        $tweet=Tweet::find($id);
        /* Like::updateOrCreate(
            [
                'user_id'   => auth()->id(),
                
                
            ],
            [
                'tweet_id'  => $tweet->id,
            ],
            [
                'Liked'     => false,
            ]
            
            ); */
            $tweet->dislike(current_user());
        return back();
    }
}
