<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= WEBSITE_TITLE ?> | Result</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= BOWER_DIR ?>/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?= BOWER_DIR ?>/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="<?= CSS_DIR ?>/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= CSS_DIR ?>/sb-admin-2.css" rel="stylesheet">
    <link href="<?= CSS_DIR ?>/style.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="<?= BOWER_DIR ?>/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?= BOWER_DIR ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">-->
</head>

<body>


    <div id="wrapper">
        <div id="target1"></div>
        <!-- Navigation -->
        <?php  include(INCLUDES_DIR.DS.'nav-bar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Results</h2>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>
                            <a href="<?= SITE_URL.DS.'home'.DS ?>dashboard">Dashboard</a>
                        </li>
                        <li class="active">
                            Result
                        </li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-inline form-padding">
                        <a class="btn btn-success" onclick="getAllData(1)">Export to Excel</a>
                        <a onclick="refresh()" class="btn btn-info">Refresh</a>
                        <div class="input-group col-md-3 col-sm-4 col-xs-6"> <span class="input-group-addon">Filter by Program: </span>
                            <select class="form-control" id="filterData" name="filterResult">
                                <option value="0" name="None"> None </option>
                                <?php
                                    foreach ($this->program as $value) {
                                ?>
                                        <option value="<?= $value['id'] ?>" name="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                                <?php
                                     } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Overall Results
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <div class="table-responsive">
                              <table id="resultTable" class="table table-bordered table-striped">
                                  <thead>
                                      <tr role="row">
                                            <th style="min-width: 150px">
                                                Student Name
                                            </th>
                                            <th style="min-width: 150px">
                                                Program
                                            </th>
                                            <th style="min-width: 100px">
                                                Right Answers
                                            </th>
                                            <th style="min-width: 100px">
                                                Percentage
                                            </th>
                                            <th style="min-width: 100px">
                                                Action
                                            </th>
                                      </tr>
                                  </thead>
                              </table>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
        <!-- /#page-wrapper -->
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

    <!-- Notify -->
    <script src="<?= BOWER_DIR ?>/notifyjs/dist/notify.js"></script>
    <script src="<?= BOWER_DIR ?>/notifyjs/dist/styles/bootstrap/notify-bootstrap.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= BOWER_DIR ?>/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js"></script>

    <!-- spinJS -->
    <script src="<?= BOWER_DIR ?>/spin.js/spin.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= JS_DIR ?>/sb-admin-2.js"></script> 
    <script src="<?= JS_DIR ?>/pages/result.js"></script>
     <!-- DataTables JavaScript -->
    <script src="<?= BOWER_DIR ?>/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= BOWER_DIR ?>/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <!-- spinJS -->
    <script src="<?= BOWER_DIR ?>/spin.js/spin.js"></script>
    <!-- Notify -->
    <script src="<?= BOWER_DIR ?>/notifyjs/dist/notify.js"></script>
    <script src="<?= BOWER_DIR ?>/notifyjs/dist/styles/bootstrap/notify-bootstrap.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= BOWER_DIR ?>/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= JS_DIR ?>/sb-admin-2.js"></script>


    <!--<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>-->


     <!-- Custom JS -->
     <script src="<?= JS_DIR ?>/pages/result.js"></script>
</body>

</html>
