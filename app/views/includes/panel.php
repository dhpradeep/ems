<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?= SITE_URL.DS.'home'.DS ?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#students"><i class="fa fa-table fa-fw"></i> Students<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= SITE_URL.DS.'student'.DS ?>add">Add New</a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL.DS.'student'.DS ?>all">Manage Students</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Manage<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= SITE_URL.DS.'question'.DS ?>category">Questions Category</a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL.DS.'question'.DS ?>all">Manage Questions</a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL.DS.'question'.DS ?>model">Question Model</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <!-- <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="flot.php">Exam Result</a>
                    </li>
                    <li>
                        <a href="grid.php">Passers</a>
                    </li>
                </ul>
            </li> -->
            <!-- <li>
                <a href="sms.php"><i class="fa fa-edit fa-fw"></i> SMS</a>
            </li> -->
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
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>