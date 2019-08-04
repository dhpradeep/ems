<?php

class Test extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
        $this->model->template = VIEWS_DIR.DS."test".DS."test.php";
        $this->view->render();	
	}
	
	public function result($name="") {
        $this->model->template = VIEWS_DIR.DS."test".DS."result.php";
        $this->view->render();	
    }
}

?>