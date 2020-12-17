<?php

class Student extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		header("Location: ".SITE_URL."/student/all");
	}

	public function groups($name = "") {
		$this->model->setTable('studentgroups');
		if(($name == "add" || $name == "update" || $name == "delete" || $name == "get") && (Session::isLoggedIn(1) || Session::isLoggedIn(2))) {
			$result = array('status' => 0);	
			if(isset($_POST) && count($_POST) > 0) {
				if($name == "get") {
					return $this->getGroup($result);
				}
				if($name == "delete") {
					return $this->deleteGroup($result);
				}
				if($name == "update" && isset($_POST['id'])) {
					return $this->updateGroup($result);
				}
				if($name == "add") {
					return $this->addGroup($result);
				}
			}else{
				header("Location: ".SITE_URL."/home/dashboard");
			}	

		} else if($name == ''){	
			if(Session::isLoggedIn(1) || Session::isLoggedIn(2)) {
				$this->model->template = VIEWS_DIR.DS."students".DS."groups.php";
				$this->view->render();
			}else {
				header("Location: ".SITE_URL."/home/dashboard");
			}			
		} else {
			header("Location: ".SITE_URL."/home/message");
		}
    }

	public function all($name = "") {
		$this->model->setTable('userlogin');
		if(($name == "add" || $name == "update" || $name == "delete" || $name == "get") && (Session::isLoggedIn(1) || Session::isLoggedIn(2))) {
			$result = array('status' => 0);	
			if(isset($_POST) && count($_POST) > 0) {
				if($name == "get") {
					return $this->getStudent($result);
				}
				if($name == "delete") {
					return $this->deleteStudent($result);
				}
				if($name == "update" && isset($_POST['id'])) {
					return $this->updateStudent($result);
				}
				if($name == "add") {
					return $this->addStudent($result);
				}
			}else{
				header("Location: ".SITE_URL."/home/dashboard");
			}		

		} else if($name == ''){	
			if(Session::isLoggedIn(1) || Session::isLoggedIn(2)) {
				$this->model->setTable('studentgroups');
				$all = $this->model->getAllStudent();
				$this->model->data['group'] = $all;
				$this->model->template = VIEWS_DIR.DS."students".DS."students.php";
				$this->view->render();
			}else {
				header("Location: ".SITE_URL."/home/dashboard");
			}			
		} else {
			header("Location: ".SITE_URL."/home/message");
		}
    }

    private function getStudent($result) {
		$startIndex = $_POST['start'];
		$totalCount = $_POST['length'];
		$startIndex = ($totalCount == -1) ? 0 : $startIndex;
		$columnToSort = null;
		$sortDir = null;
		$stringToSearch = null;
		$fieldToSearch = array("fname","username","email","lname");
		/*if(isset($_POST["order"][0]["column"])){
			$sortDir = Sanitize::escape($_POST["order"][0]["dir"]);

			$columnToSort = $_POST["order"][0]["column"];

			$columnToSort = (!isset($_POST["columns"][$columnToSort]["name"]) && $_POST["columns"][$columnToSort]["orderable"]) ? $_POST["columns"][$columnToSort]["name"] : "fname" ;
			$columnToSort = Sanitize::escape($columnToSort);
		}*/
		if(isset($_POST["search"]["value"])) {
			$stringToSearch = Sanitize::escape($_POST["search"]["value"]);
		}
		$this->model->setTable('userlogin');
		$result2 = $this->model->getAllStudentConditions($stringToSearch,$fieldToSearch,$columnToSort,$sortDir);
		$onlyStudent = array();
		$index = 0;
		$i = 0;
		foreach ($result2 as $value) {
			if($value['role'] == 3) {
				$onlyStudent[$index++] = $result2[$i];
			}
			$i++;
		}
		$total = $index;
		$userIdArray = array();
		$res = array();
		if($total > 0) {
			foreach ($onlyStudent as $value) {
				array_push($userIdArray, $value['id']);
			}
		}

		$res = $this->getAllStudentRecords($userIdArray);

		$fname  = array_column($res, 'fname');
		$username = array_column($res, 'username');
		$toSort = (isset($_POST["order"][0]["column"])) ? $_POST["columns"][$_POST["order"][0]["column"]]["data"] : "fname";
		$toSort = ($toSort == "name") ? "fname" : $toSort;
		if(isset($_POST["order"][0]["dir"]) && ($toSort == "fname" || $toSort == "username")) {
			if($_POST["order"][0]["dir"] == "asc")
				array_multisort($$toSort, SORT_ASC, $res);
			else
				array_multisort($$toSort, SORT_DESC, $res);
		}

		if(isset($_POST['filterData']) && $_POST['filterData'] > 0) {
			$i = 0;
			foreach ($res as $value) {
				if($value['groupId'] != $_POST['filterData']) {
					array_splice($res, $i, 1);
					$i--;
				}
				$i++;
			}
		}

		$total = count($res);
		$index = 0;
		$arr = array();
		$totalCount = ($totalCount == -1) ? $total : $totalCount;
		for ($i = $startIndex; $i < $startIndex + $totalCount && $i < $total; $i++){
			$arr[$index] = $res[$i];
			$arr[$index]['id'] = $arr[$index]['userId'];
			$arr[$index]['name'] = $arr[$index]['fname']." ".$arr[$index]['mname']." ".$arr[$index]['lname'];
			unset($arr[$index]['passwordHash']);
			unset($arr[$index]['role']);
			$toSearch = array("id" => $res[$i]['groupId']);
			$this->setForeignModel("QuestionModel");
			$this->foreignModel->setTable("studentgroups");
			$programs = $this->foreignModel->searchQuestion($toSearch);
			if(count($programs) > 0) {
				$arr[$index]['groupName'] = $programs[0]['name'];
			}
			$index++;
		}

		if(count($arr) >= 1){
			$result['status'] = 1;
		}
		$result['data'] = $arr;
		$result['success'] = ($result['status'] == 1) ? true : false;
		$result['draw'] = $_POST['draw'];
		$result['recordsTotal'] = $total;
		$result['recordsFiltered'] = $total;
		unset($_POST);
		return print json_encode($result);
	}

	private function getAllStudentRecords($idArray){
		$total = array();
		$tableName = array("personaldata");
		foreach ($idArray as $id) {
			$one = array();
			$res = $this->searchDataFromTable("userlogin", array("id" => $id));
			if(count($res) > 0) {
				foreach ($res[0] as $key => $value) {
					$one[$key] = $value;
				}
			}
			foreach ($tableName as $table) {
				$result = $this->searchDataFromTable($table, array("userId" => $id));
				if(count($result) > 0) {
					foreach ($result[0] as $key => $value) {
						$one[$key] = $value;
					}
				}				
			}
			array_push($total, $one);
		}
		return $total;
	}

	private function deleteStudent($result) {
		if(!isset($_POST['id'])) {
			$result['error'] = array("Invalid selection.");
			$result['status'] = 0;
		}else {
			$idToDel = Input::get('id');
			$dataToSearch = array('id' => $idToDel);
			$res = $this->model->searchStudent($dataToSearch);
			if(count($res) >= 1) {
				$out = $this->deleteDataFromTable("userlogin", $idToDel);
				$pk = $this->getPKFromTable("personaldata",array('userId' => $idToDel));
				if($pk != 0) $this->deleteDataFromTable("personaldata", $pk);
				$pk = $this->getPKFromTable("timetrack",array('userId' => $idToDel));
				do {
					if($pk != 0) $this->deleteDataFromTable("timetrack", $pk);
					$pk = $this->getPKFromTable("timetrack",array('userId' => $idToDel));
				}while($pk != 0);
				$pk = $this->getPKFromTable("record",array('userId' => $idToDel));
				do {
					if($pk != 0) $this->deleteDataFromTable("record", $pk);
					$pk = $this->getPKFromTable("record",array('userId' => $idToDel));
				}while($pk != 0);	
				$result['status'] = 1;		
			}else {
				$result['error'] = array("No such student found.");
				$result['status'] = 0;
			}
		}
		$result['success'] = ($result['status'] == 1) ? true : false;
		unset($_POST);
		return print json_encode($result);
	}

	private function updateStudent($result) {
		$validate = new Validator();
		$validation = $validate->check($_POST, array(
			'fname' => array(
				'name' => 'First Name',
				'required' => true,
				'min' => 1,
				'max' => 255
			),
			'lname' => array(
				'name' => 'Last Name',
				'required' => true,
				'min' => 1,
				'max' => 255
			),
			'groupId' => array(
				'name' => 'Group',
				'required' => true,
				'minLevel' => 1
			),
			'dobAd' => array(
				'name' => 'Date of Birth(A.D)',
				'required' => true
			),
			'email' => array(
				'name' => 'Email',
				'required' => true,
				'type' => 'email'
			)
		));
		if($validate->passed()){
			$dataForSearch = array('id' => $_POST['id']);
			$res = $this->model->searchStudent($dataForSearch);
			if(count($res) >= 1) {
				$idToUpdate = $_POST['id'];
				$data = array();
				$data['id'] = null;
				foreach ($_POST as $key => $value) {
					if(gettype($value) == "boolean" || gettype($value) == "array") {
						$data[$key] = $_POST[$key];
					}else {
						$data[$key] = Input::get($key);
					}			
				}
				// $data['password'] = "eversoft".strtolower(trim(str_replace(' ', '', Input::get('entranceNo'))));
				// $username = strtolower(trim(str_replace(' ', '', Input::get('fname')))) . 
				// 			strtolower(trim(str_replace(' ', '', Input::get('entranceNo'))));
				// $dataToSearch = array("username" => $username);
				// $userdata3 = $this->searchDataFromTable("userlogin", $dataToSearch);
				// $cnn = 0;
				$userdata = array();
				// for ($i = 0; $i < count($userdata3); $i++) { 
				// 	if($userdata3[$i]['id'] != $idToUpdate)
				// 		$userdata[$cnn++] = $userdata3[$i];
				// }	
				$isEmailRegistered = array();
				if(isset($data['email']) && !empty($data['email'])) {
					$dataToSearch = array("email" => $data['email']);
					$isEmailRegistered3 = $this->searchDataFromTable("userlogin", $dataToSearch);
					$cnn = 0;
					for ($i = 0; $i < count($isEmailRegistered3); $i++) { 
						if($isEmailRegistered3[$i]['id'] != $idToUpdate)
							$isEmailRegistered[$cnn++] = $isEmailRegistered3[$i];
					}
				}
				$updates = array();
				if(count($userdata) == 0 && count($isEmailRegistered) == 0) {
					$toRegister = array(
						"fname" => $data['fname'],
						"mname" => $data['mname'],
						"lname" => $data['lname'],
						"email" => $data['email'],
						"role" => "3" // for student
					);
					$output = $this->updateDataToTable("userlogin", $idToUpdate, $toRegister);
					array_push($updates, $output);
					$pk = $this->getPKFromTable("personaldata",array('userId' => $idToUpdate));
					$toRegister = array(
						"userId" => $idToUpdate,
						"groupId" => $data['groupId'],
						"eligible" => $data['eligible'],
						"dobAd" => $data['dobAd'] // temporary no change
					);
					$output = $this->updateDataToTable("personaldata", $pk, $toRegister);
					array_push($updates, $output);	
					$isChanged = in_array(1, $updates);				
					if($isChanged) {
						$result['status'] = 1;
						$result['success'] = true;
					}else {
						$result['status'] = 0;
						$validate->addError("Nothing changes!");
					}						
				}else {
					if(count($userdata) != 0){
						$validate->addError("User already registered!");
					}
					if(count($isEmailRegistered) != 0) {
						$validate->addError("Email already registered!");
					}
					$result['status'] = 0;				
				}
			}else {
				$result['status'] = 0;
				$validate->addError("No such Student found!");
			}			
		} else {
			$result['status'] = 0;
		}
		if($result['status'] == 0 || $result['status'] == -1) {
			$result['success'] = false;
			if(count($validate->errors()) >= 5){
				$result['errors'] = array("Field(*) are required.");
			}else{
				$result['errors'] = $validate->errors();
			}
		} 
		unset($_POST);
		return print json_encode($result);	
	}

	private function addStudent($result){
		$validate = new Validator();
		$validation = $validate->check($_POST, array(
			'fname' => array(
				'name' => 'First Name',
				'required' => true,
				'min' => 1,
				'max' => 255
			),
			'lname' => array(
				'name' => 'Last Name',
				'required' => true,
				'min' => 1,
				'max' => 255
			),
			'groupId' => array(
				'name' => 'Group',
				'required' => true,
				'minLevel' => 1
			),
			'dobAd' => array(
				'name' => 'Date of Birth(A.D)',
				'required' => true
			),
			'email' => array(
				'name' => 'Email',
				'required' => true,
				'type' => 'email'
			)
		));
		if($validate->passed()){
			$data = array();
			$data['id'] = null;
			foreach ($_POST as $key => $value) {
				if(gettype($value) == "boolean" || gettype($value) == "array") {
					$data[$key] = $_POST[$key];
				}else {
					$data[$key] = Input::get($key);
				}			
			}
			do {
				$data['password'] = str_shuffle("eversoft").strtolower(trim(str_replace(' ', '', rand(1,1000))));
				$username = strtolower(trim(str_replace(' ', '', Input::get('fname')))) . 
						strtolower(trim(str_replace(' ', '', rand(1,10000))));
				$dataToSearch = array("username" => $username);
				$userdata = $this->searchDataFromTable("userlogin", $dataToSearch);
			}while(count($userdata) != 0);
			
			$isEmailRegistered = array();
			if(isset($data['email']) && !empty($data['email'])) {
				$dataToSearch = array("email" => $data['email']);
				$isEmailRegistered = $this->searchDataFromTable("userlogin", $dataToSearch);
			}
			if(count($userdata) == 0 && count($isEmailRegistered) == 0) {
				$toRegister = array(
					"username" => $username,
					"fname" => $data['fname'],
					"mname" => $data['mname'],
					"lname" => $data['lname'],
					"email" => $data['email'],
					"passwordHash" => md5($data['password']),
					"role" => "3" // for student
				);
				$userId = $this->setDataToTable("userlogin", $toRegister);
				if($userId != 0) {
					$toRegister = array(
						"userId" => $userId,
						"password" => $data['password'],
						"groupId" => $data['groupId'],
						"eligible" => $data['eligible'],
						"dobAd" => $data['dobAd']
					);
					$personalId = $this->setDataToTable("personaldata", $toRegister);
					if($personalId == 0) {
						$this->deleteDataFromTable("userlogin", $userId);
						$result['status'] = 0;
						$validate->addError("Can't add to personaldata table.");
					}else{
						$result['status'] = 1;
						$result['success'] = true;
					}
				} else {
					$result['status'] = 0;
					$validate->addError("Can't add to login table.");
				}
			}else {
				if(count($userdata) != 0){
					$validate->addError("User already registered!");
				}
				if(count($isEmailRegistered) != 0) {
					$validate->addError("Email already registered!");
				}
				$result['status'] = 0;			
			}
			
		} else {
			$result['status'] = 0;
		}
		if($result['status'] == 0 || $result['status'] == -1) {
			$result['success'] = false;
			if(count($validate->errors()) >= 5){
				$result['errors'] = array("Field(*) are required.");
			}else{
				$result['errors'] = $validate->errors();
			}
		} 
		unset($_POST);
		return print json_encode($result);	
	}

	private function getGroup($result) {
		$startIndex = $_POST['start'];
		$totalCount = $_POST['length'];
		$startIndex = ($totalCount == -1) ? 0 : $startIndex;
		$columnToSort = null;
		$sortDir = null;
		$stringToSearch = null;
		$fieldToSearch = array("name");
		if(isset($_POST["order"][0]["column"])){
			$sortDir = Sanitize::escape($_POST["order"][0]["dir"]);

			$columnToSort = $_POST["order"][0]["column"];

			$columnToSort = (!isset($_POST["columns"][$columnToSort]["name"]) && $_POST["columns"][$columnToSort]["orderable"]) ? $_POST["columns"][$columnToSort]["name"] : "name" ;
			$columnToSort = Sanitize::escape($columnToSort);
		}
		if(isset($_POST["search"]["value"])) {
			$stringToSearch = Sanitize::escape($_POST["search"]["value"]);
		}
		$res = $this->model->getAllStudentConditions($stringToSearch,$fieldToSearch,$columnToSort,$sortDir);
		$total = count($res);
		$index = 0;
		$arr = array();
		$totalCount = ($totalCount == -1) ? $total : $totalCount;
		for ($i = $startIndex; $i < $startIndex + $totalCount && $i < $total; $i++){
			$arr[$index] = $res[$i];
			$dataToSearch = array("groupId" => $arr[$index]['id']);
			$arr[$index]['noOfStudents'] = count($this->searchDataFromTable("personaldata", $dataToSearch));
			$index++;
		}

		if(count($arr) >= 1){
			$result['status'] = 1;
		}
		$result['data'] = $arr;
		$result['success'] = ($result['status'] == 1) ? true : false;
		$result['draw'] = $_POST['draw'];
		$totalCategories = count($this->model->getAllStudent());
		$result['recordsTotal'] = $totalCategories;
		$result['recordsFiltered'] = $total;
		unset($_POST);
		return print json_encode($result);
	}

	private function deleteGroup($result) {
		if(!isset($_POST['id'])) {
			$result['error'] = array("Invalid selection.");
			$result['status'] = 0;
		}else {
			$idToDel = Input::get('id');
			$dataToSearch = array('id' => $idToDel);
			$res = $this->model->searchStudent($dataToSearch);
			if(count($res) >= 1) {
				$out = $this->model->deleteStudent($idToDel);
				if($out == 1) {
					$result['status'] = 1;
				}else {
					$result['error'] = array("Connection Problem with server.");
					$result['status'] = 0;
				}
			}else {
				$result['error'] = array("No such group found.");
				$result['status'] = 0;
			}
		}
		$result['success'] = ($result['status'] == 1) ? true : false;
		unset($_POST);
		return print json_encode($result);
	}

	private function updateGroup($result) {
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = Input::get($key);
		}
		$validate = new Validator();
		$validation = $validate->check($_POST, array(
			'name' => array(
				'name' => 'Name',
				'required' => true,
				'min' => 1,
				'max' => 30
			)
		));
		if($validate->passed()){
			$dataForSearch = array('id' => $data['id']);
			$res = $this->model->searchStudent($dataForSearch);
			if(count($res) >= 1) {
				$idToChange = $data['id'];
				unset($data['id']);
				$ret = $this->model->updateStudent($idToChange, $data);
				if($ret == 1) {
					$result['status'] = 1;
					$result['success'] = true;
				} else {
					$result['status'] = -1;
					$result['errors'] = $validate->addError("Nothing updated!");
				}							
			} else {
				$result['errors'] = $validate->addError("No such group found.");
				$result['status'] = 0;
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

	private function addGroup($result){
		$validate = new Validator();
		$validation = $validate->check($_POST, array(
			'name' => array(
				'name' => 'Name',
				'required' => true,
				'min' => 1,
				'max' => 30
			)
		));
		if($validate->passed()){
			$data = array();
			$data['id'] = null;
			foreach ($_POST as $key => $value) {
				$data[$key] = Input::get($key);
			}
			$id = $this->model->registerStudent($data);
			if($id != 0){
				$result['status'] = 1;
				$result['success'] = true;
			}else{
				$result['status'] = -1;
				$result['errors'] = $validate->addError("Problem with connection to server!");
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

	private function setDataToTable($tableName, $data) {
		$this->setForeignModel("StudentModel");
		$this->foreignModel->setTable($tableName);
		return $this->foreignModel->registerStudent($data);
	}

	private function updateDataToTable($tableName, $id, $data) {
		$this->setForeignModel("StudentModel");
		$this->foreignModel->setTable($tableName);
		return $this->foreignModel->updateStudent($id, $data);
	}

	private function deleteDataFromTable($tableName, $id) {
		$this->setForeignModel("StudentModel");
		$this->foreignModel->setTable($tableName);
		return $this->foreignModel->deleteStudent($id);
	}

	private function searchDataFromTable($tableName, $data) {
		$this->setForeignModel("StudentModel");
		$this->foreignModel->setTable($tableName);
		return $this->foreignModel->searchStudent($data);
	} 

	private function getPKFromTable($tableName, $data) {
		$this->setForeignModel("StudentModel");
		$this->foreignModel->setTable($tableName);
		return $this->foreignModel->getStudentId($data);
	} 
}

?>