<?php

class Test extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if(!Session::isloggedIn()) {
			header("Location: ".SITE_URL."/user/login");
		}else {
			$this->model->data['errors'] = array();
			$userId = Session::getSession('uid');
			$userRole = Session::getSession('role');
			$userProgram = null;
			if(!is_null($userId) && !is_null($userRole)) {
				$allPrograms = $this->searchDataFromTable("program", array());
				if($userRole == 1 || $userRole == 2) {
					header("Location: ".SITE_URL."/home/dashboard");
				}else if($userRole == 3) {
					if(is_null(Session::getSession("readMe"))) {
						Session::getSession("readMe", True);
					}
					$programForUser = $this->searchDataFromTable("personaldata", array('userId' => $userId));
					if(count($programForUser) > 0 && $programForUser[0]['groupId'] > 0) {
						$userGroup = $programForUser[0]['groupId'];
						$userProgram = $this->searchDataFromTable("programassign", array('groupId' => $userGroup));
						if(count($userProgram) > 0) {
							$userProgramArray = array();
							for($i = 0; $i < count($userProgram); ++$i) {
								$prog = $this->searchDataFromTable('program', array('id' => $userProgram[$i]['programId']));
								if( count($prog) <= 0) {
									array_push($this->model->data['errors'], "Unkown program registered!");
								}else {
									$previousExam = $this->searchDataFromTable("timetrack",array("userId" => Session::getSession('uid'), "programId" => $prog[0]['id']));
									$completed = 0;
									if(count($previousExam) > 0) {
										if($previousExam[0]['isSubmitted'] == "true" || $previousExam[0]['remainingTime'] <= 0) {
											$completed = 2;
										}else {
											$completed = 1;
										}
									}
									$prog[0]['completed'] = $completed;
									array_push($userProgramArray, $prog[0]);
								}
							}
							if(count($userProgramArray) <= 0) {
								array_push($this->model->data['errors'], "No valid program registered!");
							}else {
								$this->model->data['programs'] = $userProgramArray;
							}
						}else {
							array_push($this->model->data['errors'], "No Program set for User!");
						}						
					}else {
						array_push($this->model->data['errors'], "No Program set for User!");
					}
				}else {
					array_push($this->model->data['errors'], "No valid role for User!");
				}
				$this->model->template = VIEWS_DIR.DS."home".DS."dashboard.php";
				$this->view->render();
			}else {
				header("Location: ".SITE_URL."/user/login");
			}
		}
	}

	public function start($name='') {
		$this->model->data['errors'] = array();	

		if($name == '') {
			header("Location: ".SITE_URL."/test");	
		}else {
			$programId = $name;
		}
		if(!Session::isLoggedIn() || is_null(Session::getSession('role'))) {
			header("Location: ".SITE_URL."/user/login");	
		}
		if(is_null(Session::getSession("examStarted"))) {
			Session::setSession("examStarted", $programId);
		}
		
		if(is_null(Session::getSession("readMe"))) {
			header("Location: ".SITE_URL."/test");
		}else {
			Session::clearSession("examStarted");
		}
		$userProgram = $this->checkForValidProgram($programId);
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
						shuffle($matchingQuestions);
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
								"userAnswer" => null,
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
				foreach ($records as $key => $value) {
					$questionId = $value['questionId'];
					$questionDesc = $this->searchDataFromTable("questions", array('id' => $questionId));
					if(count($questionDesc) <= 0 ) {
						$records[$key]['question'] = "Question not found!";
						$records[$key]['answer'] = "Not found!";
						$records[$key]['choice2'] = "Not found!";
						$records[$key]['choice3'] = "Not found!";
						$records[$key]['choice4'] = "Not found!";
						$records[$key]['containPassage'] = 0;
						$records[$key]['userAnswer'] = null;
					}else {
						$records[$key]['question'] = $questionDesc[0]['question'];
						$records[$key]['answer'] = $questionDesc[0]['answer'];
						$records[$key]['choice2'] = $questionDesc[0]['choice2'];
						$records[$key]['choice3'] = $questionDesc[0]['choice3'];
						$records[$key]['choice4'] = $questionDesc[0]['choice4'];
						if($questionDesc[0]['passageId'] > 0) {
							$records[$key]['containPassage'] = 1;
							$passageDesc = $this->searchDataFromTable("passage", array('id' => $questionDesc[0]['passageId']));
							if(count($passageDesc) <= 0) {
								$records[$key]['passageTitle'] = "Passage Not found";
								$records[$key]['userAnswer'] = "The passage exists no longer";
							}else {
								$records[$key]['passageTitle'] = $passageDesc[0]['passageTitle'];
								$records[$key]['passage'] = $passageDesc[0]['passage'];
							}
						}else {
							$records[$key]['containPassage'] = 0;
						}
					}
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
					array_push($this->model->data['errors'], "Exam submitted");
					$programT =$this->searchDataFromTable("program", array("id" => $userProgram));
					if(count($programT) > 0) {
						$this->model->data['thanks'] = htmlspecialchars_decode($programT[0]['thanks']);
					}
				}else {
					$examId = $previousExam[0]['id'];
					$this->model->data['remainingTime'] = $previousExam[0]['remainingTime'] - 2;
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

	private function checkForValidProgram($programId) {
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
				$groupForUser = $this->searchDataFromTable("personaldata", array('userId' => $userId));
				if(count($groupForUser) > 0 && $groupForUser[0]['groupId'] > 0) {
					$programForUser = $this->searchDataFromTable("programassign", array('groupId' => $groupForUser[0]['groupId']));
					if(count($programForUser) > 0) {	
						$found = false;
						for($i = 0; $i< count($programForUser); ++$i) {
							if($programId == $programForUser[$i]['programId'])
								$found = true;
						}
						if($found == true)
							$userProgram = $programId;
						else 
							array_push($this->model->data['errors'], "No Program set for User!");
					}else {
						array_push($this->model->data['errors'], "No Program set for User!");
					}
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


	public function update($name = "") {
		if(Session::isLoggedIn() && isset($_POST['examId']) && $name == "status") {
			return $this->updateExamStatus();
		}else if(Session::isLoggedIn() && isset($_POST['examId']) && $name == "answer") {
			return $this->updateExamAnswer();
		}else if(Session::isLoggedIn() && isset($_POST['examId']) && $name == "get") {
			return $this->updateExamRecords();
		}else{
			header("Location: ".SITE_URL."/home/message");			
		}
	}

	private function updateExamRecords() {
		$response = array("success" => 0, "records" => array());
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = Input::get($key);
		}
		if($data['examId'] > 0) {
			$allRecords = $this->searchDataFromTable("record", array("examId" => $data['examId']));
			if(count($allRecords) > 0) {
				$response['success'] = 1;
				$sortForId = $this->sortForCategoryId($allRecords);
				foreach ($sortForId as $key => $value) {
					$countOfkey = 0;
					foreach ($value as $index => $wert) {
						if($wert["userAnswer"] != null && $wert["userAnswer"] != "") $countOfkey++;
					}
					$response['records'][$key] = $countOfkey;
				}
			}
		}
		unset($_POST);
		return print json_encode($response);
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
		unset($_POST);
	}

	private function updateExamAnswer() {
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = Input::get($key);
		}
		$primKey = $this->searchDataFromTable("record", array(
			"examId" => $data['examId'],
			"questionId" => $data['questionId']
		));
		$response = array("newAnswer" => 0);

		$conditions = 0;
		if(count($primKey) > 0) {
			$ques = $this->searchDataFromTable("questions", array('id' => $data['questionId']));
			if(count($ques) > 0) {
				$conditions = 1;
				$data['answer'] = $ques[0]['answer'];
			}
		}
		if($conditions > 0) {
			if($primKey[0]['userAnswer'] == null || $primKey[0]['userAnswer'] == "") $response['newAnswer'] = 1;
			if(strtolower(trim(str_replace(' ', '', $data['answer']))) == strtolower(trim(str_replace(' ', '', $data['userAnswer'])))) {
				$data['result'] = 1;
			} else {
				$data['result'] = 0;
			}
			$this->updateDataToTable("record", $primKey[0]['id'], array(
				"examId" => $data['examId'],
				"questionId" => $data['questionId'],
				"userAnswer" => $data['userAnswer'],
				"result" => $data['result']
			));
		}
		unset($_POST);
		return print json_encode($response);
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