<?php

class Result extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		header("Location: ".SITE_URL."/result/all");
	}


	public function all($name="") {
		if(Session::isLoggedIn(1)) {
			if($name == "") {
				$all = $this->searchDataFromTable("program",array());
				$this->model->data['program'] = $all;
				$this->model->template = VIEWS_DIR.DS."result".DS."result.php";
				$this->view->render();
			}else if($name == "get" && isset($_POST)){
				$result = array("status" => 0);
				return $this->getResult($result);
			}else if($name == "delete" && isset($_POST['id'])) {
				$result = array("status" => 0);
				return $this->deleteResult($result); 
			}else{
				header("Location: ".SITE_URL."/home/message");
			}
		}else {
			header("Location: ".SITE_URL."/home/dashboard");			
    	}
	}

	private function getResult($result) {
		$startIndex = $_POST['start'];
		$totalCount = $_POST['length'];
		$startIndex = ($totalCount == -1) ? 0 : $startIndex;
		$columnToSort = null;
		$sortDir = null;
		$stringToSearch = null;
		$fieldToSearch = array();

		$resu = $this->model->getAllDataConditions($stringToSearch,$fieldToSearch,$columnToSort,$sortDir);

		$examIds = array();
		foreach ($resu as $key) {
			if(!in_array($key['examId'], $examIds)) {
				array_push($examIds, $key['examId']);
			}
		}

		$res = array();

		foreach ($examIds as $exam) {
			$singleData = array();
			$singleExamData = $this->searchDataFromTable("record", array("examId" => $exam));
			$userNameDetails = $this->searchDataFromTable("userlogin", array("id" => $singleExamData[0]['userId']));
			if(count($userNameDetails) > 0) {
				$singleData['name'] = $userNameDetails[0]['fname']. " ".$userNameDetails[0]['mname']. " ".$userNameDetails[0]['lname'];
			}
			$singleData['userId'] = $singleExamData[0]['userId'];
			$singleData['id'] = $exam;	
			$countVar = 0;
			foreach ($singleExamData as $index) {
				if($index['result'] == 1)
					$countVar++;
			}
			$singleData['countRightAnswer'] = $countVar;
			$singleData['totalAnswers'] = count($singleExamData);
			$singleData['percent'] = round(($countVar / count($singleExamData)) * 100, 2);
			$programs = $this->searchDataFromTable("timetrack", array("id" => $exam));
			if(count($programs) > 0) {
				$pID = $programs[0]['programId'];
				$programNames = $this->searchDataFromTable("program", array("id" => $pID));
				if(count($programNames) > 0) {
					$singleData['programName'] = $programNames[0]['name'];
					$singleData['programId'] = $pID;
				}else {
					$singleData['programName'] = "Unknown";
					$singleData['programId'] = 0;
				}			
			}	
			array_push($res, $singleData);
		}

		if(isset($_POST['filterData']) && $_POST['filterData'] > 0) {
			$i = 0;
			foreach ($res as $value) {
				if($value['programId'] != $_POST['filterData']) {
					array_splice($res, $i, 1);
					$i--;
				}
				$i++;
			}
		}

		$name  = array_column($res, 'name');
		$programName = array_column($res, 'programName');
		$percent = array_column($res, 'percent');
		$toSort = (isset($_POST["order"][0]["column"])) ? $_POST["columns"][$_POST["order"][0]["column"]]["data"] : $percent;
		if(isset($_POST["order"][0]["dir"]) && ($toSort == "name" || $toSort == "programName"|| $toSort == "percent")) {
			if($_POST["order"][0]["dir"] == "asc")
				array_multisort($$toSort, SORT_ASC, $res);
			else
				array_multisort($$toSort, SORT_DESC, $res);
		}

		$total = count($res);
		$index = 0;
		$arr = array();
		$totalCount = ($totalCount == -1) ? $total : $totalCount;
		for ($i = $startIndex; $i < $startIndex + $totalCount && $i < $total; $i++){
			$arr[$index] = $res[$i];		
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

	private function deleteResult() {
		if(!isset($_POST['id'])) {
			$result['error'] = array("Invalid selection.");
			$result['status'] = 0;
		}else {
			$idToDel = Input::get('id');
			$dataToSearch = array('id' => $idToDel);
			$res = $this->searchDataFromTable("timetrack",array("id" => $idToDel));
			if(count($res) >= 1) {
				$out = $this->deleteDataFromTable("timetrack", $idToDel);
				if($out == 1) {
					$result['status'] = 1;
					$this->setForeignModel("QuestionModel");
					$this->foreignModel->setTable("record");
					$toDelete = array('examId' => $idToDel);
					$questionsToDelete = $this->foreignModel->searchQuestion($toDelete);
					foreach ($questionsToDelete as $value) {
						$this->foreignModel->deleteQuestion($value['id']);
					}
				}else {
					$result['error'] = array("Connection Problem with server.");
					$result['status'] = 0;
				}
			}else {
				$result['error'] = array("No such result found.");
				$result['status'] = 0;
			}
		}
		$result['success'] = ($result['status'] == 1) ? true : false;
		unset($_POST);
		return print json_encode($result);
	}

	public function exam($name="") {
		if(Session::isLoggedIn(1)) {
			if($name != ""){
				$examDetails = $this->searchDataFromTable("timetrack", array("id" => $name));
				if(count($examDetails) > 0) {
					$personNames = $this->searchDataFromTable("userlogin", array("id" => $examDetails[0]['userId']));
					if(count($personNames) > 0) {
						$personName = $personNames[0]['fname']." ".$personNames[0]['mname']." ".$personNames[0]['lname'];
						$userName = $personNames[0]['username'];
					}
					$this->model->data = array(
					'message'=> array(
					'content' => 'Result of <b>'.$personName.'</b> (Username : '.$userName.' )'
					));

					if($examDetails[0]['isSubmitted'] == "true") {
						$this->model->data['status'] = "Submitted";
					}else {
						$this->model->data['status'] = "Not Submitted";
					}

					$all = $this->searchDataFromTable("category", array());
					$this->model->data['category'] = $all;
					$this->model->data['examId'] = $name;
					$this->model->template = VIEWS_DIR.DS."result".DS."single_result.php";
					$this->view->render();
				}else {
					header("Location: ".SITE_URL."/home/message/No+Exam+Found/404");
				}				
			}else{
				header("Location: ".SITE_URL."/home/dashboard");
			}
		}else {
			header("Location: ".SITE_URL."/home/dashboard");			
    	}
	}

	public function examController($name = "") {
    	$this->model->setTable('record');
		if(($name == "get") && Session::isLoggedIn(1) && isset($_POST['id'])) {
			$result = array('status' => 0);
			if($name == "get") {
				return $this->getResultDetail($result);
			}	
		} else {
			header("Location: ".SITE_URL."/home/message");
		}
	}

	private function getResultDetail($result) {
		$startIndex = $_POST['start'];
		$totalCount = $_POST['length'];
		$startIndex = ($totalCount == -1) ? 0 : $startIndex; 
		$columnToSort = null;
		$sortDir = null;
		$stringToSearch = null;
		$fieldToSearch = array("question");

		if(isset($_POST["order"][0]["column"])){
			$sortDir = Sanitize::escape($_POST["order"][0]["dir"]);

			$columnToSort = $_POST["order"][0]["column"];

			$columnToSort = (isset($_POST["columns"][$columnToSort]["data"]) && $_POST["columns"][$columnToSort]["orderable"]) ? $_POST["columns"][$columnToSort]["data"] : "question" ;
			$columnToSort = Sanitize::escape($columnToSort);
		}

		if(isset($_POST["search"]["value"])) {
			$stringToSearch = Sanitize::escape($_POST["search"]["value"]);
		}

		$res = $this->model->getAllDataConditions($stringToSearch,$fieldToSearch,$columnToSort,$sortDir);

		if(isset($_POST['id']) && $_POST['id'] > 0) {
			$i = 0;
			foreach ($res as $value) {
				if($value['examId'] != $_POST['id']) {
					array_splice($res, $i, 1);
					$i--;
				}
				$i++;
			}
		}

		if(isset($_POST['filterData']) && $_POST['filterData'] > 0) {
			$i = 0;
			foreach ($res as $value) {
				if($value['categoryId'] != $_POST['filterData']) {
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
			$arr[$index]['question'] = html_entity_decode($res[$i]['question']);	
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