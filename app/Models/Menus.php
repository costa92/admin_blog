<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menus extends Model
{
    use SoftDeletes;


    /**
     * @var string
     */
    protected $table = 'menus';

    /**
     * @var array
     */
    protected $fillable = [
        'name' , 'link' , 'sort' , 'is_external_link' , 'parent_id' ,
    ];

    /**
     *  字段默认
     * @var array
     */
    protected $attributes = [
        'sort'             => 0 ,
        'is_external_link' => 1 ,
        'parent_id'        => 0 ,
    ];


    protected $casts = [
        'sort'             => 'int' ,
        'is_external_link' => 'int' ,
        'parent_id' => 'int' ,
    ];
}
