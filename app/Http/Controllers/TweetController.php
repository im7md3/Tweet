<?php

namespace App\Http\Controllers;

use App\Like;
use App\Tweet;
use App\User;
use Illuminate\Http\Request;

class TweetController extends Controller
{


    public function index()
    {
        $tweets=User::find(auth()->id())->timeline();
        return view('tweets.index',compact('tweets'));
    }


    public function insert(Request $request){
        $tweet=Tweet::create([
            'user_id'=>auth()->id(),
            'body'=>$request->body
        ]);
        if($tweet){
            return redirect()->back()->with(['success'=>'The tweet is sent']);
        }else{
            return redirect()->back()->with(['failed'=>"The tweet isn't sent"]);
        }
    }
}
