<?php
/**
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@meiyue.me>
 * @ComputerAccount:costa92
 * createTime: 2019/1/28 11:10 AM
 * @copyright Copyright (c) 深圳市美约时代. (http://www.meiyue.me)
 */

// web admin
Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/' , 'IndexController@index');
    Route::resource('menu', 'MenuController');
    Route::resource('/system' , 'SystemController');
    Route::resource('/article' , 'ArticleController');
    Route::post('/upload','UploadController@index');
});