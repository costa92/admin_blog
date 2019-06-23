<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('/static/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ urlPath('/')  }}">
                    <i class="fa fa-dashboard"></i> <span>控制面板</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li>
                <a href="{{ urlPath('menu')  }}">
                    <i class="fa fa-navicon"></i>
                    <span>博客菜单</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text"></i> <span>文章管理</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ urlPath('/')  }}"><i class="fa fa-columns"></i> 文章分类</a></li>
                    <li><a href="{{ urlPath('article')  }}"><i class="fa fa-file-text-o"></i> 文章列表</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{ urlPath('system')  }}">
                    <i class="fa fa-gears"></i>
                    <span>系统设置</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>