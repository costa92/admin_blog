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
        $model = $this->model;

        if ( $where ) {
            $model->where($where);
        }

        return $model->get();
    }

    /**
     * 查询全部的
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param array $where
     * @param string $field
     */
    public function count($where = [] , $field = '*')
    {
        $model = $this->model;
        if ( $where ) {
            $model->where($where);
        }

        return $model->count($field);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
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
        $model = $this->model;
        if ( $where ) {
            $model->where($where);
        }

        return $model->paginate($pageNum);
    }


    /**
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
    public function create($data)
    {
        $data = $this->fillData($data);
        $model = $this->model->fill($data);
        $result = $model->save();
        if ( $result == false ) {
            throw new \Exception('添加数据失败');
        }
        return $model;
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
     *
     * @param $data
     * @return mixed
     */
    protected function fillData($data)
    {
        $fillable = $this->getFillable();
        foreach ( $fillable as $field ) {
            if ( !isset($data[ $field ]) ) {
                $data[ $field ] = $this->model->getAttribute($field);
            }
        }

        return $data;
    }
}