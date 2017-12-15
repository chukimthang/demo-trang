<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="#"></i>Loại sản phẩm<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{!! route('admin.type_products.index') !!}">
                            Danh sách loại sản phẩm</a>
                    </li>
                    <li>
                        <a href="{!! route('admin.type_products.create') !!}">
                            Thêm loại sản phẩm</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"></i> Sản phẩm<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/product/list">Danh sách sản phẩm</a>
                    </li>
                    <li>
                        <a href="admin/product/add">Thêm sản phẩm</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{!! route('admin.users.index') !!}">Tài khoản</span></a>
            </li>

            <li>
                <a href="{{ route('admin.news.index') }}">Tin tức<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.news.index') }}">Danh sách tin tức</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.news.create') }}">Thêm tin tức</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li><a href="{{ route('admin.bills.index') }}">Hóa đơn</a></li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
