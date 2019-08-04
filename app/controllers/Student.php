<?php

class Student extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		// header("Location: ".SITE_URL."/student/all");
		$this->model->template = VIEWS_DIR.DS."students".DS."students.php";
		$this->view->render();
	}
	
	public function add() {
		$this->model->template = VIEWS_DIR.DS."students".DS."ae_students.php";
		$this->view->render();
    }
    
    public function all() {
		$this->model->template = VIEWS_DIR.DS."students".DS."students.php";
		$this->view->render();
	}

}

?>