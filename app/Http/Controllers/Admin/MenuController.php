<?php
/**
 * MenuController.php
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@meiyue.me>
 * @ComputerAccount:costa92
 * createTime: 2019/1/27 8:56 PM
 * @copyright Copyright (c) 深圳市美约时代. (http://www.meiyue.me)
 */

namespace App\Http\Controllers\Admin;


use App\Http\Requests\MenuCreateRequest;
use App\Http\Requests\MenuEditRequest;
use App\Models\Menus;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MenuController extends BaseController
{
    /**
     * @var MenuService
     */
    protected $menuService;

    /**
     * MenuController constructor.
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['title'] = '博客菜单';
        $data['list'] = $this->menuService->queryList($request->toArray());

        return $this->view('index' , compact('data' , $data));
    }

    /**
     *
     */
    public function create()
    {
        $data['title'] = '博客菜单添加';

        return $this->view('create' , compact('data' , $data));

    }

    /**
     *  add save menu data method
     * @param MenuCreateRequest $request
     * @return \Illuminate\Foundation\Application|mixed
     */
    public function store(MenuCreateRequest $request)
    {
        $this->menuService->store($request);

        return redirectPath('menu');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data['title'] = '博客菜单修改';
        $data['info'] = $this->menuService->findFirstById($id);
        $data['list'] = $this->menuService->getListParent();

        return $this->view('edit' , compact('data' , $data));
    }

    /**
     * @param MenuEditRequest $request
     * @param $id
     */
    public function update(MenuEditRequest $request , $id)
    {
        $this->menuService->update($id , $request);

        return redirectPath('menu');
    }

    /**
     *
     */
    public function destroy($id)
    {
        return $this->menuService->destroy($id);
    }
}