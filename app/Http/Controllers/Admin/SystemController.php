<?php
/**
 * SystemController.php
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@meiyue.me>
 * @ComputerAccount:costa92
 * createTime: 2019/1/28 11:09 AM
 * @copyright Copyright (c) 深圳市美约时代. (http://www.meiyue.me)
 */

namespace App\Http\Controllers\Admin;


class SystemController extends BaseController
{
    public function index()
    {
        $data['title'] = '系统设置';
        return $this->view('index');
    }
}