<?php
/**
 * RepositoriesServiceProvider.php
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@163.com>
 * @ComputerAccount:costa92
 * createTime: 2019/6/22 2:50 PM
 * @copyright Copyright (c) blog (http://www.costalong.com)
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}