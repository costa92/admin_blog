<?php
/**
 * Upload.php
 *
 * Created by PhpStorm.
 * @author: longqiuhong<longqiuhong@meiyue.me>
 * @ComputerAccount:costa92
 * createTime: 2019/2/15 11:33 AM
 * @copyright Copyright (c) 深圳市美约时代. (http://www.meiyue.me)
 */

namespace App\Services;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadService extends BaseService
{
    /**
     * @param $request
     * @return array
     */
    public function image($request)
    {
        $file = $_FILES['file'];
        $fileName = $request->get('file_name');
        $fileName = $fileName ?: $file['name'];
        $fileName = $this->getFileName($fileName);
        $path = date("Y/m/d") . str_finish($request->get('folder') , '/') . $fileName;
        $content = File::get($file['tmp_name']);
        $drive = Storage::drive("oss");
        $drive->write($path , $content);
        $result = $drive->getMetadata($path);

        return ['path' => $path , 'url' => $result['oss-request-url']];
    }

    /**
     * @param $fileName
     */
    public function getFileName($fileName)
    {
        $symbol = '.';
        $arr = explode($symbol , $fileName);
        $name = array_shift($arr);
        $name = substr(md5($name . rand(1000 , 9999)) , 8 , 24);
        $ext = end($arr);

        return $name . $symbol . $ext;
    }

    public function images($request)
    {

    }
}