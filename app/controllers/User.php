<?php

class User extends Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		header("Location: ".SITE_URL."/user/users");
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
	

	public function profile() 
	{
		if(!Session::isLoggedIn()) {
			header("Location: ".SITE_URL."/user/login");
		}else {
			$dataToSearch = array("id" => Session::getSession('uid'),
			"role" => Session::getSession("role"));
			$userdata = $this->model->searchUser($dataToSearch);
			if(count($userdata[0]) > 0) {
				unset($userdata[0]['passwordHash']);
				$this->model->data = $userdata[0];
			}
			//$this->model->data['success'] = true;
			$this->model->template = VIEWS_DIR.DS."user".DS."profile.php";
			$this->view->render();
		}
	}

	public function users($name = '') 
	{
		if(($name == "add" || $name == "update" || $name == "delete" || $name == "get") && Session::isLoggedIn(1)) {
			$result = array('status' => 0);	
			if(isset($_POST)) {
				if($name == "get") {
					return $this->getUser($result);
				}
				if($name == "delete") {
					return $this->deleteUser($result);
				}
				if($name == "update" && isset($_POST['id']) && isset($_POST['role'])) {
					return $this->updateUser($result);
				}
				if($name == "add") {
					return $this->addUser($result);
				}	
			}		

		} else if($name == ''){	
			if(Session::isLoggedIn(1)) {
				$this->model->template = VIEWS_DIR.DS."user".DS."users.php";
				$this->view->render();
			}else {
				header("Location: ".SITE_URL."/home/dashboard");
			}			
		} else {
			header("Location: ".SITE_URL."/home/message");
		}
	}

	private function getUser($result) {
		$startIndex = $_POST['start'];
		$totalCount = $_POST['length'];
		$columnToSort = null;
		$sortDir = null;
		$stringToSearch = null;
		$fieldToSearch = array("fname","lname","mname","username","email");
		if(isset($_POST["order"][0]["column"])){
			$sortDir = Sanitize::escape($_POST["order"][0]["dir"]);

			$columnToSort = $_POST["order"][0]["column"];

			$columnToSort = (!isset($_POST["columns"][$columnToSort]["name"]) && $_POST["columns"][$columnToSort]["orderable"]) ? $_POST["columns"][$columnToSort]["name"] : "name" ;
			$columnToSort = ($columnToSort == "name") ? "fname" : Sanitize::escape($columnToSort);
		}
		if(isset($_POST["search"]["value"])) {
			$stringToSearch = Sanitize::escape($_POST["search"]["value"]);
		}
		$finalArray = $this->model->getAllUserConditions($stringToSearch,$fieldToSearch,$columnToSort,$sortDir);
		$res = array();
		$countA = 0;
		foreach ($finalArray as $value) {					
			if(!($value['id'] == Session::getSession('uid'))) {
				$res[$countA++] = $value;
			}
		}
		$total = count($res);
		$index = 0;
		$arr = array();
		for ($i = $startIndex; $i < $startIndex + $totalCount && $i < $total; $i++){			
			$res[$i]['name'] = $res[$i]['fname']." ".$res[$i]['mname']. " " .$res[$i]['lname'];
			unset($res[$i]['passwordHash']);
			unset($res[$i]['fname']);
			unset($res[$i]['lname']);
			unset($res[$i]['mname']);
			$arr[$index++] = $res[$i];
		}

		if(count($arr) >= 1){
			$result['status'] = 1;
		}
		$result['data'] = $arr;
		$result['success'] = ($result['status'] == 1) ? true : false;
			$result['draw'] = $_POST['draw'];
			$totalUsers = count($this->model->getAllUser());
			$result['recordsTotal'] = ($totalUsers >= $total) ? $totalUsers - 1 : $total;
			$result['recordsFiltered'] = $total;
		return print json_encode($result);
	} 

	private function deleteUser($result) {
		if(!isset($_POST['id'])) {
			$result['error'] = array("Invalid selection.");
			$result['status'] = 0;
		}else {
			$idToDel = Input::get('id');
			$dataToSearch = array('id' => $idToDel);
			$res = $this->model->searchUser($dataToSearch);
			if(count($res) >= 1) {
				$out = $this->model->deleteUser($idToDel);
				if($out == 1) {
					$result['status'] = 1;
				}else {
					$result['error'] = array("Connection Problem with server.");
					$result['status'] = 0;
				}
			}else {
				$result['error'] = array("No such user found.");
				$result['status'] = 0;
			}
		}
		$result['success'] = ($result['status'] == 1) ? true : false;
		unset($_POST);
		return print json_encode($result);
	}

	private function updateUser($result) {
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = Input::get($key);
		}
		$dataForSearch = array('id' => $data['id']);
		$res = $this->model->searchUser($dataForSearch);
		if(count($res) >= 1) {
			$idToChange = $data['id'];
			if(!($data['role'] == 1 || $data['role'] == 2 || $data['role'] == 3))
			{
				$result['status'] = 0;
			}else {
				unset($data['id']);
				$ret = $this->model->updateUser($idToChange, $data);
				if($ret == 1) {
					$result['status'] = 1;
					$result['success'] = true;
				} else {
					$result['status'] = -1;
					$result['errors'] = array("Nothing updated!");
				}
			}							
		} else {
			$result['errors'] = array("No such user found.");
			$result['status'] = 0;
		}
		$result['success'] = ($result['status'] == 1) ? true : false;
		unset($_POST);
		return print json_encode($result);
	}

	private function addUser($result){
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
				'matchName' => 'Confirm Password',
				'matches' => 'cpasswordHash'
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
			unset($_POST['cpasswordHash']);
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
		} else {
			$result['status'] = 0;
		}
		if($result['status'] == 0 || $result['status'] == -1) {
			$result['errors'] = $validate->errors();
			$result['success'] = false;
		} 
		unset($_POST);
		return print json_encode($result);			
	}	
}
 