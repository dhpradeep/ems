<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= WEBSITE_TITLE ?> | Dashboard</title>
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
        <?php include(INCLUDES_DIR.DS.'nav-bar.php'); ?>

        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                    <div class="col-lg-12">
                                              
                        <h1 class="page-header">
                            Welcome to <small class="text-primary">AttandanceManagementApp</small>
                           
                        </h1>                
                    </div>
                </div>
                <!-- /.row -->

    <!-- on admin session -->
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <h4>About the system here</h4>
                        
                        <blockquote>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </blockquote>
                    </div>
                </div> -->

    <!-- on student session -->
                <div class="row">
                    <div class="col md-12">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, quisquam eaque. Quis culpa blanditiis veritatis repellat aut! Totam quas praesentium atque earum porro, nisi eos inventore. Ea voluptatem dolor neque. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum exercitationem aliquam velit dolorem! Porro blanditiis eligendi reiciendis, quaerat iure voluptatem, alias, minima reprehenderit maxime facere harum animi dolorem id rem! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore odit perspiciatis, nemo unde sit perferendis placeat itaque aperiam beatae non omnis earum numquam soluta sint eos porro ipsa alias. Aspernatur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci alias, hic aperiam eligendi assumenda facere eum earum quisquam provident aliquam expedita ea non eius perferendis voluptatibus, numquam ab unde atque. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse aut delectus illum corporis commodi eligendi iusto asperiores quaerat expedita quae aperiam omnis culpa placeat ipsa ipsum, similique ullam modi vitae?</p>
                    <p>&nbsp;</p>
                    <p><strong>Rules:</strong></p>
                    <ul>
                        <li>You can use pen and pencil only.</li>
                        <li>User don&#39;t have permission to use calculator.</li>
                        <li>user has only 30 min time for this test.</li>
                    </ul>
                    <p>&nbsp;</p>

                    <div class="col col-md-12 text-center">
                        <a href="<?= SITE_URL ?>/test"><button class="btn btn-success" type="button">Take Test</button></a>
                    </div>
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
                                <table id="resultHomeTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr role="row">
                                                <th >
                                                    Student Name
                                                </th>
                                                <th>
                                                    Total given answers
                                                </th>
                                                <th>
                                                    Marks
                                                </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>Pradip Dhakal</td>
                                                <td>45/50</td>
                                                <td>60/100</td>
                                            </tr>
                                            <tr>
                                                <td>Saroj Tripathi</td>
                                                <td>47/50</td>
                                                <td>70/100</td>
                                            </tr>
                                    </tbody>
                                </table>
                                </div>
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
    <!-- Custom Theme JavaScript -->
    <script src="<?= JS_DIR ?>/sb-admin-2.js"></script>
</body>

</html>
