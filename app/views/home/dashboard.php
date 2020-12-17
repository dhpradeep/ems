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
    <link href="<?= CSS_DIR ?>/style.css" rel="stylesheet">
    
    <!-- Morris Charts CSS -->
    <link href="<?= BOWER_DIR ?>/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?= BOWER_DIR ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>


    <div id="wrapper">
        <!-- Navigation -->
        <?php include(INCLUDES_DIR.DS.'nav-bar.php'); ?>

        <div id="page-wrapper" <?php if(!(Session::isLoggedIn(1) || Session::isLoggedIn(2))) echo 'class = "page-wrapperUser"'?>>
            <!-- /.row -->
            <div class="row">
                    <div class="col-lg-12">
                                              
                        <h1 class="page-header">
                        <small class="text-primary text-bold"><b>WELCOME TO <?= WEBSITE_TITLE ?></b></small>
                           
                        </h1>                
                    </div>
                </div>
                <!-- /.row -->

    <!-- on student session -->
                <?php 
                    if(!is_null($this->errors) &&count($this->errors) > 0) {
                        foreach ($this->errors as $value) {
                            ?>
                            <div class="row errors-information">
                                <div>
                                    <span style="font-size:14px;"><strong><?= $value ?></strong></span>
                                </div>
                            </div>
                        <?php
                        }
                    }else {

                ?>
                <div class="row student-information">
                    <div>
                        <span style="font-size:16px;">Name of Student : <strong><?= strtoupper(Session::getSession('uname')); ?></strong></span>
                    </div>
                </div>
                <?php
                    
                    if(count($this->programs)>0) {
                        foreach($this->programs as $program) {

                ?>
                <div class="row student-information">
                    <div>
                        <span style="font-size:16px;">Exam : <strong><?= $program['name'] ?></strong></span>
                    </div>
                </div>
                <div class="row brand-information-for-exam">
                <?php if($program['completed'] != 2)  { ?>
                    <div class="col md-12">
                        <p><?= htmlspecialchars_decode($program['welcome']) ?></p><br><br>
                        <div class="text-left">
                            <a href="#">
                                <button data-id="<?= $program['id'] ?>" class="btn btn-success" type="button" id="take-test-by-student">
                                <?php if($program['completed'] == 1) echo "Continue test"; else echo "Take test"; ?>
                                </button>
                            </a>
                        </div>
                    </div>
                
                    <?php } else { ?>
                        <div class="col md-12">
                        <p><b> Already submitted! </b></p><br><br>
                        </div>
                    <?php
                    } ?>
                </div>
            <br>
            <?php 
                        }
                    }
        
            } ?>
                <!-- Brand info -->
                <div class="row brand-information">
                    <div class="col-lg-12">
                        <h4>About the system here</h4>
                        
                        <blockquote>
                            This is <?= WEBSITE_TITLE." Version : ".VERSION ?><br><br>
                          <p>Developed by <strong><a target="blank" href = "<?= BRAND_WEBSITE ?>" ><?= BRAND_NAME ?></a></strong></p>
                        </blockquote>
                    </div>
                </div>
            </div>
        <br><br>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?= BOWER_DIR ?>/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= BOWER_DIR ?>/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= BOWER_DIR ?>/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= BOWER_DIR ?>/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= JS_DIR ?>/sb-admin-2.js"></script>
    <script src="<?= JS_DIR ?>/script.js"></script>
</body>

</html>
