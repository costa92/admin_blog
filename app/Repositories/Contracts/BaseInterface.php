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
    /**
     * 更新数据
     * @param Model $model
     * @param array $attributes
     * @return mixed
     */
    public function update(Model $model,array $attributes);

    /**
     * 添加数据
     * @param array $attributes
     * @return mixed
     */
    public function create(array  $attributes);

    /**
     * 查询所以的数据
     * @return mixed
     */
    public function all();

    /**
     * model查询
     * @return mixed
     */
    public function query();

    /**
     * @param $id
     * @return mixed
     */
    public function first($id);


}