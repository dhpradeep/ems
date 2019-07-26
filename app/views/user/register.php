<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="<?= CSS_DIR ?>/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../css/custom.css"> -->

</head>

<body>

    <div class="container-fluids" style="width: 100%; height: 600px">
        <!--header space -->
        <div class="row p-3 "></div>

        <!-- main body space -->
        <div class="row h-100">

            <div class="col-lg-8 offset-lg-2 col-sm-12 col-md-6 offset-md-3 border rounded p-0">

                <!--register box black portion -->
                <div class="col-md-6    col-lg-6 bg-dark h-100  float-left rounded-left  d-sm-block">


                    <div class="col-lg-12 col-md-12">
                        <h1 class="font-weight-medium text-center pt-4 pb-0 mb-0 mt-4 text-light" style="font-size: 4rem">WELCOME</h1>
                        <p class="text-center pt-0 mt-0 text-light" style="font-size: 18px;"> Welcome to Communication
                            Panel of Eversoft</p>
                    </div>

                </div>

                <!-- register right side-->
                <div class="col-md-6    col-lg-6 h-100  float-right rounded-right  d-sm-block">
                    <h1 class="font-weight-medium text-center pt-4 pb-0 mb-0 mt-4 text-dark">REGISTER</h1>
                    <p class="text-center pt-2 mt-0 text-dark" style="font-size: 15px;">
                        Already account?<a href="<?= SITE_URL ?>/user/login"> Login Here</a>.
                    </p>

                    <div class="col-lg-12 text-danger text-center">
                        <?php
                        if(!is_null($this->error)) {
                            foreach ($this->error as $key => $value) {
                                echo "\t". $value . "<br>\n";
                            }
                            echo "\t<br>\n";
                        }
                        ?>
                    </div>
                    <form method="POST" class="col-lg-20">
                        <div class="form-group row">
                            <label for="f_name" class="col-md-4 col-form-label text-md-right"><b>First Name</b></label>
                            <div class="col-md-6">
                                <input value="<?php echo Input::get('fname'); ?>" max="30" class="form-control" type="text" name="fname" id="f_name" placeholder="First Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="l_name" class="col-md-4 col-form-label text-md-right"><b>Last Name</b></label>
                            <div class="col-md-6">
                                <input value="<?php echo Input::get('lname'); ?>" max="30" type="text" id="l_name" class="form-control" name="lname" placeholder="Last Name" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="user_name" class="col-md-4 col-form-label text-md-right"><b>User
                                    Name</b></label>
                            <div class="col-md-6">
                                <input value="<?php echo Input::get('uname'); ?>" min="5" max="20" type="text" id="user_name" class="form-control" placeholder="Username" name="uname" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="emailid" class="col-md-4 col-form-label text-md-right"><b>Email Id</b></label>
                            <div class="col-md-6">
                                <input value="<?php echo Input::get('email'); ?>" type="email" id="emailid" class="form-control" placeholder="Email" name="email" min="5" max="50" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dateofbirth" class="col-md-4 col-form-label text-md-right"><b>Date Of
                                    Birth</b></label>
                            <div class="col-md-6">
                                <input value="<?php echo Input::get('dob'); ?>" type="date" id="dateofbirth" class="form-control" name="dob" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right"><b>Phone No.</b></label>
                            <div class="col-md-6">
                                <input value="<?php echo Input::get('phno'); ?>" type="number" id="phone" class="form-control" name="phno" placeholder="Phone Number" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="psw" class="col-md-4 col-form-label text-md-right"><b>Password</b></label>
                            <div class="col-md-6">
                                <input type="password" id="psw" min="6" max="25" class="form-control" name="pwd" placeholder="Password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="confirmpsw" class="col-md-4 col-form-label text-md-right"><b>Confirm
                                    Password</b></label>
                            <div class="col-md-6">
                                <input type="password" id="confirmpsw" min="6" max="25" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-inline"><input type="radio" name="policy" required>&nbsp;&nbsp; I accept terms and
                                condition
                                and privacy policy</label>
                        </div>

                        <div class="form-group col-lg-12 h-100 p-3">
                            <button  type="submit" name='register' class="btn btn-lg btn-primary btn-block">Sign Up</button>
                            <!-- <button type="submit" name='register' class="btn btn-danger btn-sm">Sign Up</button> -->
                        </div>

                        <!-- <div class="form-group col-lg-12 h-100 p-3">
                            <div class="row">
                            <div class="col-lg-4 float-left pr-4 h-100">
                                <button type="button" class="btn float-left btn-primary btn-sm" style="border-radius: 12px;">Facebook</button>
                            </div>

                            <div class="col-lg-4 h-100">
                                <button type="button" class="btn float-none btn-info btn-sm" style="border-radius: 12px;">Twitter</button>
                            </div>

                            <div class="col-lg-4 float-right h-100">
                                <button type="button" class="btn float-right btn-danger btn-sm" style="border-radius: 12px;">Google + </button>
                            </div>
                        </div>
                        </div> -->
                    </form>
                </div>
            </div>

        </div>


        <!-- main footer space -->
        <div class="row p-4"></div>
    </div>

</body>

</html>