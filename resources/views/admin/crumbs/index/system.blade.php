<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">系统配置</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                <label>操作系统:</label>
                {{ PHP_OS }}
            </div>
            <div class="form-group">
                <label>主机名:</label>
                {{ $_SERVER['SERVER_NAME'] }}
            </div>
            <div class="form-group">
                <label>服务器时间:</label>
                {{ date("Y年m月d日 H:i:s")  }}
            </div>
            <div class="form-group">
                <label>运行环境:</label>
                {{ $_SERVER["SERVER_SOFTWARE"]  }}
            </div>
            <div class="form-group">
                <label>PHP版本:</label>
                {{ phpversion() }}
            </div>
            <div class="form-group">
                <label>PHP运行方式:</label>
                {{ PHP_SAPI }}
            </div>
            <div class="form-group">
                <label>上传附件限制:</label>
                {{ ini_get('upload_max_filesize') }}
            </div>
            <div class="form-group">
                <label>执行时间限制:</label>
                {{ ini_get('max_execution_time') }} 秒
            </div>
            <div class="form-group">
                <label>服务器域名/IP:</label>
                {{ $_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]' }}
            </div>
            <div class="form-group">
                <label>用户的IP地址:</label>
                {{ $_SERVER['REMOTE_ADDR'] }}
            </div>
            <div class="form-group">
                <label>ZEND版本:</label>
                {{ zend_version() }}
            </div>
            <div class="form-group">
                <label>网站文档目录:</label>
                {{ $_SERVER["DOCUMENT_ROOT"] }}
            </div>
        </div>
    </div>
</div>