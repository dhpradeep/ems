<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= WEBSITE_TITLE ?> | Students</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= BOWER_DIR ?>/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= BOWER_DIR ?>/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?= BOWER_DIR ?>/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?= BOWER_DIR ?>/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="<?= BOWER_DIR ?>/bootstrap3-dialog/dist/css/bootstrap-dialog.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= CSS_DIR ?>/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= BOWER_DIR ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">
        <div id="target1"></div>
        <!-- Navigation -->
        <?php include(INCLUDES_DIR.DS.'nav-bar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Students</h2>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> 
                            <a href="<?= SITE_URL.DS.'home'.DS ?>dashboard">Dashboard</a>
                        </li>
                        <li class="active">
                            Students
                        </li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-inline form-padding">
                        <form id="frmSearch" role="form">
                            <a onclick="create_student()" class="btn btn-primary">Add Student</a>
                            <!-- <a onclick="create_student_bulk()" class="btn btn-primary">Add Student in Bulk</a> -->
                            <!-- <a class="btn btn-primary" disabled="true">Add Student in Bulk</a> -->
                            <a onclick="refresh()" class="btn btn-info">Refresh</a>
                            <div class="input-group"> <span class="input-group-addon">Search: </span>
                                <input id="filter" type="text" class="form-control" placeholder="Type here...">
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            List of Students
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover paginated tablesorter" id="tbl_students">
                                    <thead>
                                        <tr>
                                            <th>Fullname</th>
                                            <th>Mobile No</th>
                                            <th>Gender</th>
                                            <th>Birthday</th>
                                            <th>Pref. Course</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="searchable"></tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    <!-- jQuery -->
    <script src="<?= BOWER_DIR ?>/jquery/dist/jquery.min.js"></script>

    <!-- jQuery tablesorter-->
    <script src="<?= BOWER_DIR ?>/jquery.tablesorter/dist/js/jquery.tablesorter.js"></script>
    <script src="<?= BOWER_DIR ?>/jquery.tablesorter/dist/js/jquery.tablesorter.widgets.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= BOWER_DIR ?>/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= BOWER_DIR ?>/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?= BOWER_DIR ?>/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= BOWER_DIR ?>/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Notify -->
    <script src="<?= BOWER_DIR ?>/notifyjs/dist/notify.js"></script>
    <script src="<?= BOWER_DIR ?>/notifyjs/dist/styles/bootstrap/notify-bootstrap.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= BOWER_DIR ?>/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js"></script>

    <!-- spinJS -->
    <script src="<?= BOWER_DIR ?>/spin.js/spin.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= JS_DIR ?>/sb-admin-2.js"></script>
    <script src="<?= JS_DIR ?>/pages/student.js"></script>


</body>

</html>