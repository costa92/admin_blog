<?php
/**
 * BaseInterface.php
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@163.com>
 * @ComputerAccount:costa92
 * createTime: 2019/6/22 2:36 PM
 * @copyright Copyright (c) blog. (http://www.costalong.com)
 */

namespace App\Repositories\Contracts;


use Illuminate\Database\Eloquent\Model;

interface BaseInterface
{
    public function update(Model $model,array $attributes);
}