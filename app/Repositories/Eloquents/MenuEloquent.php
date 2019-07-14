<?php
/**
 * MenuEloquent.php
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@163.com>
 * @ComputerAccount:costa92
 * createTime: 2019/6/22 3:03 PM
 * @copyright Copyright (c) blog (http://www.costalong.com)
 */

namespace App\Repositories\Eloquents;


use App\Models\Menus;
use App\Repositories\Contracts\MenuInterface;
use Illuminate\Support\Facades\Log;

class MenuEloquent extends BaseEloquent implements MenuInterface
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed|string
     */
    public function model()
    {
        return Menus::class;
    }

    /**
     * @param $data
     * @param string $model
     * @return $this|\Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function save($data , $model = '')
    {
        try {
            if ( $model && $model instanceof Menus ) {
                $result = $this->update($model , $data);
            } else {
                $result = $this->create($data);
            }

            return $result;
        } catch ( \Exception $e ) {
            Log::error('保存数据失败' ,
                [
                    'file' => $e->getFile() ,
                    'msg'  => $e->getMessage() ,
                    'line' => $e->getLine() ,
                ]
            );
            throw new \Exception('保存菜单数据失败！');
        }
    }
}