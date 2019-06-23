<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER' , 'local') ,

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD' , 's3') ,

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local' ,
            'root'   => storage_path('app') ,
        ] ,

        'public' => [
            'driver'     => 'local' ,
            'root'       => storage_path('app/public') ,
            'url'        => env('APP_URL') . '/storage' ,
            'visibility' => 'public' ,
        ] ,

        's3' => [
            'driver' => 's3' ,
            'key'    => env('AWS_ACCESS_KEY_ID') ,
            'secret' => env('AWS_SECRET_ACCESS_KEY') ,
            'region' => env('AWS_DEFAULT_REGION') ,
            'bucket' => env('AWS_BUCKET') ,
            'url'    => env('AWS_URL') ,
        ] ,

        'qiniu' => [
            'driver'     => 'qiniu' ,
            'domain'     => '' ,//你的七牛域名
            'access_key' => '' ,//AccessKey
            'secret_key' => '' ,//SecretKey
            'bucket'     => '' ,//Bucket名字
            'transport'  => 'http' ,//如果支持https，请填写https，如果不支持请填写http
        ] ,

        'oss' => [
            'driver'          => 'oss' ,
            'accessKeyId'     => 'LTAIzrCMSwh4gE89' ,
            'accessKeySecret' => 'BYJABakSEdvTwus2SYiqCUb3TKq1Dt' ,
            'endpoint'        => 'file.longqiuhong.com' ,
            'isCName'         => true ,
            'securityToken'   => null ,
            'bucket'          => 'costa-long' ,
            'timeout'         => '5184000' ,
            'connectTimeout'  => '10' ,
            'transport'       => 'http' ,//如果支持https，请填写https，如果不支持请填写http
            'max_keys'        => 1000 ,//max-keys用于限定此次返回object的最大数，如果不设定，默认为100，max-keys取值不能大于1000
        ] ,

    ] ,

];
