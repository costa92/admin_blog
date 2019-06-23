<?php
/**
 * IndexController.php
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@meiyue.me>
 * @ComputerAccount:costa92
 * createTime: 2019/1/26 5:49 PM
 * @copyright Copyright (c) 深圳市美约时代. (http://www.meiyue.me)
 */

namespace App\Http\Controllers\Admin;

use function Sodium\compare;

class IndexController extends BaseController
{

    public function index()
    {
        $data['title'] = '控制面板';

        return $this->view('index' , compact('data' , $data));
    }
}