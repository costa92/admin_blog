@extends('home.layouts.app')

@section('title', '首页')

@section('content')
    <article>
        <!--lbox begin-->
        <div class="lbox">
            <!--banbox begin-->
        @include('home.crumbs.banbox')
        <!--banbox end-->
            <!--headline begin-->
        @include('home.crumbs.headline')
        <!--headline end-->

            <div class="clearblank"></div>

            <!-- news start -->
        @include('home.crumbs.news')
        <!-- new end -->

            <!--tab_box end-->
            <div class="zhuanti whitebg">
                <h2 class="htitle"><span class="hnav"><a href="/">原创模板</a><a href="/">古典</a><a href="/">清新</a><a
                                href="/">低调</a></span>精彩专题</h2>
                @include('home.crumbs.list.one')
            </div>
            <!-- ad index start -->
        @include('home.crumbs.ad',['data'=> ['location'=>1] ])
        <!-- ad index end -->

            <div class="whitebg bloglist">
                <h2 class="htitle">最新博文</h2>
                <ul>
                    <!--多图模式 置顶设计-->
                @include('home.crumbs.list.multiple')
                <!--单图-->
                @include('home.crumbs.list.single')
                <!--纯文字-->
                    @include('home.crumbs.list.character')
                </ul>
            </div>
            <!--bloglist end-->
        </div>
        <div class="rbox">
            @include('home.crumbs.card')
            @include('home.crumbs.notice')
            @include('home.crumbs.ranking')
            @include('home.crumbs.recommend')
            @include('home.crumbs.ad',['data'=> ['location'=>2] ])
            @include('home.crumbs.site')
            @include('home.crumbs.friendship')
        </div>
    </article>
@endsection