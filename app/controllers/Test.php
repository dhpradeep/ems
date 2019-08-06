<?php

class Test extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if(!Session::isLoggedIn() || is_null(Session::getSession('role'))) {
			header("Location: ".SITE_URL."/user/login");	
		}
		$this->model->data['errors'] = array();	
		$this->checkForValidProgram();
		if(count($this->model->data['errors']) == 0) {
			//check for previous exam.
		}
		$this->model->template = VIEWS_DIR.DS."test".DS."test.php";
		$this->view->render();
	}

	private function checkForValidProgram() {
		$userId = Session::getSession('uid');
		$userRole = Session::getSession('role');
		$userProgram = null;
		if(!is_null($userId) && !is_null($userRole)) {
			$allPrograms = $this->searchDataFromTable("program", array());
			if($userRole == 1 || $userRole == 2) {
				/*if (count($allPrograms) >= 1) {
					$userProgram = $allPrograms[0]['id'];
				}else {
					array_push($this->model->data['errors'], "No program added!");
				}*/
				$userProgram = -1;
				array_push($this->model->data['errors'], "Admin/Teacher View shown (No test)!");
			}else if($userRole == 3) {
				$programForUser = $this->searchDataFromTable("personaldata", array('userId' => $userId));
				if(count($programForUser) > 0 && $programForUser[0]['programId'] > 0) {
					$userProgram = $programForUser[0]['programId'];
				}else {
					array_push($this->model->data['errors'], "No Program set for User!");
				}
			}else {
				array_push($this->model->data['errors'], "No valid role for User!");
			}
			$checkProgram = $this->getPKFromTable("program", array("id" => $userProgram));
			if($checkProgram == 0) {
				array_push($this->model->data['errors'], "No such program registered!");
			}else {
				// check models now
				$allModels = $this->searchDataFromTable("questionmodel", array('programId'=> $userProgram));
				if(count($allModels) > 0) {
					foreach ($allModels as $value) {
						$searchForQuestions = $dataToSearch = array("categoryId" => $value['categoryId'], "level" => $value['minLevel']);
						$allQues = $this->searchDataFromTable("questions", $dataToSearch);
						if(count($allQues) < $value['noOfQuestions']) {
							array_push($this->model->data['errors'], "Model with id: ".$value['id']." error. Questions needed: ".$value['noOfQuestions']." but available : ".count($allQues));
						}
					}					
				}else {
					array_push($this->model->data['errors'], "No Question Model set for the program!");
				}
			}
		}else {
			header("Location: ".SITE_URL."/user/login");
		}
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