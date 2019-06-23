@extends('admin.layouts.app')
@section('sidebar')
@show
@section('content-header')
    <h1> {{ $data['title'] }}
        <small>列表</small>
    </h1>
    @include('admin.crumbs.breadcrumb',[ 'title'=>  $data['title'] ])
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="{{ urlPath('menu/create') }}" class="btn btn-sm btn-primary"><i class="fa fa-save"></i>
                            新增</a>
                    </h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 60px">编号</th>
                            <th>名字</th>
                            <th>链接</th>
                            <th>排序</th>
                            <th>是否为外链</th>
                            <th>操作</th>
                        </tr>


                        @foreach ($data['list'] as $menu)
                            <tr>
                                <td>{{ $menu->id  }}</td>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->link }}</td>
                                <td>{{ $menu->sort }}</td>
                                <td>{{ $menu->is_external_link }}</td>
                                <td>
                                    <a href="{{ urlPath('menu/'.$menu->id.'/edit') }}"
                                       class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                        编辑</a>
                                    <a class="btn btn-sm btn-danger" data-toggle="modal"
                                       data-target="#myModal" onclick="values({{ $menu->id }})">
                                        <i class="fa fa-trash-o"></i>删除</a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>

                <!-- /.box-body -->
                @include('admin.crumbs.pages',['list'=>$data['list'] ])
            </div>
            <!-- /.box -->
        </div>
    </div>
    @include('admin.crumbs.delete',['url'=> urlPath('menu')])
@endsection
@push('scripts')
    <script src=" {{ asset('/static/dist/js/index.js') }}"></script>
    <script>
    </script>
@endpush
