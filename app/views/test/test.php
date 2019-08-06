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
        <?php  include(INCLUDES_DIR.DS.'nav-bar.php'); ?>

        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <br><br>
            </div>

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
            <div class="row">
                <div>
                    <span style="font-size:22px;">Category: <strong>PHP</strong></span>
                </div>
            </div>

            <!-- div for timer -->
            <div class='timer rounded-circle'>
                <div id="time" class='time'>
                    
                </div>
            </div>


                <!-- /.row -->
                <div class="row">
                    <div class="col md-12 main">
                        <div id="div1" class="question">
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
                        <div id="div1" class="question">
                            <div class="page-header">
                                <span style="font-size: 25px"><strong>2.</strong> What is the full form of HTML ?</span>
                            </div>
                        <fieldset>
                            <div class="form-group" style="font-size: 18px;">
                                <div class="col-lg-12">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext Markup Language<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hyperlink Language<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext Method<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">I dont know<br>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col md-12 main">
                        <div id="div1" class="question">
                            <div class="page-header">
                                <span style="font-size: 25px"><strong>2.</strong> What is the full form of HTML ?</span>
                            </div>
                        <fieldset>
                            <div class="form-group" style="font-size: 18px;">
                                <div class="col-lg-12">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext Markup Language<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hyperlink Language<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext Method<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">I dont know<br>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col md-12 main">
                        <div id="div1" class="question">
                            <div class="page-header">
                                <span style="font-size: 25px"><strong>2.</strong> What is the full form of HTML ?</span>
                            </div>
                        <fieldset>
                            <div class="form-group" style="font-size: 18px;">
                                <div class="col-lg-12">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext Markup Language<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hyperlink Language<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext Method<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">I dont know<br>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col md-12 main">
                        <div id="div1" class="question">
                            <div class="page-header">
                                <span style="font-size: 25px"><strong>2.</strong> What is the full form of HTML ?</span>
                            </div>
                        <fieldset>
                            <div class="form-group" style="font-size: 18px;">
                                <div class="col-lg-12">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext Markup Language<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hyperlink Language<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext Method<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">I dont know<br>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col md-12 main">
                        <div id="div1" class="question">
                            <div class="page-header">
                                <span style="font-size: 25px"><strong>2.</strong> What is the full form of HTML ?</span>
                            </div>
                        <fieldset>
                            <div class="form-group" style="font-size: 18px;">
                                <div class="col-lg-12">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext Markup Language<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hyperlink Language<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext Method<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">I dont know<br>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col md-12 main">
                        <div id="div1" class="question">
                            <div class="page-header">
                                <span style="font-size: 25px"><strong>2.</strong> What is the full form of HTML ?</span>
                            </div>
                        <fieldset>
                            <div class="form-group" style="font-size: 18px;">
                                <div class="col-lg-12">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext Markup Language<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hyperlink Language<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">Hypertext Method<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="radio radio-primary">
                                            <label>
                                                <input type="radio" name="ans1" data-id="1" data-choice="1"  value="1">I dont know<br>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                <section>
                <div class="col col-md-12 text-center" style="margin-bottom: 20px">
                    <br><br>
                    <button type="button" id="prev" class="btn btn-success" disabled>Prev</button>
                    <button type="button" id="next" class="btn btn-success">Next</button>
                    <button type="submit" class="btn btn-warning" name="submit">Submit Answer</button>
                </div>
                </section>
            <?php } ?>
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
    <?php if(!(!is_null($this->errors) && count($this->errors) > 0))
    { ?>
     <!-- Custom JavaScript -->
     <script src="<?= JS_DIR ?>/pages/test.js"></script>
    <?php } ?>
</body>

</html>
