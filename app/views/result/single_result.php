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
</head>

<body>


    <div id="wrapper">
        <!-- Navigation -->
        <?php  include(INCLUDES_DIR.DS.'nav-bar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Results</h2>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>
                            <a href="<?= SITE_URL?>/home/dashboard">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-dashboard"></i>
                            <a href="<?= SITE_URL?>/result/all">Result</a>
                        </li>
                        <li class="active">
                            Details
                        </li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-inline form-padding">
                        <form id="frmSearch" role="form">
                            <input type="hidden" data-id="<?= $this->examId ?>" id="examId">
                            <a class="btn btn-success" id="exportBtn">Export to Excel</a>
                            <a onclick="refresh()" class="btn btn-info">Refresh</a>
                            <div class="input-group col-md-3 col-sm-4 col-xs-6"> <span class="input-group-addon">Filter by Category: </span>
                                <select class="form-control" id="filterData" name="filterResult">
                                    <option value="0" name="None"> None </option>
                                    <?php
                                        foreach ($this->category as $value) {
                                    ?>
                                            <option value="<?= $value['id'] ?>" name="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                                    <?php
                                         } 
                                    ?>
                                </select>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <span><?= $this->message['content'] ?></span>
                            <span style="margin-left: 2em;"> Status : <b><?= $this->status ?></b></span>
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <div class="table-responsive" id="toExport">
                              <table id="resultDetailTable" class="table table-bordered table-striped paginated tablesorter">
                                  <thead>
                                      <tr role="row">
                                            <th style="min-width: 250px;">
                                                Question
                                            </th>
                                            <th style="min-width: 250px;">
                                                Given Answer
                                            </th>
                                            <th style="min-width: 250px;">
                                                Correct Answer
                                            </th>
                                            <th style="min-width: 70px;">
                                                Remark
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
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= BOWER_DIR ?>/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= BOWER_DIR ?>/metisMenu/dist/metisMenu.min.js"></script>
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
     <!-- Custom JS -->
     <script src="<?= JS_DIR ?>/pages/result_details.js"></script>
</body>

</html>
