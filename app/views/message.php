<div class="page">
    <title>Eversoft</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="../../css/login.css" rel="stylesheet" />
    <div class="page-wrap d-flex flex-row align-items-center">
        <div class="container">
            <div class="left">
                <div class="login">Hello Eversoft</div>
                <div class="eula">Welcome to Communication Panel of Eversoft</div>
            </div>
            <div class="right">
                <div class="form">
                    <form id="log">
                        <div>
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center">
                                    <?php
                                    if (!is_null($this->message)) { ?>
                                    <span class="display-1 d-block">
                                        <h1><?= $this->message['header']; ?></h1>
                                    </span>
                                    <p><?= $this->message['content']; ?></p>
                                    <div>
                                        <a href="<?= $this->message['link']; ?>" type="submit" class="btn btn-lg btn-primary btn-block"><?= $this->message['link_content']; ?></a>
                                    </div>
                                    <?php 
                                  } ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 