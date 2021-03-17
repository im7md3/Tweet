<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(User $user){
        $follow=auth()->user()->toggleFollow($user);
        if($follow){
            return redirect()->back()->with(['success'=>'Following successfully']);
        }else{
            return redirect()->back()->with(['fail'=>'Following failed']);
        }
    }

    
}
