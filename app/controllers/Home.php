<?php

class Home extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		header("Location: ".SITE_URL."/home/dashboard");
	}

	public function dashboard() {
		$this->model->template = VIEWS_DIR.DS."home".DS."dashboard.php";
		$this->view->render();
	}

	public function message($name = '') {
		if(!empty($name)) {
			$this->model->data = array(
			'message'=> array(
			'header' => 'Error 404',
			'content' => '<b>Page doesn\'t exist!</b>',
			'link' => '../index',
			'link_content' => 'Go back'
			));
			$this->model->template = VIEWS_DIR.DS."error.php";
		}else {
			$this->model->template = VIEWS_DIR.DS."error.php";
		}
		$this->view->render();
	}
}

?>