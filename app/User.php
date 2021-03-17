<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Followable;

class User extends Authenticatable
{
    use Notifiable,Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        return asset($value?:'/img/avatar/hdun.jpg');
    }

    public function setPasswordAttribute($value){
        $this->attributes['password']=bcrypt($value);
    }

    public function timeLine()
    {
        $friends=$this->follows->pluck('id');
        return Tweet::withLikes()->whereIn('user_id',$friends)->orWhere('user_id',$this->id)->latest()->get();
    }

    public function tweets(){
        return $this->hasMany(Tweet::class)->latest();
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function path($expend=''){
        $path=route('profile',$this->username);
        return $expend?"{$path}/{$expend}":$path;
    }

    
}
