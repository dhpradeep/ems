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
    
    public function model($name='') {
		if($name == "bca"){
			$this->model->template = VIEWS_DIR.DS."questions".DS."modelDetails.php";
		}elseif($name == 'bba'){
			$this->model->template = VIEWS_DIR.DS."questions".DS."modelDetails.php";
		}elseif($name == 'bph'){
			$this->model->template = VIEWS_DIR.DS."questions".DS."modelDetails.php";
		}elseif($name == ''){
			$this->model->template = VIEWS_DIR.DS."questions".DS."model.php";
		}else{
			header("Location: ".SITE_URL."/home/message");
		}
		$this->view->render();
	}

	public function name() {
		$this->model->template = VIEWS_DIR.DS."questions".DS."modelDetails.php";
		$this->view->render();
	}

}

?>