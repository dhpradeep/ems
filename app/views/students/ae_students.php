<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?= WEBSITE_TITLE ?> | Add Students</title>

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
                            Add Student
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
                            Add Student
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <div role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a>
                    </li>

                    <li role="presentation">
                        <a href="#details" aria-controls="details" role="tab" data-toggle="tab">Personal Details</a>
                    </li>

                    <li role="presentation">
                        <a href="#education" aria-controls="education" role="tab" data-toggle="tab">Education</a>
                    </li>

                    <li role="presentation">
                        <a href="#cdetails" aria-controls="cdetails" role="tab" data-toggle="tab">Contact Details</a>
                    </li>
                    <li role="presentation">
                        <a href="#doc" aria-controls="doc" role="tab" data-toggle="tab">Documentation</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <form role="form">
                            <div class="form-group col-md-6">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mname">Middle Name</label>
                                <input type="text" class="form-control" name="mname" id="mname" placeholder="Middle Name" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="col">
                                    <a href="#" class="btn btn-primary">Next</a>
                            </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="details">
                            <div class="form-group col-md-6">
                                <label for="program">Program</label>
                                <select class="form-control" id="program">
                                    <option value="1">BBA</option>
                                    <option value="2">BCA</option>
                                    <option value="3">BPH</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="doa">Date of Application</label>
                                <input type="date" class="form-control" name="doa" id="doa" placeholder="Date of Application" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Other</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nationality">Nationality</label>
                                <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nationality" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fatherName">Father's Name</label>
                                <input type="text" class="form-control" name="fatherName" id="fatherName" placeholder="Father's Name" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="col">
                                    <a href="javascript:save();" class="btn btn-primary">Previous</a>
                                    <a href="javascript:clear();" class="btn btn-primary">Next</a>
                            </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="education">
                        <div class="col-md-12 float-right">
                        <button type="button" id="addEducation" class="btn btn-success">+</button>
                        </div>
                            <div class="form-group col-md-2">
                                <label for="level">Level</label>
                                <select class="form-control" id="level">
                                    <option value="1">SLC</option>
                                    <option value="2">+2</option>
                                    <option value="3">Distict Level</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="board">Board</label>
                                <input type="text" class="form-control" name="board" id="board" placeholder="Board" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="yearofcompletion">Year of completion</label>
                                <input type="text" class="form-control" name="yearofcompletion" id="yearofcompletion" placeholder="Year of completion" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="percentage">Percentage</label>
                                <input type="text" class="form-control" name="percentage" id="percentage" placeholder="Percentage" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="institution">Institute</label>
                                <input type="text" class="form-control" name="institution" id="institution" placeholder="Institute" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="col">
                                    <a href="javascript:save();" class="btn btn-primary">Previous</a>
                                    <a href="javascript:clear();" class="btn btn-primary">Next</a>
                            </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="cdetails">
                            <div class="form-group col-md-6">
                                <label for="municipality">Municipality</label>
                                <input type="text" class="form-control" name="municipality" id="municipality" placeholder="Municipality" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="wardNo">Ward. NO</label>
                                <input type="number" class="form-control" name="wardNo" id="wardNo" placeholder="Ward. NO" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="area">Area</label>
                                <input type="text" class="form-control" name="area" id="area" placeholder="Area" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="district">District</label>
                                <input type="text" class="form-control" name="district" id="district" placeholder="District" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="zone">Zone</label>
                                <input type="text" class="form-control" name="zone" id="zone" placeholder="Zone" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobileNo">Mobile No</label>
                                <input type="text" class="form-control" name="mobileNo" id="mobileNo" placeholder="Mobile No" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telephoneNo">Telephone No</label>
                                <input type="text" class="form-control" name="telephoneNo" id="telephoneNo" placeholder="Telephone No" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="blockNo">Block No</label>
                                <input type="text" class="form-control" name="blockNo" id="blockNo" placeholder="Block No" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="guardianName">Gurdian Name</label>
                                <input type="text" class="form-control" name="guardianName" id="guardianName" placeholder="Gurdian Name" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="guardianRelation">Gurdian Relationship</label>
                                <input type="text" class="form-control" name="guardianRelation" id="guardianRelation" placeholder="Gurdian Relationship" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="guardianContact">Gurdian Contact</label>
                                <input type="text" class="form-control" name="guardianContact" id="guardianContact" placeholder="Gurdian Contact" />
                                <span class="help-inline"></span>
                            </div>
                            <div class="col">
                                    <a href="#" class="btn btn-primary">Previous</a>
                                    <a href="#" class="btn btn-primary">Next</a>
                            </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="doc">
                            <div class="form-group col-md-6">
                                <label for="formNo">Form No.</label>
                                <input type="number" class="form-control" name="formNo" id="formNo" placeholder="Form No." />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="entranceNo">Entrance NO.</label>
                                <input type="number" class="form-control" name="entranceNo" id="entranceNo" placeholder="Entrance NO." />
                                <span class="help-inline"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="has-success">
                                    <div class="checkbox">
                                        <label for="eligible">
                                        <input type="checkbox" id="eligible" value="1">
                                       Eligible 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="has-success">
                                    <div class="checkbox">
                                        <label for="marksheet">
                                        <input type="checkbox" id="marksheet" value="1">
                                       Mark Sheet 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="has-success">
                                    <div class="checkbox">
                                        <label for="characterCertificate">
                                        <input type="checkbox" id="characterCertificate" value="1">
                                       Character Certificate 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="has-success">
                                    <div class="checkbox">
                                        <label for="citizenship">
                                        <input type="checkbox" id="citizenship" value="1">
                                       CitizenShip 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="has-success">
                                    <div class="checkbox">
                                        <label for="photo">
                                        <input type="checkbox" id="photo" value="1">
                                       Photo 
                                        </label>
                                    </div>
                                    </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="has-success">
                                    <div class="checkbox">
                                        <label for="minimumPercent">
                                        <input type="checkbox" id="minimumPercent" value="1">
                                        Minimum Percent 
                                        </label>
                                    </div>
                                    </div>
                            </div>
                            <div class="row">
                                    <a href="#" class="btn btn-primary">Previous</a>
                                    <a href="#" class="btn btn-warning">Submit</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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