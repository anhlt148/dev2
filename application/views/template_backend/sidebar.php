<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <!-- search -->
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                </div>
            </li>
            <!-- Dashboard -->
            <li>
                <a href="<?php echo base_url().'admin/dashboard'?>" class="<?php (isset($dashboard)?"active":"")?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <!-- Loại danh mục -->
            <li>
                <a href="<?php echo base_url().'admin_category_type/grid'?>" class="<?php (isset($category_type)?"active":"")?>"><i class="fa fa-bars fa-fw"></i> Quản lý loại danh mục</a>
            </li>
            <!-- Danh mục -->
            <li>
                <a href="<?php echo base_url().'admin_category/grid'?>" class="<?php (isset($category)?"active":"")?>"><i class="fa fa-list fa-fw"></i> Quản lý danh mục</a>
            </li>
            <!-- user -->
            <li>
                <a href="<?php echo base_url().'admin_users'?>" class="<?php (isset($users)?"active":"")?>"><i class="fa fa-user fa-fw"></i> Quản lý tài khoản</a>
            </li>
            <!-- member -->
            <li>
                <a href="<?php echo base_url().'admin_members'?>" class="<?php (isset($members)?"active":"")?>"><i class="fa fa-users fa-fw"></i> Quản lý thành viên</a>
            </li>
            <!-- khách hàng -->
            <li>
                <a href="<?php echo base_url().'admin_customers'?>" class="<?php (isset($customers)?"active":"")?>"><i class="fa fa-address-book-o fa-fw"></i> Quản lý khách hàng</a>
            </li>
            <!-- sản phẩm -->
            <li>
                <a href="<?php echo base_url().'admin_products'?>" class="<?php (isset($products)?"active":"")?>"><i class="fa fa-product-hunt fa-fw"></i> Quản lý sản phẩm</a>
            </li>
            <!-- đơn hàng -->
            <li>
                <a href="<?php echo base_url().'admin_orders'?>" class="<?php (isset($orders)?"active":"")?>"><i class="fa fa-sticky-note fa-fw"></i> Quản lý đơn hàng</a>
            </li>
            <!-- hình ảnh -->
            <li>
                <a href="<?php echo base_url().'admin_images'?>" class="<?php (isset($images)?"active":"")?>"><i class="fa fa-picture-o fa-fw"></i> Quản lý hình ảnh</a>
            </li>
            <!-- Charts -->
            <li>
                <a href="#" class="<?php (isset($Charts)?"active":"")?>"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="flot.html" class="<?php (isset($flot_Charts)?"active":"")?>">Flot Charts</a>
                    </li>
                    <li>
                        <a href="morris.html" class="<?php (isset($morris_Charts)?"active":"")?>">Morris.js Charts</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <!-- Tables -->
            <li>
                <a href="tables.html" class="<?php (isset($tables)?"active":"")?>"><i class="fa fa-table fa-fw"></i> Tables</a>
            </li>
            <!-- Forms -->
            <li>
                <a href="forms.html" class="<?php (isset($forms)?"active":"")?>"><i class="fa fa-edit fa-fw"></i> Forms</a>
            </li>
            <!-- UI Elements -->
            <li class="<?php (isset($elements)?"active":"")?>">
                <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="panels-wells.html" class="<?php (isset($panels)?"active":"")?>">Panels and Wells</a>
                    </li>
                    <li>
                        <a href="buttons.html" class="<?php (isset($buttons)?"active":"")?>">Buttons</a>
                    </li>
                    <li>
                        <a href="notifications.html" class="<?php (isset($notifications)?"active":"")?>">Notifications</a>
                    </li>
                    <li>
                        <a href="typography.html" class="<?php (isset($typography)?"active":"")?>">Typography</a>
                    </li>
                    <li>
                        <a href="icons.html" class="<?php (isset($icons)?"active":"")?>"> Icons</a>
                    </li>
                    <li>
                        <a href="grid.html"  class="<?php (isset($grid)?"active":"")?>">Grid</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <!-- Multi-Level Dropdown -->
            <li>
                <a href="#" class="<?php (isset($dropdown)?"active":"")?>"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#" class="<?php (isset($item)?"active":"")?>">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#" class="<?php (isset($third)?"active":"")?>">Third Level <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#" class="<?php (isset($third)?"active":"")?>">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#" class="<?php (isset($third)?"active":"")?>">Third Level Item</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <!-- Sample Pages -->
            <li>
                <a href="#" class="<?php (isset($sample_pages)?"active":"")?>"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="blank.html" class="<?php (isset($blank_page)?"active":"")?>">Blank Page</a>
                    </li>
                    <li>
                        <a href="login.html" class="<?php (isset($login_page)?"active":"")?>">Login Page</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>

    </div>
</div>