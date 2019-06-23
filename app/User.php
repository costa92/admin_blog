<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name' , 'email' , 'password' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password' , 'remember_token' ,
    ];

    //获取将被存储在 JWT 主体 claim 中的标识
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // 返回一个键值对数组，包含要添加到 JWT 的任何自定义 claim
    public function getJWTCustomClaims()
    {
        return [];
    }
}
