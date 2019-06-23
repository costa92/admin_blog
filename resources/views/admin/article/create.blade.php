@extends('admin.layouts.app')
@section('sidebar')
@show
@section('content-header')
    <h1> {{ $data['title'] }}
        <small>添加</small>
    </h1>
    @include('admin.crumbs.breadcrumb',[ 'title'=>  $data['title'] ])
@endsection

@section('content')
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    {{--<h3 class="box-title">Horizontal Form</h3>--}}
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ urlPath('article') }}">
                    {!! csrf_field() !!}
                    <div class="box-body">
                        @include('admin.crumbs.forms.input',['name'=>'标题','key'=>'title','value' => ''])
                        @include('admin.crumbs.forms.textarea',['name'=>'描述','key'=>'describe','value' => ''])
                        @include('admin.crumbs.uploads.single',['name'=>'封面图片','key'=>'shareImg','value' => ''])

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">请输入正文:</label>
                            <div class="col-sm-10 editor">
                                <textarea id="editor" name="content" placeholder="请输入正文"></textarea>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary col-md-offset-2">提交</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src=" {{ asset('/static/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();

            new Smartmd({
                el: "#editor",
                height: "80vh",
                autoSave: {
                    // uuid: 1,
                    delay: 400
                },
                isFullScreen: false,
                isPreviewActive: false,
                image: {
                    // your UploadController route
                    uploadPath: '/admin/upload',
                    type: ['jpeg', 'png', 'bmp', 'gif', 'jpg'],
                    // fileSize (kb)
                    maxSize: 4096,
                },
                toolbarConfig: {
                    guide: {
                        action: "http://www.longqiuhong.com",
                        className: "fa fa-question-circle",
                        title: "Markdown Guide"
                    }
                },
                uploads: {
                    type: ['jpeg', 'png', 'bmp', 'gif', 'jpg'],
                    maxSize: 1000,
                    typeError: 'Image support format {type}.',
                    sizeError: 'Image size is more than {maxSize} kb.',
                    serverError: 'Upload failed on {msg}'
                }
            });
        })


    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('/static/select2/dist/css/select2.min.css') }} ">
    @include('vendor.smartmd.head')
    <style>
        .smartmd__render {
            z-index: 999 !important;
        }
    </style>
@endpush
