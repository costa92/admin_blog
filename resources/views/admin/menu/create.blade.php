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
                <form class="form-horizontal" method="post" action="{{ urlPath('menu') }}">
                    {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">菜单名字:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name" id="name" placeholder="菜单名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link" class="col-sm-2 control-label">菜单链接:</label>
                            <div class="col-sm-4">
                                <input type="text" name="link" class="form-control" id="link" placeholder="菜单链接">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">排序:</label>
                            <div class="col-sm-4">
                                <input type="text" name="sort" class="form-control" id="sort" placeholder="菜单链接">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="isExternalLink" class="col-sm-2 control-label">是否外链:</label>
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="isExternalLink" id="isExternalLink" value="1"
                                               checked="">
                                        是
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="isExternalLink" id="isExternalLink" value="2">
                                        否
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="parentId" class="col-sm-2 control-label">属于菜单:</label>
                            <div class="col-sm-4">
                                <select class="select2 form-control" name="parentId">
                                    <option value="0">/</option>
                                </select>
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
            $('.select2').select2()
        })
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('/static/select2/dist/css/select2.min.css') }} ">
@endpush