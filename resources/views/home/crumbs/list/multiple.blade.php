<li>
    <h3 class="blogtitle"><a href="/" target="_blank"><b>【顶】</b>别让这些闹心的套路，毁了你的网页设计!</a></h3>
    <span class="bplist">
        <a href="/">
            <img src="{{ asset('/home/images/b02.jpg') }}" alt=""></a> <a href="/">
            <img src=" {{ asset('/home/images/b03.jpg') }}" alt=""></a> <a href="/">
            <img src="{{ asset('/home/images/b04.jpg') }}" alt=""> </a><a href="/">
            <img src="{{ asset('/home/images/b05.jpg') }}" alt="">
        </a>
    </span>
    <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
        来判断，输出。思路已打开，样式调用就可以多样化啦！...
    </p>
    @include('home.crumbs.author')
</li>