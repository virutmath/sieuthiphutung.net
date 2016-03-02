<nav class="navbar-default navbar-main-white yamm">
    <div class="container">
        <div class="collapse navbar-collapse navbar-collapse-no-pad" id="main-nav-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#"><span>Danh mục</span>Sản phẩm<i class="drop-caret" data-toggle="dropdown"></i></a>
                    <ul class="dropdown-menu dropdown-menu-category">
                        @foreach($list_categories_menu as $category_p)
                        <li>
                            <a href="#"><i class="{{$category_p->icon}} dropdown-menu-category-icon"></i>{{$category_p->name}}</a>
                            <div class="dropdown-menu-category-section">
                                <div class="dropdown-menu-category-section-inner">
                                    <div class="dropdown-menu-category-section-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="dropdown-menu-category-title">{{$category_p->name}}</h5>
                                                <ul class="dropdown-menu-category-list">
                                                    @foreach($category_p->child as $item)
                                                    <li><a href="#">{{$item->name}}</a>
                                                        <p>Nhà sản xuất phụ tùng hàng đầu đến từ Đức</p>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="dropdown-menu-category-title">Thương hiệu</h5>
                                                <ul class="dropdown-menu-category-list">
                                                    <li><a href="#">Pederal-mogul</a>

                                                        <p>Đẳng cấp sang trọng</p>
                                                    </li>
                                                    <li><a href="#">Valeo</a>

                                                        <p>Trường tồn mãi cùng thời gian</p>
                                                    </li>
                                                    <li><a href="#">Optibelt</a>

                                                        <p>Động cơ bền bỉ chất lượng Mỹ</p>
                                                    </li>
                                                    <li><a href="#">Lọc gió</a>

                                                        <p>Chất lượng Việt Nam</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <img class="dropdown-menu-category-section-theme-img" src="{{$category_p->image}}"
                                         alt="Image Alternative text" title="Image Title" style="right: -10px;"/>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown"><a class="navbar-item-top" href="#">Phụ tùng chính hãng</a>
                </li>
                <li class="dropdown"><a class="navbar-item-top" href="#">Dụng cụ cầm tay Bosch</a>
                </li>
                <li class="dropdown"><a class="navbar-item-top" href="#">Dầu mỡ nhờn</a>
                </li>
                <li class="dropdown"><a class="navbar-item-top" href="#">Vật tư sơn</a>
                </li>
                <li class="dropdown"><a class="navbar-item-top" href="#">Nội thất ô tô</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="navbar-item-top">Hệ thống đại lý</a>
                </li>
                <li><a href="#" class="navbar-item-top">Thanh toán</a>
                </li>
                <li><a href="#" class="navbar-item-top">Hỗ trợ khách hàng</a>
                </li>
            </ul>
        </div>
    </div>
</nav>