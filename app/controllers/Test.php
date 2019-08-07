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
		$userProgram = $this->checkForValidProgram();
		if(count($this->model->data['errors']) == 0) {
			$examId = $this->checkForValidExam($userProgram);
			if(count($this->model->data['errors']) == 0 && $examId != 0) {
				$this->model->data['categories'] = $this->sortForId($this->searchDataFromTable("category", array()));
				$this->model->data['examId'] = $examId;
				//for new exam
				//generate questions and categories and save to records.
				$records = $this->searchDataFromTable("record", array("userId" => Session::getSession('uid'),
					"examId" => $examId));
				if(count($records) <= 0) {
					$allModels = $this->searchDataFromTable("questionmodel", array("programId" => $userProgram));
					foreach ($allModels as $model) {
						$toSearch = array(
							"categoryId" => $model['categoryId'],
							"level" => $model['minLevel']
						);
						$matchingQuestions = $this->searchDataFromTable("questions", $toSearch);
						$length = count($matchingQuestions);
						$toRemove = $length - $model['noOfQuestions'];
						for($toRemove; $toRemove > 0; $toRemove--) {
							$randomVal = rand(0,count($matchingQuestions)-1);
							array_splice($matchingQuestions, $randomVal, 1);
						}
						foreach ($matchingQuestions as $question) {
							$toRecord = array(
								"examId" => $examId,
								"userId" => Session::getSession('uid'),
								"categoryId" => $model['categoryId'],
								"questionId" => $question['id'],
								"question" => $question['question'],
								"userAnswer" => null,
								"answer" => $question['answer'],
								"choice2" => $question['choice2'],
								"choice3" => $question['choice3'],
								"choice4" => $question['choice4'],
								"result" => 0
							);
							$this->setDataToTable("record", $toRecord);
						}

					}
					$records = $this->searchDataFromTable("record", array("userId" => Session::getSession('uid'),
					"examId" => $examId));
				}else {
					$records = $records;
				}
				$this->model->data['questions'] = $this->sortForCategoryId($records);
			}
		}
		$this->model->template = VIEWS_DIR.DS."test".DS."test.php";
		$this->view->render();
	}

	private function sortForCategoryId($records) {
		$categories = array();
		$finalOutput = array();
		foreach ($records as $value) {
			if(!(in_array($value['categoryId'], $categories))) {
				array_push($categories, $value['categoryId']);
				$finalOutput[$value['categoryId']] = array();
				array_push($finalOutput[$value['categoryId']], $value);
			} else {
				array_push($finalOutput[$value['categoryId']], $value);
			}
			
		}
		return $finalOutput;
	}

	private function sortForId($records) {
		$categories = array();
		$finalOutput = array();
		foreach ($records as $value) {
			if(!(in_array($value['id'], $categories))) {
				array_push($categories, $value['id']);
				$finalOutput[$value['id']] = array();
				array_push($finalOutput[$value['id']], $value);
			} else {
				array_push($finalOutput[$value['id']], $value);
			}
			
		}
		return $finalOutput;
	}

	private function checkForValidExam($userProgram) {
			$examId = 0;
			$previousExam = $this->searchDataFromTable("timetrack",array("userId" => Session::getSession('uid'), "programId" => $userProgram));
			if(count($previousExam) > 0) {
				if($previousExam[0]['isSubmitted'] == "true" || $previousExam[0]['remainingTime'] <= 0) {
					array_push($this->model->data['errors'], "Exam already submitted");
					$programT =$this->searchDataFromTable("program", array("id" => $userProgram));
					if(count($programT) > 0) {
						$this->model->data['thanks'] = htmlspecialchars_decode($programT[0]['thanks']);
					}
				}else {
					$examId = $previousExam[0]['id'];
					$this->model->data['remainingTime'] = $previousExam[0]['remainingTime'];
				}
			}else {
				$programs = $this->searchDataFromTable("program", array("id" => $userProgram));
				if(count($programs) > 0) {
					$totalTime = $programs[0]['duration'];
					if($totalTime <= 0) {
						array_push($this->model->data['errors'], "Invalid time set");
					}else {
						$toTable = array(
							"userId" => Session::getSession('uid'),
							"programId" => $userProgram,
							"remainingTime" => $totalTime * 60,
							"isSubmitted" => "false"
						);
						$examId = $this->setDataToTable("timetrack", $toTable);
						$this->model->data['remainingTime'] = $totalTime * 60;
					}
				}else {
					array_push($this->model->data['errors'], "No such program registered!");
				}
			}
			return $examId;
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
						}else {
							return $userProgram;
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

	public function update($name = "") {
		if(Session::isLoggedIn() && isset($_POST) && $name == "status") {
			return $this->updateExamStatus();
		}else {
			header("Location: ".SITE_URL."/home/message");			
		}
	}

	private function updateExamStatus() {
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = Input::get($key);
		}
		if($data['remainingTime'] < 5 || $data['isSubmitted'] == "true") {
			$toTable = array(
				"isSubmitted" => "true",
				"remainingTime" => 0
			);
			$this->updateDataToTable("timetrack", $data['examId'], $toTable);
		} else {
			$toTable = array(
				"remainingTime" => $data['remainingTime']
			);
			$this->updateDataToTable("timetrack", $data['examId'], $toTable);
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