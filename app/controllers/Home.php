<?php

class Home extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		header("Location: ".SITE_URL."/home/dashboard");
	}

	public function dashboard() {
		if(!Session::isloggedIn()) {
			header("Location: ".SITE_URL."/user/login");
		}else {
			$this->model->template = VIEWS_DIR.DS."home".DS."dashboard.php";
			$this->view->render();
		}		
	}

	public function message($name = '', $code='') {
		if(!empty($name)) {
			$code = (!empty($code)) ? $code : 404;
			$this->model->data = array(
			'message'=> array(
			'header' => 'Error '.$code,
			'content' => '<b>'.$name.'!</b>',
			'link' => SITE_URL,
			'link_content' => 'Go to home'
			));
		}
		$this->model->template = VIEWS_DIR.DS."error.php";
		$this->view->render();
	}
}

?>