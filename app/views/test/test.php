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

            <?php
                if(!is_null($this->questions) && !is_null($this->categories) && count($this->errors) == 0) {
            ?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="myTabs" role="tablist">
                        <?php
                            $i = 0;
                            $totalQuestions = 0;
                            foreach ($this->questions as $key => $value) {
                            $totalQuestions += count($value);
                        ?>
                        <li role="presentation" class="<?php echo ($i==0) ? "active" : ""; ?>">
                            <a href="#category<?= $key ?>" class="<?php echo ($i==0) ? "" : ""; $i++ ?>"  aria-controls="category<?= $key ?>" role="tab" data-toggle="tab">
                                <?php  echo (isset($this->categories[$key])) ? $this->categories[$key][0]['name'] : "Unknown"; ?> (<span data-val="0" id = "answeredCategory<?= $key ?>">0</span>/<span><?= count($value) ?>)</span>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
                }
            ?>
        </nav>

        <div id="page-wrapper">
            <?php 
                if(is_null($this->errors) || count($this->errors) <= 0) {
            ?>
                <div class="row mySticky">
                    <div class="mydiv navbtn prevbtn">
                        <div class="cur previous">Previous</div>
                    </div>
                        <!-- <button type="submit"  name="test_submit" class="btn btn-success">Previous</button> -->
                    <div class="mydiv">
                        <div class="row" style="margin: 0px 0px;">
                            <div id="time" class="col col-md-6"> Time </div>
                            <div id="questionsRecord" class="col col-md-6">
                                (<span id="answered" data-val="0" >0</span>/<span><?= $totalQuestions ?>)</span>
                            </div>
                        </div>
                    </div>    
                    <div class="mydiv text-right navbtn nextbtn">
                        <div class="cur next">Next</div>
                        <!-- <button type="button" class="btn btn-success">Next</button>
                        <button type="button" class="btn btn-success">Submit</button> -->
                    </div>
                </div>
            <!-- /.row -->
                <?php
                    }
                    if(!is_null($this->errors) && count($this->errors) > 0) {
                    echo "<br><br><br>";
                    foreach ($this->errors as $value) {
                                ?>
                    <div class="row">
                        <div>
                            <span style="font-size:22px;"><strong><?= $value ?></strong></span>
                        </div>
                    </div>
                    <?php }?>
                    <div class="row">
                        <div>
                            <span style="font-size:22px;"><strong><?= (!is_null($this->thanks)) ? $this->thanks : "" ?></strong></span>
                        </div>
                    </div>

               <?php }else{ ?>

            <!-- div for timer -->
            <!-- <div class='timer rounded-circle'>
                <div id="time" class='time'></div>
            </div> -->

            <div id="timeTrack" data-time="<?= $this->remainingTime ?>" data-exam = "<?= $this->examId ?>"></div>

                <div class="row">
                    <div class="tab-content">                        
                        <?php
                        if(!is_null($this->questions) && !is_null($this->categories) && count($this->errors) == 0) {
                            $i = 0;
                            $questionNumber = 1;
                            foreach ($this->questions as $key => $value) { 
                        ?>

                        <div role="tabpanel" class="tab-pane <?php echo ($i==0) ? "active" : ""; $i++ ?>" id="category<?= $key ?>">
                            <br><br>
                            <?php 
                                foreach ($value as $question) { 
                            ?>
                                <div class="col md-12 main">
                                    <div class="page-header">
                                        <span style="font-size: 25px"><strong>
                                            <?php echo $questionNumber; $questionNumber++;?>) 
                                        </strong><?= htmlspecialchars_decode($question['question']) ?></span>
                                    </div>
                                    <fieldset>
                                        <div class="form-group" style="font-size: 18px;">
                                            <div class="col-lg-12">
                                                <?php
                                                    $answerArr = array(
                                                        $question['answer'],
                                                        $question['choice2'],
                                                        $question['choice3'],
                                                        $question['choice4']
                                                    );
                                                    shuffle($answerArr);
                                                    $question['choice1'] = $answerArr[0];
                                                    $question['choice2'] = $answerArr[1];
                                                    $question['choice3'] = $answerArr[2];
                                                    $question['choice4'] = $answerArr[3];
                                                ?>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="radio radio-primary">
                                                        <label>
                                                        <input class="answerRadio" type="radio"
                                                         data-qid="<?= $question['questionId'] ?>" data-cid="<?= $question['categoryId'] ?>" data-choice="<?= $question['choice1'] ?>" name="<?= $question['id'] ?>"<?php
                                                            echo ($question['choice1'] == $question['userAnswer']) ? " checked" : "";
                                                         ?>><?= $question['choice1'] ?><br>
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="radio radio-primary">
                                                        <label>
                                                        <input class="answerRadio" type="radio" 
                                                        data-qid="<?= $question['questionId'] ?>" data-cid="<?= $question['categoryId'] ?>" data-choice="<?= $question['choice2'] ?>" name="<?= $question['id'] ?>"<?php
                                                            echo ($question['choice2'] == $question['userAnswer']) ? " checked" : "";
                                                         ?>><?= $question['choice2'] ?><br>
                                                    </label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="radio radio-primary">
                                                        <label>
                                                        <input class="answerRadio" type="radio" 
                                                        data-qid="<?= $question['questionId'] ?>" data-cid="<?= $question['categoryId'] ?>" data-choice="<?= $question['choice3'] ?>" name="<?= $question['id'] ?>"<?php
                                                            echo ($question['choice3'] == $question['userAnswer']) ? " checked" : "";
                                                         ?>><?= $question['choice3'] ?><br>
                                                    </label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="radio radio-primary">
                                                        <label>
                                                        <input class="answerRadio" type="radio" 
                                                        data-qid="<?= $question['questionId'] ?>" data-cid="<?= $question['categoryId'] ?>" data-choice="<?= $question['choice4'] ?>" name="<?= $question['id'] ?>"<?php
                                                            echo ($question['choice4'] == $question['userAnswer']) ? " checked" : "";
                                                         ?>><?= $question['choice4'] ?><br>
                                                    </label>
                                                    </div>
                                                </div>

                                                
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            <?php
                                }
                            ?>
                            <br>

                            <?php
                            $arrKeys = array_keys($this->questions); 
                            if($i >= count($arrKeys)) { ?>
                                <div class="form-group col-sm-6">
                                <button type="submit" id="submitBtn" name="test_submit" class="navbtn submitbtn">Submit</button>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                                }
                            }
                        ?>
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
        <!-- Bootstrap Core JavaScript -->
        <script src="<?= BOWER_DIR ?>/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?= JS_DIR ?>/sb-admin-2.js"></script>
        <?php if(!(!is_null($this->errors) && count($this->errors) > 0))
    { ?>
        <!-- Custom JavaScript -->
        <script src="<?= JS_DIR ?>/pages/test.js"></script>
        <?php } ?>
</body>
</html>