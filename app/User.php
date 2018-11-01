<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomPasswordReset;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Auth\MustVerifyEmail;


class User extends Authenticatable implements MustVerifyEmailContract
{
    use MustVerifyEmail, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post')->latest();
    }

    /**
     * パスワードリセット通知の送信
     * 
     * @param string $token
     * return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomPasswordReset($token));
    }

    /**
     * メール確認通知の送信
     * 
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail());
    }

    public function followUsers()
    {
        return $this->belongsToMany('User', 'followers', 'following_user_id', 'followed_user_id')->withTimestamps();
    }
    
    public function followedUsers()
    {
        return $this->belongsToMany('User', 'followers', 'following_user_id', 'followed_user_id')->withTimestamps();
    }
}
