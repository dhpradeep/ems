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
			if(isset($_POST)) {
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
    
    public function all() {
		$this->model->template = VIEWS_DIR.DS."questions".DS."questions.php";
		$this->view->render();
    }
    
    public function model($name='') {
		if($name == "bca"){
			$this->model->template = VIEWS_DIR.DS."questions".DS."modelDetails.php";
		}elseif($name == 'bba'){
			$this->model->template = VIEWS_DIR.DS."questions".DS."modelDetails.php";
		}elseif($name == 'bph'){
			$this->model->template = VIEWS_DIR.DS."questions".DS."modelDetails.php";
		}elseif($name == ''){
			$this->model->template = VIEWS_DIR.DS."questions".DS."model.php";
		}else{
			header("Location: ".SITE_URL."/home/message");
		}
		$this->view->render();
	}

	public function name() {
		$this->model->template = VIEWS_DIR.DS."questions".DS."modelDetails.php";
		$this->view->render();
	}

	private function getCategory($result) {
		$startIndex = $_POST['start'];
		$totalCount = $_POST['length'];
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

}

?>