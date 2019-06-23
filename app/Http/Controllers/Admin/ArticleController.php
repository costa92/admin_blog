<?php
/**
 * ArticleController.php
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@meiyue.me>
 * @ComputerAccount:costa92
 * createTime: 2019/2/15 10:43 AM
 * @copyright Copyright (c) 深圳市美约时代. (http://www.meiyue.me)
 */

namespace App\Http\Controllers\Admin;


use App\Http\Requests\ArticleCreateRequest;
use App\Services\ArticleService;

class ArticleController extends BaseController
{

    /**
     * @var
     */
    protected $articleService;

    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        $this->articleService = new ArticleService();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = '文章列表';

        return $this->view('index' , compact('data' , $data));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['title'] = '文章添加';

        return $this->view('create' , compact('data' , $data));
    }

    /**
     * @param ArticleCreateRequest $request
     * @return \Illuminate\Foundation\Application|mixed
     */
    public function store(ArticleCreateRequest $request)
    {
        $this->articleService->store($request);

        return redirectPath('article');
    }
}