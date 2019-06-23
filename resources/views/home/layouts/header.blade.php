<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>CostaLong - @yield('title') </title>
    <meta name="keywords" content="blog"/>
    <meta name="description" content="blog"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/home/css/base.css')  }}" rel="stylesheet">
    <link href="{{ asset('/home/css/m.css')  }}" rel="stylesheet">
    <script src="{{ asset('/home/js/jquery-1.8.3.min.js')  }}"></script>
    <script src="{{ asset('/home/js/comm.js')  }}"></script>
    <!--[if lt IE 9]>
    <script src="{{ asset('/home/js/modernizr.js') }} "></script>
    <![endif]-->
    <link rel="shortcut icon" href="/favicon.ico?v=1.2.4"/>
</head>
<body>

<!--top begin-->
<header id="header">
    <div class="navbox">
        <h2 id="mnavh"><span class="navicon"></span></h2>
        <div class="logo"><a href="/">秋洪Blog</a></div>
        <nav>
            <ul id="starlist">
                @include('home.layouts.menu')
            </ul>
        </nav>
        <div class="searchico"></div>
    </div>
</header>
<div class="searchbox">
    <div class="search">
        <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
            <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字词" style="color: rgb(153, 153, 153);"
                   onfocus="if(value=='请输入关键字词'){this.style.color='#000';value=''}"
                   onblur="if(value==''){this.style.color='#999';value='请输入关键字词'}" type="text">
            <input name="show" value="title" type="hidden">
            <input name="tempid" value="1" type="hidden">
            <input name="tbname" value="news" type="hidden">
            <input name="Submit" class="input_submit" value="搜索" type="submit">
        </form>
    </div>
    <div class="searchclose"></div>
</div>
<!--top end-->
