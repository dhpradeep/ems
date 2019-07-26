<?php

class User extends Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		header("Location: ".SITE_URL."/user/login");
	}

	public function logout()
	{
		header("Location: ".SITE_URL."/user/login");
	}

	public function login() 
	{
		$this->model->template = VIEWS_DIR.DS."user".DS."login.php";
		$this->model->data = array();
		$this->view->render();

		if (isset($_POST['login'])) {
			header("Location: ".SITE_URL."/home/dashboard");
		}
	}
	
	public function forgot() 
	{
		$this->model->template = VIEWS_DIR.DS."user".DS."forgot.php";
		$this->model->data = array();
		$this->view->render();
	}

	public function recover($name = '') 
	{
		$this->model->template = VIEWS_DIR.DS."user".DS."recover.php";
		$this->view->render();
	}

	public function profile() 
	{
		$this->model->template = VIEWS_DIR.DS."user".DS."profile.php";
		$this->view->render();
	}

	public function users() 
	{
		$this->model->template = VIEWS_DIR.DS."user".DS."users.php";
		$this->view->render();
	}
}
 