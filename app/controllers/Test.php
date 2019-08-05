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
		if(Session::isLoggedIn(1)) {
			if($name){
				$this->model->data = array(
					'message'=> array(
					'content' => '<b>'.$name.'</b>',
					));
				$this->model->template = VIEWS_DIR.DS."test".DS."single_result.php";
			}else{
				$this->model->template = VIEWS_DIR.DS."test".DS."result.php";
			}
	        $this->view->render();
		}else {
			header("Location: ".SITE_URL."/home/dashboard");			
    	}
	}
}

?>