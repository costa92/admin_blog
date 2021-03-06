<?php
/**
 * Menus.php
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@meiyue.me>
 * @ComputerAccount:costa92
 * createTime: 2019/2/1 9:47 PM
 * @copyright Copyright (c) 深圳市美约时代. (http://www.meiyue.me)
 */

namespace App\Services;


use App\Http\Requests\MenuCreateRequest;
use App\Models\Menus;
use App\Repositories\Contracts\MenuInterface;

class MenuService extends BaseService
{
    /**
     * @var MenuInterface
     */
    private $menu;

    public function __construct(MenuInterface $menu)
    {
        $this->menu = $menu;
    }

    /**
     * @param $params
     * @return mixed
     */
    public function queryList($params)
    {
        $where = [];
        if ( !empty($params['parent_id']) ) {
            $where['parent_id'] = $params['parent_id'];
        } else {
            $where['parent_id'] = 0;
        }

        return $this->menu->paginate($where);
    }


    /**
     * @param array $params
     */
    public function queryList1(array $params = [])
    {
        $where['parent_id'] = 0;
        $model = Menus::query();
        $arr = [
            'in' , 'between' ,
        ];
        foreach ( $where as $key => $val ) {
            if ( is_numeric($key) ) {
                $model = $model->where([$val]);
            } elseif ( is_string($key) && is_array($val) ) {
                $first = array_shift($val);
                if ( in_array($first , $arr) ) {
                    $method = 'where' . ucwords($first);
                    $model->$method($key , array_pop($val));
                }
            } else {
                $model = $model->where($key , $val);
            }
        }

        return Menus::paginate(10);
    }

    /**
     * @return mixed
     */
    public function getListParent()
    {
        return $this->menu->get( [ 'parent_id' => 0]);
    }

    /**
     * @param MenuCreateRequest $request
     * @return Menus
     */
    public function store(MenuCreateRequest $request)
    {
        $data = $this->manyCamelize($request);

        return $this->menu->save($data);
    }

    /**
     * @param $id
     */
    public function findFirstById($id)
    {
        return $this->menu->find($id);
    }

    /**
     * @param $id
     * @param $request
     * @return mixed
     */
    public function update($id , $request)
    {
        $menu = $this->findFirstById($id);
        if ( $menu ) {
            $data = $this->manyCamelize($request);
            $menu = $this->menu->save($data , $menu);
        }

        return $menu;
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $result = ['status' => 'fail'];
        $menu = $this->findFirstById($id);
        if ( $menu ) {
            $menu->delete();
            if ( $menu->trashed() ) {
                $result['status'] = 'success';
            }
        }

        return $result;
    }
}