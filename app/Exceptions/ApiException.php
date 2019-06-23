<?php
/**
 * ApiException.php
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@meiyue.me>
 * @ComputerAccount:costa92
 * createTime: 2019/3/6 3:37 PM
 * @copyright Copyright (c) 深圳市美约时代. (http://www.meiyue.me)
 */

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    function _construct($msg = '')
    {
        parent::_construct($msg);
    }

    public function render($request , Exception $e)
    {

        if ( config('app.debug') ) {

            return parent::render($request , $e);
        }

        return $this->handle($request , $e);
    }


    public function handle($request , Exception $e)
    {
        if ( $e instanceof ApiException ) {
            $result = [
                "msg"    => "" ,
                "data"   => $e->getMessage() ,
                "status" => 0 ,
            ];

            return response()->json($result);
        }

        return parent::render($request , $e);
    }
}