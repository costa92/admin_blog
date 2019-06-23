<?php
/**
 * Helpers.php
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@meiyue.me>
 * @ComputerAccount:costa92
 * createTime: 2019/1/26 8:08 PM
 * @copyright Copyright (c) 深圳市美约时代. (http://www.meiyue.me)
 */

namespace App\Traits;


use League\Flysystem\Config;

trait HelpersTraits
{
    /**
     * 获取分组名字
     * @return string
     */
    public function getPrefix()
    {
        $action = getCurrentRoute();
        $prefix = $action->action['prefix'];

        return $prefix ? trim($prefix , "/") : config('constants.default_group');
    }

    /**
     * @param $view
     * @param array $data
     * @param array $mergeData
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($view , $data = [] , $mergeData = [])
    {
        $view = $this->getPrefix() . '.' . $this->getCurrentControllerName() . '.' . $view;

        return view($view , $data , $mergeData);
    }

    /**
     * 获取控制名称
     * @param bool $singleName
     * @return string
     */
    public function getCurrentControllerName($singleName = true)
    {
        $controllerName = $this->getCurrentAction()['controller'];
        if ( $singleName ) {
            $controllerArr = explode("\\" , $controllerName);
            $controllerName = strtolower(array_pop($controllerArr));
            $controllerName = strtr($controllerName , ['controller' => '']);
        }

        return $controllerName;
    }

    /**
     * @return array
     */
    public function getCurrentAction()
    {
        $action = getCurrentRoute()->getActionName();
        list($class , $method) = explode('@' , $action);

        return ['controller' => $class , 'method' => $method];
    }
}