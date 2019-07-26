<div class="page">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= WEBSITE_TITLE ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="<?= CSS_DIR.DS ?>login.css" rel="stylesheet" />

  <div class="container">
    <div class="left">
      <div class="login">Welcome to <?= WEBSITE_TITLE ?></div>
    </div>
    <div class="right">
      <div class="form">
        <form id="log" method = "post">
          <h1>Login</h1>
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
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" name="username" placeholder="Email/Username" required="required">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control" name="passwordHash" placeholder="Password" required="required">
            </div><br>

            <div class="clearfix">
              <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label> &nbsp;
              <a href="<?= SITE_URL ?>/user/forgot" class="pull-right">Forgot Password?</a>
            </div>
          </div> <br>
          <div class="form-group">
            <button type="submit" name = "login" class="btn btn-lg btn-primary btn-block">Sign in</button>
          </div>
        </form>
        <p class="text-center text-muted small">Don't have an account? <a href="<?= SITE_URL ?>/user/register">Sign up here!</a></p>

      </div>
    </div>
  </div>
