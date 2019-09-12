
<div class="navbar-default sidebar" role="navigation" style="top: 0px;">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?= SITE_URL.DS.'home'.DS ?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#students"><i class="fa fa-table fa-fw"></i> Students<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= SITE_URL.DS.'student'.DS ?>all">Manage Students</a>
                    </li>
                </ul>
            </li>
            <?php if(Session::isLoggedIn(1)) { ?>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Manage<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= SITE_URL.DS.'question'.DS ?>program">Manage Programs</a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL.DS.'question'.DS ?>category">Manage Categories</a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL.DS.'question'.DS ?>all">Manage Questions</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Settings<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= SITE_URL.DS.'user'.DS ?>users">Manage Users</a>
                    </li>
                    <!-- <li>
                        <a href="settings.php">Manage Exam Timer</a>
                    </li> -->
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= SITE_URL?>/result/all">View Result</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        <?php } ?>
        <!-- Student session -->
         <!--   <li>
                <a href="#"><i class="fa fa-check fa-fw"></i> Test<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= SITE_URL?>/test">Take Test</a>
                    </li>
                </ul>
            </li>-->
        <!-- end of student session -->
        
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
