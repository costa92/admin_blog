<?php
/**
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@meiyue.me>
 * @ComputerAccount:costa92
 * createTime: 2019/3/9 12:32 PM
 * @copyright Copyright (c) 深圳市美约时代. (http://www.meiyue.me)
 */

namespace App\Services;

use App\Models\Articles;
use Illuminate\Support\Facades\Log;

class   ArticleService extends BaseService
{
    public function __construct()
    {

    }


    /**
     * @param $request
     */
    public function store($request)
    {
        $article = new Articles();
        $article->title = $request->title;
        $article->describe = $request->describe;
        $article->content = $request->content;
        $article->user_id = 1;
        if ( $article->save() == false ) {
            Log::error("add  article is fail");
        }

        return $article;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findFirstById($id)
    {
        return Articles::where('id' , $id)->first();
    }
}