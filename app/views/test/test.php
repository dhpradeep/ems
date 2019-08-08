<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?= WEBSITE_TITLE ?> | Dashboard</title>
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
        <nav class="navbar navbar-default navbar-static-top sticky" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
                <a class="navbar-brand" href="#">
                    <?= WEBSITE_TITLE ?>
                </a>
            </div>
            <?php include(INCLUDES_DIR.DS.'navbar-top-links.php') ?>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="myTabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#testid1" aria-controls="testid1" role="tab" data-toggle="tab">{PHP}</a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#testid2" aria-controls="testid2" role="tab" data-toggle="tab">{Basic Mathmatics}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <!-- /.row -->
            <?php 
                if(!is_null($this->errors) && count($this->errors) > 0) {
                    foreach ($this->errors as $value) {
                        ?>
            <div class="row">
                <div>
                    <span style="font-size:22px;"><strong><?= $value ?></strong></span>
                </div>
            </div>
            <?php
                    }
                }else {
            ?>
                <!-- div for timer -->
                <div class='timer rounded-circle'>
                    <div id="time" class='time'></div>
                </div>

                <?php // var_dump($this->questions); ?>
                <br><br>
                <?php // var_dump($this->categories); ?>

                <div class="row">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="testid1">
                            <br><br>
                            <div class="col md-12 main">
                                <div class="page-header">
                                    <span style="font-size: 25px"><strong>1.</strong> What is the full form of PHP ?</span>
                                </div>
                                <fieldset>
                                    <div class="form-group" style="font-size: 18px;">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext PreProcessor<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext processor<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Html Parser<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Plain HTML processor<br>
                                                </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col md-12 main">
                                <div class="page-header">
                                    <span style="font-size: 25px"><strong>1.</strong> What is the full form of PHP ?</span>
                                </div>
                                <fieldset>
                                    <div class="form-group" style="font-size: 18px;">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext PreProcessor<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext processor<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Html Parser<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Plain HTML processor<br>
                                                </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col md-12 main">
                                <div class="page-header">
                                    <span style="font-size: 25px"><strong>1.</strong> What is the full form of PHP ?</span>
                                </div>
                                <fieldset>
                                    <div class="form-group" style="font-size: 18px;">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext PreProcessor<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext processor<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Html Parser<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Plain HTML processor<br>
                                                </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col md-12 main">
                                <div class="page-header">
                                    <span style="font-size: 25px"><strong>1.</strong> What is the full form of PHP ?</span>
                                </div>
                                <fieldset>
                                    <div class="form-group" style="font-size: 18px;">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext PreProcessor<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext processor<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Html Parser<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Plain HTML processor<br>
                                                </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col md-12 main">
                                <div class="page-header">
                                    <span style="font-size: 25px"><strong>1.</strong> What is the full form of PHP ?</span>
                                </div>
                                <fieldset>
                                    <div class="form-group" style="font-size: 18px;">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext PreProcessor<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext processor<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Html Parser<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Plain HTML processor<br>
                                                </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <br>
                            <div class="form-group col-sm-6 text-left">
                                <a href="#" class="btn btn-primary previous">Previous</a>
                            </div>
                            <div class="form-group col-sm-6 text-right">
                                <a href="#" class="btn btn-primary next">Next</a>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="testid2">
                            <br><br>
                            <div class="col md-12 main">
                                <div class="page-header">
                                    <span style="font-size: 25px"><strong>2.</strong> Math question 2</span>
                                </div>
                                <fieldset>
                                    <div class="form-group" style="font-size: 18px;">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext PreProcessor<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext processor<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Html Parser<br>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="radio radio-primary">
                                                    <label>
                                                    <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Plain HTML processor<br>
                                                </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <br>
                            <div class="form-group col-sm-6 text-left">
                                <a href="#" class="btn btn-primary previous">Previous</a>
                            </div>
                            <div class="form-group col-sm-6 text-right">
                                <a href="#" class="btn btn-primary next">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>

        <?php } ?>
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
        <?php if(!(!is_null($this->errors) && count($this->errors) > 0))
    { ?>
        <!-- Custom JavaScript -->
        <script src="<?= JS_DIR ?>/pages/test.js"></script>
        <?php } ?>
</body>
</html>