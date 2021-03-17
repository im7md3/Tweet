<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class profilesController extends Controller
{
    public function show(User $user){
        $tweets=$user->tweets()->withLikes()->get();
        return view('profiles.show',compact('user','tweets'));
    }

    public function edit(User $user){
        //abort_if($user->isNot(current_user()),404);
        $this->authorize('edit',$user);
        return view('profiles.edit',compact('user'));
    }

    public function update(User $user,Request $request){
        
        $data=request()->validate([
            'username'  =>['required','max:255','string','alpha_dash',Rule::unique('users')->ignore($user)],
            'name'      =>['required','max:255','string'],
            'avatar'    =>['file'],
            'email'     =>['required','max:255','email','string',Rule::unique('users')->ignore($user)],
            'password'  =>['string','required','min:8','max:255','confirmed']
        ]);
        if($request->has('avatar')){
            $filePath=uploadImage('avatar',$request->avatar);
            $data['avatar']=$filePath;
        }
        
        $user->update($data);
        return redirect($user->path());
    }
}
