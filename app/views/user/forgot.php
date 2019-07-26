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
        <form id="forgot" method = "post">
          <h1>Forget Password</h1>
          <div class="form-group">
            <div class="invalid-feedback text-danger">
            <?php
              if(!is_null($this->error)) {
                  foreach ($this->error as $key => $value) {
                    echo "\t". $value . "<br>\n";
                  }
                  echo "\t<br>\n";
              }
            ?>
            </div>
            <div class="text-success">
            <?php
              if(!is_null($this->user) && (!is_null($this->message))) {
                $str = explode("@",$this->user);
                for($i=2; $i<strlen($str[0]); $i++) {
                    $str[0][$i] = '*';
                }
                    echo $this->message . $str[0] . '@' . $str[1] . "</br></br>"; 
              }
            ?>
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" name="uname" placeholder="Email/Username" required="required">
            </div>
          </div>
          <div class="form-group">
            <button type="submit" name = "forgot" class="btn btn-lg btn-primary btn-block">Submit</button>
          </div>
          <br>
        </form>
        <p class="text-center text-muted small"><a href="<?= SITE_URL ?>/user/login">Log In here!</a></p>
      </div>
    </div>
  </div>