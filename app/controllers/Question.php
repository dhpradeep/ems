<?php

class Question extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		header("Location: ".SITE_URL."/question/all");
	}

	public function category() {
		$this->model->template = VIEWS_DIR.DS."questions".DS."category.php";
		$this->view->render();
    }
    
    public function all() {
		$this->model->template = VIEWS_DIR.DS."questions".DS."questions.php";
		$this->view->render();
    }
    
    public function model() {
		$this->model->template = VIEWS_DIR.DS."questions".DS."model.php";
		$this->view->render();
	}

}

?>