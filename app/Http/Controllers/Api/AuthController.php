<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiException;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use JWTAuth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        // 验证字段
        $this->validate($request , ['email' => 'required|email' , 'password' => 'required']);
        // 测试验证
        $credentials = $request->only(['email' , 'password']);
        if ( !$token = auth()->attempt($credentials) ) {
            return response()->json(['error' => 'Incorrect credentials'] , 401);
        }

        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        // 表达验证
        $this->validate($request , [
            'email'    => 'required|email|max:255|unique:users' ,
            'name'     => 'required|max:255' ,
            'password' => 'required|min:8|confirmed' ,
        ]);

        // 创建用户并生成 Token
        $user = User::create([
            'name'     => $request->input('name') ,
            'email'    => $request->input('email') ,
            'password' => Hash::make($request->input('password')) ,
        ]);



        $token = JWTAuth::fromUser($user);

        return response()->json(compact('token'));
    }
}
