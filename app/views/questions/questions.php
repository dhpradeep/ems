<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= WEBSITE_TITLE ?> | Questions</title>

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

    <link rel="stylesheet" type="text/css" href="<?= BOWER_DIR ?>/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?= BOWER_DIR ?>/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <link rel="stylesheet" type="text/css" href="<?= BOWER_DIR ?>/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <style type="text/css">
        td.details-control {
            background: url('<?= IMAGE_DIR ?>/details_open.png') no-repeat center center;
            cursor: pointer;
        }
        tr.shown td.details-control {
            background: url('<?= IMAGE_DIR ?>//details_close.png') no-repeat center center;
        }
        .choices {
            padding: 5px 20px;
            font-weight: bold;
        }
        .answers {
            padding: 5px 20px;
        }
    </style>
</head>

<body>

    <div id="wrapper">
        <div id="target1"></div>
        <!-- Navigation -->
        <?php include(INCLUDES_DIR.DS.'nav-bar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Questions</h2>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>
                            <a href="<?= SITE_URL.DS.'home'.DS ?>dashboard">Dashboard</a>
                        </li>
                        <li class="active">
                            Questions
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
                            <a onclick="create_question()" class="btn btn-primary">Add Question</a>
                            <a onclick="refresh()" class="btn btn-info">Refresh</a>
                        </form>
                    </div>
                    <br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Primary Panel
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table id="questionTable" 
                                    class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="min-width: 60px">Extension</th>
                                            <th>Question</th>
                                            <th style="min-width: 100px">Categories</th>
                                            <th style="min-width: 50px">Level</th>
                                            <th style="min-width: 30px">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- /#page-wrapper -->

        <!-- modals -->
        <?php include(MODALS_DIR.DS.'questions.php'); ?>        

    </div>
    <!-- /#wrapper -->

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
    
    <!-- ckeditor -->
    <script src="<?= BOWER_DIR ?>/ckeditor/ckeditor.js"></script>

    <!-- Notify -->
    <script src="<?= BOWER_DIR ?>/notifyjs/dist/notify.js"></script>
    <script src="<?= BOWER_DIR ?>/notifyjs/dist/styles/bootstrap/notify-bootstrap.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= BOWER_DIR ?>/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js"></script>
    
    <!-- spinJS -->
    <script src="<?= BOWER_DIR ?>/spin.js/spin.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="<?= JS_DIR ?>/sb-admin-2.js"></script>
    <script src="<?= JS_DIR ?>/pages/questions.js" type="text/javascript"></script>

</body>

</html>
