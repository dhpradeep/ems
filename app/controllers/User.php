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
		if(Session::isLoggedIn()) {
			Session::clearSession();
		}
		header("Location: ".SITE_URL."/user/login");
	}

	public function login() 
	{
		if (Session::isLoggedIn()) {
			header("Location: ".SITE_URL."/home/dashboard");
		}
		if (isset($_POST['login'])) { 
			$validate = new Validator();

			$validation = $validate->check($_POST, array(
				'username' => array(
					'name' => 'Username/Email',
					'required' => true,
					'min' => 5,
					'max' => 50
				),
				'passwordHash' => array(
					'name' => 'Password',
					'required' => true,
					'min' => 6,
					'max' => 25
				)
			));
			if ($validate->passed()) {
				$data1 = ['username' => Input::get('username'), 'passwordHash' => md5(Input::get('passwordHash'))];
				$data2 = ['email' => Input::get('username'), 'passwordHash' => md5(Input::get('passwordHash'))];
				$id1 = $this->model->login($data1);
				$id = ($id1 == 0) ? $this->model->login($data2) : $id1;
				if ($id != 0) {
					$inf = $this->model->searchUser(array('id'=>$id));
					$nameOfUser = $inf[0]['fname']." ".$inf[0]['mname']." ".$inf[0]['lname'];
						Session::setSession('loggedIn', true);
						Session::setSession('uid', $id);
						Session::setSession('uname', $nameOfUser);
						Session::setSession('role', $inf[0]['role']);
						unset($_POST);
						header("Location: ".SITE_URL."/home/dashboard");
				} else {
					$validate->addError("Username/Email and Password combination not matched!");
				}
			}
			unset($_POST);
			$this->model->template = VIEWS_DIR.DS."user".DS."login.php";
			$this->model->data = array('error' => $validate->errors());
			$this->view->render();
		} else {
			$this->model->template = VIEWS_DIR.DS."user".DS."login.php";
			$this->model->data = array();
			$this->view->render();
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

	public function users($name = '') 
	{
		if(($name == "add" || $name == "update") && Session::isLoggedIn(1)) {
			$result = array();		
			if(isset($_POST)) {
				$validate = new Validator();
				$validation = $validate->check($_POST, array(
					'username' => array(
						'name' => 'Username',
						'required' => true,
						'min' => 5,
						'max' => 20
					),
					'passwordHash' => array(
						'name' => 'Password',
						'required' => true,
						'min' => 6,
						'max' => 25,
					),
					'fname' => array(
						'name' => 'First Name',
						'required' => true,
						'min' => 1,
						'max' => 30
					),
					'mname' => array(
						'name' => 'Middle Name',
						'min' => 1,
						'max' => 30
					),
					'lname' => array(
						'name' => 'Last Name',
						'required' => true,
						'min' => 1,
						'max' => 30
					),
					'email' => array(
						'name' => 'User Email',
						'required' => true,
						'min' => 5,
						'max' => 50,
						'type' => 'email'
					)
				));
				if($validate->passed()){
					$data = array();
					$data['id'] = null;
					foreach ($_POST as $key => $value) {
						$data[$key] = Input::get($key);
					}
					$data["passwordHash"] = md5($data['passwordHash']);
					if($data['role'] == "Admin"){
						$data['role'] = 1;
					}else if($data['role'] == "Teacher"){
						$data['role'] = 2;
					}else {
						$data['role'] = 0;
					}					
					if($name == "update" && !is_null($data['id'])) {
						$dataForSearch = array('id' => $data['id'], 'username' => $data['username'], 'email' => $data['email']);
						$res = $this->model->searchUser($dataForSearch);
						if(count($res) >= 1) {
							$idToChange = $data['id'];
							unset($data['id']);
							unset($data['email']);
							unset($data['username']);
							$ret = $this->model->updateUser($idToChange, $data);
							if($ret == 1) {
								$result['status'] = 1;
								$result['success'] = true;
							} else {
								$result['status'] = -1;
								$result['errors'] = array("Nothing updated!");
							}
						} else {
							$validate->addError("No such user found.");
							$result['status'] = 0;
						}
					} else {
						$checkUsername = array('username' => $data['username']);
						$checkEmail = array('email' => $data['email']);
						if ($this->model->getUserID($checkUsername) != 0) {
							$validate->addError("Username already exists.");
							$result['status'] = 0;
						} else if($this->model->getUserID($checkEmail) != 0) {
							$validate->addError("Email already exists.");
							$result['status'] = 0;
						} else {
							$id = $this->model->registerUser($data);
							if($id != 0){
								$result['status'] = 1;
								$result['success'] = true;
							}else{
								$result['status'] = -1;
								$result['errors'] = array("Problem with connection to server!");
							}
						}
					}
				} else {
					$result['status'] = 0;
				}
			}
			if($result['status'] == 0 || $result['status'] == -1) {
				$result['errors'] = $validate->errors();
				$result['success'] = false;
			} 
			return print json_encode($result);

		} else if($name == ''){	
			if(Session::isLoggedIn()) {
				$this->model->template = VIEWS_DIR.DS."user".DS."users.php";
				$this->view->render();
			}else {
				header("Location: ".SITE_URL."/user/login");
			}			
		} else {
			header("Location: ".SITE_URL."/home/message");
		}
	}
}
 