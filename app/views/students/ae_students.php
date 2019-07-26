<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= WEBSITE_TITLE ?> | Add Students</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= BOWER_DIR ?>/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= BOWER_DIR ?>/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

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
                    <h2 class="page-header">Student</h2>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="<?= SITE_URL.DS.'home'.DS ?>dashboard">Dashboard</a>
                        </li>
                        <li>
                            <a href="<?= SITE_URL.DS.'student'.DS ?>all"> Students</a>
                        </li>
                        <li class="active">
                           Manage Student
                        </li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Manage Student
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <input type="hidden" name="id" />
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id"/>
                                            <input type="hidden" name="csrf" value="<?php echo $_SESSION['form_token'];?>">
                                            <label>Student ID</label>
                                            <input type="text" class="form-control" name="studid" id="studid" placeholder="Student ID" />
                                            <span class="help-inline"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="fname" id="fname" placeholder="Firstname" />
                                            <span class="help-inline"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lname" id="lname" placeholder="Lastname" />
                                            <span class="help-inline"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" />
                                            <span class="help-inline"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <span class="help-inline"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile No.</label>
                                            <input type="text" class="form-control" name="mobileno" id="mobileno" placeholder="Mobile No" />
                                            <span class="help-inline"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" name="address" id="address" placeholder="Address"></textarea>
                                            <span class="help-inline"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Birthdate</label>
                                            <input type="date" class="form-control" name="birthdate" id="birthdate"/>
                                            <span class="help-inline"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Date Graduated</label>
                                            <input type="date" class="form-control" name="graduated" id="graduated"/>
                                            <span class="help-inline"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Last School Attended</label>
                                            <input type="text" class="form-control" name="last_school" id="last_school" placeholder="Last School Attended" />
                                            <span class="help-inline"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Preferred Course</label>
                                            <select class="form-control" id="pref_course" name="pref_course">
                                            </select>
                                            <span class="help-inline"></span>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <form role="form">
                                        <label>Username</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" class="form-control" id="username" placeholder="Username">
                                        </div>
                                        <span class="help-inline"></span>
                                        <label>Password</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">*</span>
                                            <input type="password" class="form-control" id="password"  placeholder="Password">
                                        </div>
                                        <span class="help-inline"></span>
                                        <label>Confirm Password</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">*</span>
                                            <input type="password" class="form-control" id="password2" placeholder="Confirm Password" />
                                        </div>
                                        <span class="help-inline"></span>
                                    </form>
                                    <a href="javascript:save();" class="btn btn-primary">Save</a>
                                    <a href="javascript:clear();" class="btn btn-warning">Reset</a>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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

    <!-- Notify -->
    <script src="<?= BOWER_DIR ?>/notifyjs/dist/notify.js"></script>
    <script src="<?= BOWER_DIR ?>/notifyjs/dist/styles/bootstrap/notify-bootstrap.js"></script>
    <!-- spinJS -->
    <script src="<?= BOWER_DIR ?>/spin.js/spin.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= JS_DIR ?>/sb-admin-2.js"></script>
    <script src="<?= JS_DIR ?>/pages/student2.js"></script>

</body>

</html>
