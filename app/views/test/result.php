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
                        <form id="frmSearch" role="form">
                            <a onclick="refresh()" class="btn btn-info">Refresh</a>
                        </form>
                    </div>
                    <br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Overall Results
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                              <table id="resultTable" class="table table-bordered table-striped">
                                  <thead>
                                      <tr role="row">
                                            <th >
                                                Student Name
                                            </th>
                                            <th>
                                                Total given answers
                                            </th>
                                            <th>
                                                Percentage
                                            </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                        <tr>
                                            <td>Pradip Dhakal</td>
                                            <td>45/50</td>
                                            <td>60%</td>
                                        </tr>
                                  </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <br>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-inline form-padding">
                        <form id="frmSearch" role="form">
                            <a onclick="refresh()" class="btn btn-info">Refresh</a>
                        <!-- <div class="input-group"> <span class="input-group-addon">Filter: </span>
                                <select class="form-control">
                                    <option value="1">ALL</option>
                                    <option value="1">PHP</option>
                                    <option value="1">JAVA</option>
                                </select>
                        </div> -->
                        </form>
                    </div>
                    <br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Individual Results
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                              <table id="resultTable" class="table table-bordered table-striped paginated tablesorter">
                                  <thead>
                                      <tr role="row">
                                            <th >
                                                Question
                                            </th>
                                            <th>
                                                Given Answer
                                            </th>
                                            <th>
                                                Correct Answer
                                            </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                        <tr>
                                            <td>Full form of PHP ?</td>
                                            <td>HTML parser</td>
                                            <td>Hypertext Preprocessor</td>
                                        </tr>
                                  </tbody>
                              </table>
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
    <!-- Custom Theme JavaScript -->
    <script src="<?= JS_DIR ?>/sb-admin-2.js"></script>
     <!-- Custom JS -->
     <script src="<?= JS_DIR ?>/pages/result.js"></script>
</body>

</html>
