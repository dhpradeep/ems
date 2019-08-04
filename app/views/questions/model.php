<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?= WEBSITE_TITLE ?> | Model</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= BOWER_DIR ?>/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= BOWER_DIR ?>/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="<?= BOWER_DIR ?>/bootstrap3-dialog/dist/css/bootstrap-dialog.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= CSS_DIR ?>/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= BOWER_DIR ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include(INCLUDES_DIR.DS.'nav-bar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Program Details</h2>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>
                            <a href="<?= SITE_URL.DS.'home'.DS ?>dashboard">Dashboard</a>
                        </li>
                        <li>
                            <a href="<?= SITE_URL.DS.'question'.DS ?>model">Program</a>
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
                    <h1>Welcome Message: </h1><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ab possimus quia saepe aspernatur cum, neque omnis similique enim nulla. Nihil, dicta veniam. Rem dignissimos quod, enim adipisci commodi recusandae.</span>
                    <h1>Program Name: <strong>BCA</strong></h1>
                    <h1>Exam Duration: <strong>150 min</strong></h1>
                </div>
                <div class="col-lg-12">
                    <div class="float-right">
                        <form id="frmSearch" role="form">
                        <a onclick="create_model()" class="btn btn-primary">Add Model</a>
                        </form>
                    </div>
                    <br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            List of Models
                        </div>
                        <div id="target1"></div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting">
                                                S.N
                                            </th>
                                            <th class="sorting">
                                                Category
                                            </th>
                                            <th class="sorting">
                                                Level
                                            </th>
                                            <th class="sorting">
                                                Number of Questions
                                            </th>
                                            <th width="10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="searchable">
                                        <tr role="row">
                                            <td class="sorting">
                                                1
                                            </td>
                                            <td class="sorting">
                                                PHP
                                            </td>
                                            <td class="sorting">
                                                Basic
                                            </td>
                                            <td class="sorting">
                                                15
                                            </td>
                                            <td width="10%">
                                                <div class="text-right">
                                                    <a class="edit-model btn btn-success btn-xs" data-id="1">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="remove-model btn btn-danger btn-xs" data-id="1">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr role="row">
                                            <td class="sorting">
                                                2
                                            </td>
                                            <td class="sorting">
                                                JAVA
                                            </td>
                                            <td class="sorting">
                                                Intermediate
                                            </td>
                                            <td class="sorting">
                                                10
                                            </td>
                                            <td width="10%">
                                                <div class="text-right">
                                                    <a class="edit-model btn btn-success btn-xs" data-id="1">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="remove-model btn btn-danger btn-xs" data-id="1">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr role="row">
                                            <td class="sorting">
                                               3
                                            </td>
                                            <td class="sorting">
                                                PYTHON
                                            </td>
                                            <td class="sorting">
                                                Hard
                                            </td>
                                            <td class="sorting">
                                                5
                                            </td>
                                            <td width="10%">
                                                <div class="text-right">
                                                    <a class="edit-model btn btn-success btn-xs" data-id="1">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a class="remove-model btn btn-danger btn-xs" data-id="1">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <h1>Thank you Message: </h1><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ab possimus quia saepe aspernatur cum, neque omnis similique enim nulla. Nihil, dicta veniam. Rem dignissimos quod, enim adipisci commodi recusandae.</span>
                </div>
            </div>
            <!-- /.row -->
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- modals -->
    <?php include(MODALS_DIR.DS.'model.php'); ?>

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
    <script src="<?= JS_DIR ?>/pages/model.js" type="text/javascript"></script>
</body>

</html>