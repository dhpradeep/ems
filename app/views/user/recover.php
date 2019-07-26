<div class="page">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Eversoft Login Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="<?= CSS_DIR.DS ?>login.css" rel="stylesheet" />

  <div class="container">
    <div class="left">
      <div class="login">Hello Eversoft</div>
      <div class="eula">Welcome to Communication Panel of Eversoft</div>
    </div>
    <div class="right">
      <div class="form">
        <form id="log" method = "post">
          <h1>Forget password</h1>
          <div class="form-group">
            <?php
              if(!is_null($this->error)) {
                  foreach ($this->error as $key => $value) {
                    echo '<div class="invalid-feedback text-danger">';
                    echo "\t". $value . "<br></div>\n";
                  }
                  echo "\t<br>\n";
              }
              if(!is_null($this->message)){
                echo '<div class="invalid-feedback text-success">';
                echo "\t". $this->message . "<br></div>\n";
                echo "\t<br>\n";
              }
            ?>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control" name="pwd" placeholder="New Password" required="required">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
            </div><br>
          </div> <br>
          <div class="form-group">
            <button type="submit" name="recover" class="btn btn-lg btn-primary btn-block">Change Password</button>
          </div>
          <br>
        </form>
        </div>
    </div>
  </div>