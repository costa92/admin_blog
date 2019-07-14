<?php
/**
 * BaseEloquent.php
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@163.com>
 * @ComputerAccount:costa92
 * createTime: 2019/6/22 2:46 PM
 * @copyright Copyright (c) blog (http://www.costalong.com)
 */

namespace App\Repositories\Eloquents;


use App\Repositories\Contracts\BaseInterface;
use function GuzzleHttp\Psr7\uri_for;
use Illuminate\Database\Eloquent\Model;

abstract class BaseEloquent implements BaseInterface
{
    /**
     * Instance that extends Illuminate\Database\Eloquent\Model
     *
     * @var Model
     */
    protected $model;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->makeModel();
    }

    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    abstract public function model();

    /**
     * 注入
     * @return mixed
     */
    public function makeModel()
    {
        $model = app()->make($this->model());

        return $this->model = $model;
    }


    /**
     * @param array $where
     * @return mixed
     */
    public function get($where = [])
    {
        $query = $this->query();
        if ( $where ) {
            $query = $query->where($where);
        }

        return $query->get();
    }

    /**
     * 查询全部的
     * @return mixed
     */
    public function all()
    {
        return $this->query()->all();
    }

    /**
     * @param array $where
     * @param string $field
     */
    public function count($where = [] , $field = '*')
    {
        $query = $this->query();
        if ( $where ) {
            $query = $query->where($where);
        }

        return $query->count($field);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->query()->find($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function first($where = [])
    {
        $query = $this->query();
        if ( $where ) {
            $query = $query->where($where);
        }

        return $query->first();
    }

    /**
     * @return Model
     */
    public function query()
    {
        return $this->model;
    }


    /**
     * @param int $pageNum
     */
    public function paginate($where = [] , $pageNum = 20)
    {
        $query = $this->query();
        if ( $where ) {
            $query = $query->where($where);
        }

        return $query->paginate($pageNum);
    }


    /**
     * 获取表的字段
     * @return mixed
     */
    public function getFillable()
    {
        $fillable = $this->model->getFillable();

        return $fillable ? $fillable : '';
    }


    /**
     * 保存数据
     * @param $data
     */
    public function create(array $data)
    {
        $data = $this->fillData($data);
        $query = $this->query()->fill($data);
        $result = $query->save();
        if ( $result == false ) {
            throw new \Exception('添加数据失败');
        }

        return $query;
    }

    /**
     * @param Model $model
     * @param array $data
     * @return $this|Model
     */
    public function update(Model $model , array $data)
    {
        $model = $model->fill($data);
        if ( $model->save() == false ) {
            throw new \Exception('修改数据失败');
        }

        return $model;
    }

    /**
     * 获取model的默认值
     * @param $data
     * @return mixed
     */
    protected function fillData(array $data)
    {
        $fillable = $this->getFillable(); // 获取字段
        foreach ( $fillable as $field ) {
            if ( !isset($data[ $field ]) ) {
                $data[ $field ] = $this->model->getAttribute($field);
            }
        }
        return $data;
    }
}