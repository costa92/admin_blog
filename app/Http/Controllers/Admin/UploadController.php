<?php
/**
 * UploadController.php
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@meiyue.me>
 * @ComputerAccount:costa92
 * createTime: 2019/2/15 11:10 AM
 * @copyright Copyright (c) 深圳市美约时代. (http://www.meiyue.me)
 */

namespace App\Http\Controllers\Admin;


use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UploadController extends BaseController
{
    public $service;

    public function __construct()
    {
        $this->service = new UploadService();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'file' => 'required|max:4096|image' ,
        ]);

        if ( $validator->passes() ) {
            $result['data'] = $this->service->image($request);
            $result['code'] = 'success';

            return response()->json($result);
        }

        return response()->json(['message' => $validator->errors()->first()] , 400);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function images(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'image' => 'required|max:4096|image' ,
        ]);
        if ( $validator->passes() ) {
            $result['data'] = $this->service->image($request);
            $result['code'] = 'success';

            return response()->json($result);
        }

        return response()->json(['message' => $validator->errors()->first()] , 400);
    }
}