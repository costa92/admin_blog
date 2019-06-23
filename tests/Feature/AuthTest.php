<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testRegister()
    {
        //创建测试用户数据
        $email = "Test" . rand(0 , 10) . '@gmail.com';
        User::where('email' , $email)->delete();
        $data = [
            'email'                 => $email ,
            'name'                  => 'Test' ,
            'password'              => 'secret1234' ,
            'password_confirmation' => 'secret1234' ,
        ];
        //发送 post 请求
        $response = $this->json('POST' , route('api.register') , $data);
        //判断是否发送成功
        $response->assertStatus(200);
        //接收我们得到的 token
        $this->assertArrayHasKey('token' , $response->json());
        //删除数据
        User::where('email' , 'test@gmail.com')->delete();
    }
}
