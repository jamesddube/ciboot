

        <?php
        //check if the session has already started, (on first login the session would have started
        //when initialising user session
        if(!isset($_SESSION['logged']))

        {
            session_start();
        }


        if($_SESSION['logged'] !== 'yes')
        {
            redirect(base_url("main/restricted" ));
            exit;
        }
        ?>

        <!-- begin #sidebar -->
        <div id="sidebar" class="sidebar sidebar-grid">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="<?php echo  base_url("assets/img/prof.jpg")?>" alt="" /></a>
                </div>
                <div class="info">
                    <?php
                    echo $username
                    ?>
                    <small>Front end developer</small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->

        <?php

        $nav = array(0,1,2,3,4,5,6,7,8);
        if($title == 'Dashboard')
        {
            $nav[0] = 'active';
        }
        if($title == 'Orders')
        {
            $nav[3] = 'active';
        }
        if($title == 'Business Intelligence')
        {
            $nav[5] = 'active';
        }
        ?>

        <ul class="nav">
        <li class="nav-header">Navigation</li>
        <li class="<?php echo $nav[0]?>">
            <a href="<?php echo base_url() ?>">

                <i class="fa fa-laptop"></i>
                <span>Dashboard</span>
            </a>

        </li>



        <li class="has-sub">
            <a href="javascript:;">
                <b class="caret pull-right"></b>
                <i class="fa fa-envelope"></i>
                <span>Customers</span>
            </a>
            <ul class="sub-menu">
                <li><a href="email_system.html">System Template</a></li>
                <li><a href="email_newsletter.html">Newsletter Template</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="javascript:;">
                <b class="caret pull-right"></b>
                <i class="fa fa-users"></i>
                <span>Users</span>
            </a>
            <ul class="sub-menu">
                <li><a href="chart-flot.html">Flot Chart</a></li>
                <li><a href="chart-morris.html">Morris Chart</a></li>
            </ul>
        </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-pencil-square-o"></i>
                    <span>Orders</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="<?php echo base_url('main/orders_add') ?>"> <span>Add Order <i class="fa fa-pencil-square-o"></i></span></a></li>
                    <li><a href="<?php echo base_url('main/orders') ?>"><i class="fa fa-pencil-square-o"></i> <span>Pending Orders </span></a></li>
                    <li><a href="<?php echo base_url('main/orders') ?>"><i class="fa fa-pencil-square-o"></i> <span>Processed Orders </span></a></li>

                </ul>
            </li>
        <li class="has-sub">
            <a href="javascript:;">
                <b class="caret pull-right"></b>
                <i class="fa fa-bar-chart-o"></i>
                <span>Stocks</span>
            </a>
            <ul class="sub-menu">
                <li><a href="gallery.html">Gallery v1</a></li>
                <li><a href="gallery_v2.html">Gallery v2</a></li>
            </ul>
        </li>
        <li class="<?php echo "has-sub"." ".$nav[5]?>">
            <a href="javascript:;">
                <b class="caret pull-right"></b>
                <i class="fa fa-empire"></i>
                <span>Business Intelligence</span>
            </a>
            <ul class="sub-menu">
                <li><a href="<?php echo base_url('main/map') ?>">Customer Map <i class="fa fa-map-marker text-theme m-l-5"></i></a></li>
                <li><a href="page_with_footer.html">Page with Footer</a></li>
                <li><a href="page_without_sidebar.html">Page without Sidebar</a></li>
                <li><a href="page_with_right_sidebar.html">Page with Right Sidebar</a></li>
                <li><a href="page_with_minified_sidebar.html">Page with Minified Sidebar</a></li>
                <li><a href="page_with_two_sidebar.html">Page with Two Sidebar</a></li>
                <li><a href="page_with_line_icons.html">Page with Line Icons</a></li>
                <li><a href="page_full_height.html">Full Height Content</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="javascript:;">
                <b class="caret pull-right"></b>
                <i class="fa fa-line-chart"></i>
                <span>Analysis</span>
            </a>
            <ul class="sub-menu">
                <li><a href="extra_timeline.html">Timeline</a></li>
                <li><a href="extra_coming_soon.html">Coming Soon Page</a></li>
                <li><a href="extra_search_results.html">Search Results</a></li>
                <li><a href="extra_invoice.html">Invoice</a></li>
                <li><a href="extra_404_error.html">404 Error Page</a></li>
            </ul>
        </li>


        <!-- begin sidebar minify button -->
        <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
        <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
        </div>
        <div class="sidebar-bg"></div>
        <!-- end #sidebar -->