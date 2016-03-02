<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('admin.online') }}</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('admin.search') }}...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header text-uppercase">{{ trans('admin.main-navigation') }}</li>
            <li class="{{isset($current_page) && $current_page == 'dashboard' ? 'active' : ''}} treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>{{ trans('admin.dashboard') }}</span>
                </a>
            </li>
            <li class="{{isset($current_page) && $current_page == 'categories' ? 'active' : ''}} treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>{{ trans('admin.sidebar.categories') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ admin_category() }}"><i class="fa fa-list-ul"></i> {{ trans('admin.sidebar.categories-list') }}</a></li>
                    <li><a href="#"><i class="fa fa-file-o"></i> {{ trans('admin.sidebar.categories-add') }}</a></li>
                </ul>
            </li>
            <li class="{{isset($current_page) && $current_page == 'products' ? 'active' : ''}} treeview">
                <a href="#">
                    <i class="fa fa-product-hunt"></i>
                    <span>{{ trans('admin.sidebar.products') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-list-ul"></i> {{ trans('admin.sidebar.products-list') }}</a></li>
                    <li><a href="#"><i class="fa fa-file-o"></i> {{ trans('admin.sidebar.products-add') }}</a></li>
                </ul>
            </li>
            <li class="{{isset($current_page) && $current_page == 'news' ? 'active' : ''}} treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span>{{ trans('admin.sidebar.news') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-list-ul"></i> {{ trans('admin.sidebar.products-list') }}</a></li>
                    <li><a href="#"><i class="fa fa-file-o"></i> {{ trans('admin.sidebar.products-add') }}</a></li>
                </ul>
            </li>
            <li class="{{isset($current_page) && $current_page == 'orders' ? 'active' : ''}} treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>{{ trans('admin.sidebar.orders') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o"> {{ trans('admin.sidebar.orders-all') }}</i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o"> {{ trans('admin.sidebar.orders-new') }}</i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{isset($current_page) && $current_page == 'configurations' ? 'active' : ''}} treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i>
                    <span>{{ trans('admin.sidebar.configurations') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-envelope"></i> {{ trans('admin.sidebar.configurations-email') }}</a>
                    </li>
                    <li><a href="#"><i
                                    class="fa fa-phone-square"></i> {{ trans('admin.sidebar.configurations-hotline') }}
                        </a></li>
                    <li><a href="#"><i class="fa fa-bar-chart"></i> {{ trans('admin.sidebar.configurations-ga') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>