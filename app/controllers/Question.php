<?php

class Question extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		header("Location: ".SITE_URL."/question/all");
	}

	public function category($name = "") {
		$this->model->setTable('category');
		if(($name == "add" || $name == "update" || $name == "delete" || $name == "get") && Session::isLoggedIn(1)) {
			$result = array('status' => 0);	
			if(isset($_POST) && count($_POST) > 0) {
				if($name == "get") {
					return $this->getCategory($result);
				}
				if($name == "delete") {
					return $this->deleteCategory($result);
				}
				if($name == "update" && isset($_POST['id'])) {
					return $this->updateCategory($result);
				}
				if($name == "add") {
					return $this->addCategory($result);
				}
			}else{
				header("Location: ".SITE_URL."/home/dashboard");
			}	

		} else if($name == ''){	
			if(Session::isLoggedIn(1)) {
				$this->model->template = VIEWS_DIR.DS."questions".DS."category.php";
				$this->view->render();
			}else {
				header("Location: ".SITE_URL."/home/dashboard");
			}			
		} else {
			header("Location: ".SITE_URL."/home/message");
		}
    }
    
    public function all($name = "") {
		$this->model->setTable('questions');
		if(($name == "add" || $name == "update" || $name == "delete" || $name == "get") && Session::isLoggedIn(1)) {
			$result = array('status' => 0);	
			if(isset($_POST) && count($_POST) > 0) {
				if($name == "get") {
					return $this->getQuestion($result);
				}
				if($name == "delete") {
					return $this->deleteQuestion($result);
				}
				if($name == "update" && isset($_POST['id'])) {
					return $this->updateQuestion($result);
				}
				if($name == "add") {
					return $this->addQuestion($result);
				}
			}else{
				header("Location: ".SITE_URL."/home/dashboard");
			}	

		} else if($name == ''){	
			if(Session::isLoggedIn(1)) {
				$this->model->setTable('category');
				$all = $this->model->getAllQuestion();
				$this->model->data['category'] = $all;
				$this->model->template = VIEWS_DIR.DS."questions".DS."questions.php";
				$this->view->render();
			}else {
				header("Location: ".SITE_URL."/home/dashboard");
			}			
		} else {
			header("Location: ".SITE_URL."/home/message");
		}
    }
    
    public function program($name='') {
    	$this->model->setTable('program');
		if(($name == "add" || $name == "update" || $name == "delete" || $name == "get") && Session::isLoggedIn(1)) {
			$result = array('status' => 0);	
			if(isset($_POST) && count($_POST) > 0) {
				if($name == "get") {
					return $this->getProgram($result);
				}
				if($name == "delete") {
					return $this->deleteProgram($result);
				}
				if($name == "update" && isset($_POST['id'])) {
					return $this->updateProgram($result);
				}
				if($name == "add") {
					return $this->addProgram($result);
				}
			}else{
				header("Location: ".SITE_URL."/home/dashboard");
			}	

		} else if($name == ''){	
			if(Session::isLoggedIn(1)) {
				$this->model->template = VIEWS_DIR.DS."questions".DS."program.php";
				$this->view->render();
			}else {
				header("Location: ".SITE_URL."/home/dashboard");
			}			
		} else {
			header("Location: ".SITE_URL."/home/message");
		}
		
	}

	public function model($name=''){
		if($name != ""){
			if(Session::isLoggedIn(1)) {
				$this->setForeignModel("QuestionModel");
				$this->foreignModel->setTable("program");
				$allPrograms = $this->foreignModel->getAllQuestion();
				$program = null;
				$allInfo = null;
				foreach ($allPrograms as $value) {
					if($name == strtolower(trim(str_replace(' ', '', $value['name'])))) {
						$program = $value['name'];
						$allInfo = $value;
					}
				}
				if(!is_null($program)) {
					$this->model->setTable("category");
					$allCategories = $this->model->getAllQuestion();
					$this->model->data['program'] = $allInfo;
					$this->model->data['category'] = $allCategories;
					$this->model->template = VIEWS_DIR.DS."questions".DS."model.php";
					$this->view->render();
				}else {
					header("Location: ".SITE_URL."/home/message");
				}
			}else {
				header("Location: ".SITE_URL."/home/dashboard");
			}	
		}else{
			header("Location: ".SITE_URL."/home/message");
		}
	}

	public function modelController($name = '') {
		$this->model->setTable('questionmodel');
		if(($name == "add" || $name == "update" || $name == "delete" || $name == "get") && Session::isLoggedIn(1)) {
			$result = array('status' => 0);	
			if(isset($_POST) && count($_POST) > 0) {
				if($name == "get" && isset($_POST['programId'])) {
					return $this->getModel($result);
				}
				if($name == "delete") {
					return $this->deleteModel($result);
				}
				if($name == "update" && isset($_POST['id'])) {
					return $this->updateModel($result);
				}
				if($name == "add") {
					return $this->addModel($result);
				}
			}else{
				header("Location: ".SITE_URL."/home/dashboard");
			}	

		} else if($name == ''){
			header("Location: ".SITE_URL."/home/dashboard");	
		} else {
			header("Location: ".SITE_URL."/home/message");
		}
	}

	private function getModel($result) {
		$startIndex = $_POST['start'];
		$totalCount = $_POST['length'];
		$startIndex = ($totalCount == -1) ? 0 : $startIndex;
		$columnToSort = null;
		$sortDir = null;
		$stringToSearch = null;
		$fieldToSearch = array();
		if(isset($_POST["order"][0]["column"])){
			$sortDir = Sanitize::escape($_POST["order"][0]["dir"]);

			$columnToSort = $_POST["order"][0]["column"];

			$columnToSort = (!isset($_POST["columns"][$columnToSort]["name"]) && $_POST["columns"][$columnToSort]["orderable"]) ? $_POST["columns"][$columnToSort]["name"] : "categoryId" ;
			$columnToSort = Sanitize::escape($columnToSort);
		}
		if(isset($_POST["search"]["value"])) {
			$stringToSearch = Sanitize::escape($_POST["search"]["value"]);
		}
		$allModels = $this->model->getAllQuestionConditions($stringToSearch,$fieldToSearch,$columnToSort,$sortDir);
		$res = array();
		foreach ($allModels as $value) {
			if($value['programId'] == Input::get('programId')) {
				array_push($res, $value);
			}
		}
		$total = count($res);
		$index = 0;
		$arr = array();
		$totalCount = ($totalCount == -1) ? $total : $totalCount;
		for ($i = $startIndex; $i < $startIndex + $totalCount && $i < $total; $i++){
			$toSearch = array("id" => $res[$i]['categoryId']);
			$this->setForeignModel("QuestionModel");
			$this->foreignModel->setTable("category");
			$categories = $this->foreignModel->searchQuestion($toSearch);			
			$arr[$index] = $res[$i];
			$arr[$index]['category'] = $categories[0]['name'];
			switch ($arr[$index]['minLevel']) {
				case 1:
					$arr[$index]['levelName'] = "Basic";
					break;
				case 2:
					$arr[$index]['levelName'] = "Medium";
					break;
				case 3:
					$arr[$index]['levelName'] = "Hard";
					break;
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
		$result['recordsFiltered'] = $index;
		unset($_POST);
		return print json_encode($result);
	}

	private function deleteModel($result) {
		if(!isset($_POST['id'])) {
			$result['error'] = array("Invalid selection.");
			$result['status'] = 0;
		}else {
			$idToDel = Input::get('id');
			$dataToSearch = array('id' => $idToDel);
			$res = $this->model->searchQuestion($dataToSearch);
			if(count($res) >= 1) {
				$out = $this->model->deleteQuestion($idToDel);
				if($out == 1) {
					$result['status'] = 1;
				}else {
					$result['error'] = array("Connection Problem with server.");
					$result['status'] = 0;
				}
			}else {
				$result['error'] = array("No such model found.");
				$result['status'] = 0;
			}
		}
		$result['success'] = ($result['status'] == 1) ? true : false;
		unset($_POST);
		return print json_encode($result);
	}

	private function updateModel($result) {
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = Input::get($key);
		}
		$validate = new Validator();
		$validation = $validate->check($_POST, array());
		if($data['noOfQuestions'] <= 0) $validate->addError("No of Questions must be greater than 0!");
		if($data['minLevel'] <= 0 || $data['minLevel'] > 3 ) $validate->addError("Level isnot valid!");
		if($data['categoryId'] <= 0) $validate->addError("Category not valid!");
		if($validate->passed()){
			$dataForSearch = array('id' => $data['id']);
			$res = $this->model->searchQuestion($dataForSearch);
			if(count($res) >= 1) {
				$searchForQuestions = $this->setForeignModel("QuestionModel");
				$this->foreignModel->setTable("questions");
				$dataToSearch = array("categoryId" => $data['categoryId'], "level" => $data['minLevel']);
				$resultOfSearch = $this->foreignModel->searchQuestion($dataToSearch);
				if(count($resultOfSearch) >= $data["noOfQuestions"]) {
					$idToChange = $data['id'];
					unset($data['id']);
					$ret = $this->model->updateQuestion($idToChange, $data);
					if($ret == 1) {
						$result['status'] = 1;
						$result['success'] = true;
					} else {
						$result['status'] = -1;
						$result['errors'] = $validate->addError("Nothing updated!");
					}
				}else {
					$result['status'] = 0;
					$validate->addError("Only ".count($resultOfSearch)." questions of this level and category are available in Database!");
				}							
			} else {
				$result['errors'] = $validate->addError("No such model found.");
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

	private function addModel($result){
		$validate = new Validator();
		$validation = $validate->check($_POST, array());
		if(Input::get('noOfQuestions') <= 0) $validate->addError("No of Questions must be greater than 0!");
		if(Input::get('minLevel') <= 0 || Input::get('minLevel') > 3 ) $validate->addError("Level isnot valid!");
		if(Input::get('categoryId') <= 0) $validate->addError("Category not valid!");
		if($validate->passed()){
			$data = array();
			$data['id'] = null;
			foreach ($_POST as $key => $value) {
				$data[$key] = Input::get($key);
			}
			$searchForQuestions = $this->setForeignModel("QuestionModel");
			$this->foreignModel->setTable("questions");
			$dataToSearch = array("categoryId" => $data['categoryId'], "level" => $data['minLevel']);
			$resultOfSearch = $this->foreignModel->searchQuestion($dataToSearch);
			if(count($resultOfSearch) >= $data["noOfQuestions"]) {
				$id = $this->model->registerQuestion($data);
				if($id != 0){
					$result['status'] = 1;
					$result['success'] = true;
				}else{
					$result['status'] = -1;
					$validate->addError("Problem with connection to server!");
				}
			}else {
				$result['status'] = 0;
				$validate->addError("Only ".count($resultOfSearch)." questions of this level and category are available in Database!");
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

	private function getCategory($result) {
		$startIndex = $_POST['start'];
		$totalCount = $_POST['length'];
		$startIndex = ($totalCount == -1) ? 0 : $startIndex;
		$columnToSort = null;
		$sortDir = null;
		$stringToSearch = null;
		$fieldToSearch = array("name","description");
		if(isset($_POST["order"][0]["column"])){
			$sortDir = Sanitize::escape($_POST["order"][0]["dir"]);

			$columnToSort = $_POST["order"][0]["column"];

			$columnToSort = (!isset($_POST["columns"][$columnToSort]["name"]) && $_POST["columns"][$columnToSort]["orderable"]) ? $_POST["columns"][$columnToSort]["name"] : "name" ;
			$columnToSort = Sanitize::escape($columnToSort);
		}
		if(isset($_POST["search"]["value"])) {
			$stringToSearch = Sanitize::escape($_POST["search"]["value"]);
		}
		$res = $this->model->getAllQuestionConditions($stringToSearch,$fieldToSearch,$columnToSort,$sortDir);
		$total = count($res);
		$index = 0;
		$arr = array();
		$totalCount = ($totalCount == -1) ? $total : $totalCount;
		for ($i = $startIndex; $i < $startIndex + $totalCount && $i < $total; $i++){
			$arr[$index++] = $res[$i];
		}

		if(count($arr) >= 1){
			$result['status'] = 1;
		}
		$result['data'] = $arr;
		$result['success'] = ($result['status'] == 1) ? true : false;
		$result['draw'] = $_POST['draw'];
		$totalCategories = count($this->model->getAllQuestion());
		$result['recordsTotal'] = $totalCategories;
		$result['recordsFiltered'] = $total;
		unset($_POST);
		return print json_encode($result);
	}

	private function deleteCategory($result) {
		if(!isset($_POST['id'])) {
			$result['error'] = array("Invalid selection.");
			$result['status'] = 0;
		}else {
			$idToDel = Input::get('id');
			$dataToSearch = array('id' => $idToDel);
			$res = $this->model->searchQuestion($dataToSearch);
			if(count($res) >= 1) {
				$out = $this->model->deleteQuestion($idToDel);
				if($out == 1) {
					$result['status'] = 1;
					$this->setForeignModel("QuestionModel");
					$this->foreignModel->setTable("questions");
					$toDelete = array('categoryId' => $idToDel);
					$questionsToDelete = $this->foreignModel->searchQuestion($toDelete);
					foreach ($questionsToDelete as $value) {
						$this->foreignModel->deleteQuestion($value['id']);
					}
					$this->foreignModel->setTable("questionmodel");
					$toDelete = array('categoryId' => $idToDel);
					$questionsToDelete = $this->foreignModel->searchQuestion($toDelete);
					foreach ($questionsToDelete as $value) {
						$this->foreignModel->deleteQuestion($value['id']);
					}
				}else {
					$result['error'] = array("Connection Problem with server.");
					$result['status'] = 0;
				}
			}else {
				$result['error'] = array("No such category found.");
				$result['status'] = 0;
			}
		}
		$result['success'] = ($result['status'] == 1) ? true : false;
		unset($_POST);
		return print json_encode($result);
	}

	private function updateCategory($result) {
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
			$res = $this->model->searchQuestion($dataForSearch);
			if(count($res) >= 1) {
				$idToChange = $data['id'];
				unset($data['id']);
				$ret = $this->model->updateQuestion($idToChange, $data);
				if($ret == 1) {
					$result['status'] = 1;
					$result['success'] = true;
				} else {
					$result['status'] = -1;
					$result['errors'] = $validate->addError("Nothing updated!");
				}							
			} else {
				$result['errors'] = $validate->addError("No such category found.");
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

	private function addCategory($result){
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
			$id = $this->model->registerQuestion($data);
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

	private function getProgram($result) {
		$startIndex = $_POST['start'];
		$totalCount = $_POST['length'];
		$startIndex = ($totalCount == -1) ? 0 : $startIndex;
		$columnToSort = null;
		$sortDir = null;
		$stringToSearch = null;
		$fieldToSearch = array("name","duration");
		if(isset($_POST["order"][0]["column"])){
			$sortDir = Sanitize::escape($_POST["order"][0]["dir"]);

			$columnToSort = $_POST["order"][0]["column"];

			$columnToSort = (!isset($_POST["columns"][$columnToSort]["name"]) && $_POST["columns"][$columnToSort]["orderable"]) ? $_POST["columns"][$columnToSort]["name"] : "name" ;
			$columnToSort = Sanitize::escape($columnToSort);
		}
		if(isset($_POST["search"]["value"])) {
			$stringToSearch = Sanitize::escape($_POST["search"]["value"]);
		}
		$res = $this->model->getAllQuestionConditions($stringToSearch,$fieldToSearch,$columnToSort,$sortDir);
		$total = count($res);
		$index = 0;
		$arr = array();
		$totalCount = ($totalCount == -1) ? $total : $totalCount;
		for ($i = $startIndex; $i < $startIndex + $totalCount && $i < $total; $i++){
			$arr[$index] = $res[$i];
			$arr[$index]['welcome'] = html_entity_decode($arr[$index]['welcome']);
			$arr[$index]['thanks'] = html_entity_decode($arr[$index]['thanks']);
			$arr[$index]['url'] = urlencode(strtolower(trim(str_replace(' ', '', $arr[$index]['name']))));
			$index++;
		}

		if(count($arr) >= 1){
			$result['status'] = 1;
		}
		$result['data'] = $arr;
		$result['success'] = ($result['status'] == 1) ? true : false;
		$result['draw'] = $_POST['draw'];
		$totalCategories = count($this->model->getAllQuestion());
		$result['recordsTotal'] = $totalCategories;
		$result['recordsFiltered'] = $total;
		unset($_POST);
		return print json_encode($result);
	}

	private function deleteProgram($result) {
		if(!isset($_POST['id'])) {
			$result['error'] = array("Invalid selection.");
			$result['status'] = 0;
		}else {
			$idToDel = Input::get('id');
			$dataToSearch = array('id' => $idToDel);
			$res = $this->model->searchQuestion($dataToSearch);
			if(count($res) >= 1) {
				$out = $this->model->deleteQuestion($idToDel);
				if($out == 1) {
					$result['status'] = 1;
					$this->setForeignModel("QuestionModel");
					$this->foreignModel->setTable("questionmodel");
					$toDelete = array('programId' => $idToDel);
					$questionsToDelete = $this->foreignModel->searchQuestion($toDelete);
					foreach ($questionsToDelete as $value) {
						$this->foreignModel->deleteQuestion($value['id']);
					}
				}else {
					$result['error'] = array("Connection Problem with server.");
					$result['status'] = 0;
				}
			}else {
				$result['error'] = array("No such program found.");
				$result['status'] = 0;
			}
		}
		$result['success'] = ($result['status'] == 1) ? true : false;
		unset($_POST);
		return print json_encode($result);
	}

	private function updateProgram($result) {
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
			),
			'welcome' => array(
				'name' => 'Welcome Message',
				'required' => true,
				'min' => 1,
				'max' => 1200
			),
			'thanks' => array(
				'name' => 'Exit Message',
				'required' => true,
				'min' => 1,
				'max' => 1200
			)
		));
		if(Input::get('duration') <= 0 ) $validate->addError("Duration isnot valid!");
		if($validate->passed()){
			$dataForSearch = array('id' => $data['id']);
			$res = $this->model->searchQuestion($dataForSearch);
			if(count($res) >= 1) {
				$idToChange = $data['id'];
				unset($data['id']);
				$ret = $this->model->updateQuestion($idToChange, $data);
				if($ret == 1) {
					$result['status'] = 1;
					$result['success'] = true;
				} else {
					$result['status'] = -1;
					$result['errors'] = $validate->addError("Nothing updated!");
				}							
			} else {
				$result['errors'] = $validate->addError("No such program found.");
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

	private function addProgram($result){
		$validate = new Validator();
		$validation = $validate->check($_POST, array(
			'name' => array(
				'name' => 'Name',
				'required' => true,
				'min' => 1,
				'max' => 30
			),
			'welcome' => array(
				'name' => 'Welcome Message',
				'required' => true,
				'min' => 1,
				'max' => 1200
			),
			'thanks' => array(
				'name' => 'Exit Message',
				'required' => true,
				'min' => 1,
				'max' => 1200
			)
		));
		if(Input::get('duration') <= 0 ) $validate->addError("Duration isnot valid!");
		if($validate->passed()){
			$data = array();
			$data['id'] = null;
			foreach ($_POST as $key => $value) {
				$data[$key] = Input::get($key);
			}
			$id = $this->model->registerQuestion($data);
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

	private function getQuestion($result) {
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

			$columnToSort = ($columnToSort == "category") ? "categoryId" : $columnToSort;
			$columnToSort = ($columnToSort == "levelName") ? "level" : $columnToSort;
		}
		if(isset($_POST["search"]["value"])) {
			$stringToSearch = Sanitize::escape($_POST["search"]["value"]);
		}
		$res = $this->model->getAllQuestionConditions($stringToSearch,$fieldToSearch,$columnToSort,$sortDir);

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
			$toSearch = array("id" => $res[$i]['categoryId']);
			$this->setForeignModel("QuestionModel");
			$this->foreignModel->setTable("category");
			$categories = $this->foreignModel->searchQuestion($toSearch);			
			$arr[$index] = $res[$i];
			$arr[$index]['question'] = html_entity_decode($res[$i]['question']);
			$arr[$index]['category'] = $categories[0]['name'];
			switch ($arr[$index]['level']) {
				case 1:
					$arr[$index]['levelName'] = "Basic";
					break;
				case 2:
					$arr[$index]['levelName'] = "Medium";
					break;
				case 3:
					$arr[$index]['levelName'] = "Hard";
					break;
			}
			$index++;
		}

		if(count($arr) >= 1){
			$result['status'] = 1;
		}
		$result['data'] = $arr;
		$result['success'] = ($result['status'] == 1) ? true : false;
		$result['draw'] = $_POST['draw'];
		$totalCategories = count($this->model->getAllQuestion());
		$result['recordsTotal'] = $totalCategories;
		$result['recordsFiltered'] = $total;
		unset($_POST);
		return print json_encode($result);
	}

	private function deleteQuestion($result) {
		if(!isset($_POST['id'])) {
			$result['error'] = array("Invalid selection.");
			$result['status'] = 0;
		}else {
			$idToDel = Input::get('id');
			$dataToSearch = array('id' => $idToDel);
			$res = $this->model->searchQuestion($dataToSearch);
			if(count($res) >= 1) {
				$out = $this->model->deleteQuestion($idToDel);
				if($out == 1) {
					$result['status'] = 1;
				}else {
					$result['error'] = array("Connection Problem with server.");
					$result['status'] = 0;
				}
			}else {
				$result['error'] = array("No such question found.");
				$result['status'] = 0;
			}
		}
		$result['success'] = ($result['status'] == 1) ? true : false;
		unset($_POST);
		return print json_encode($result);
	}

	private function updateQuestion($result) {
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = Input::get($key);
		}
		$validate = new Validator();
		$validation = $validate->check($_POST, array(
			'question' => array(
				'name' => 'Question',
				'required' => true,
				'min' => 1,
				'max' => 1200
			),
			'answer' => array(
				'name' => 'Question',
				'required' => true,
				'min' => 1,
				'max' => 255
			),
			'choice2' => array(
				'name' => '2nd. Choice',
				'required' => true,
				'min' => 1,
				'max' => 255
			),
			'choice3' => array(
				'name' => '3rd. Choice',
				'required' => true,
				'min' => 1,
				'max' => 255
			),
			'choice4' => array(
				'name' => '4th. Choice',
				'required' => true,
				'min' => 1,
				'max' => 255
			)
		));
		if(Input::get('level') <= 0 || Input::get('minLevel') > 3 ) $validate->addError("Level isnot valid!");
		if(Input::get('categoryId') <= 0) $validate->addError("Category not valid!");
		if($validate->passed()){
			$dataForSearch = array('id' => $data['id']);
			$res = $this->model->searchQuestion($dataForSearch);
			if(count($res) >= 1) {
				$idToChange = $data['id'];
				unset($data['id']);
				$ret = $this->model->updateQuestion($idToChange, $data);
				if($ret == 1) {
					$result['status'] = 1;
					$result['success'] = true;
				} else {
					$result['status'] = -1;
					$result['errors'] = $validate->addError("Nothing updated!");
				}							
			} else {
				$result['errors'] = $validate->addError("No such category found.");
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

	private function addQuestion($result){
		$validate = new Validator();
		$validation = $validate->check($_POST, array(
			'question' => array(
				'name' => 'Question',
				'required' => true,
				'min' => 1,
				'max' => 255
			),
			'answer' => array(
				'name' => 'Answer',
				'required' => true,
				'min' => 1,
				'max' => 255
			),
			'choice2' => array(
				'name' => '2nd. Choice',
				'required' => true,
				'min' => 1,
				'max' => 255
			),
			'choice3' => array(
				'name' => '3rd. Choice',
				'required' => true,
				'min' => 1,
				'max' => 255
			),
			'choice4' => array(
				'name' => '4th. Choice',
				'required' => true,
				'min' => 1,
				'max' => 255
			),
			'level' => array(
				'name' => 'Level',
				'minLevel' => 0,
				'maxLevel' => 3
			),
			'categoryId' => array(
				'name' => 'Category',
				'minLevel' => 0
			)
		));
		if($validate->passed()){
			$data = array();
			$data['id'] = null;
			foreach ($_POST as $key => $value) {
				$data[$key] = Input::get($key);
			}
			$id = $this->model->registerQuestion($data);
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

}

?>