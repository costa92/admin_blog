<?php
/**
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@meiyue.me>
 * @ComputerAccount:costa92
 * createTime: 2019/1/27 10:03 PM
 * @copyright Copyright (c) 深圳市美约时代. (http://www.meiyue.me)
 */

use \Illuminate\Routing\UrlGenerator;

if ( !function_exists('urlPath') ) {
    /**
     * Generate a url for the application.
     *
     * @param  string $path
     * @param  mixed $parameters
     * @param  bool $secure
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function urlPath($path = null , $parameters = [] , $secure = null)
    {

        if ( is_null($path) ) {
            return app(UrlGenerator::class);
        }

        $prefix = getPrefix();
        $path = $prefix . '/' . $path;

        return app(UrlGenerator::class)->to($path , $parameters , $secure);
    }
}


if ( !function_exists('getPrefix') ) {
    /**
     * @return \Illuminate\Config\Repository|mixed|string
     */
    function getPrefix()
    {
        $action = getCurrentRoute();
        $prefix = $action->action['prefix'];

        return $prefix ? trim($prefix , "/") : config('constants.default_group');
    }
}

if ( !function_exists('getCurrentRoute') ) {
    /**
     * @return \Illuminate\Config\Repository|mixed|string
     */
    function getCurrentRoute()
    {
        return app('router')->getCurrentRoute();
    }
}

/**
 *  url add redirect http
 */
if ( !function_exists('redirectPath') ) {
    function redirectPath($to = null , $status = 302 , $headers = [] , $secure = null)
    {
        if ( is_null($to) ) {
            return app('redirect');
        }

        $prefix = getPrefix();
        $to = $prefix . '/' . $to;

        return app('redirect')->to($to , $status , $headers , $secure);
    }
}


