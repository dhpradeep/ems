<?php

class QuestionModel extends Model{

	public function __construct() {
		// tablename for the model
		$this->table = 'userDetails';
		// primary key for the table
		$this->pk = 'id';
		
		$this->data = array();

		parent::__construct();
	}

	/**
	* @param $data : array
	* @return first id with given data.
	* @return 0 if fail
	*/
	public function getQuestionId($data) {
		return $this->getPk($data);
	}

	/**
	* This method register Question with given data
	* @param $data : array
	* @return last Question id on success
	* @return 0 on failure
	*/
	public function registerQuestion($data) {
		$this->setData($data);
		return $this->create();
	}

	/**
	* This method search Question with given data
	* @param $data : array
	* @param $sort : array
	* @return array with all matching records
	*/
	public function searchQuestion($data, $sort = null) {
		return $this->search($data, $sort);
	}

	/**
	* This method delete Question with given id
	* @param $id : num
	* @return 1 on success
	* @return 0 on failure
	*/
	public function deleteQuestion($id) {
		 return $this->delete($id);
	}

	/**
	* This method update Question with given id
	* @param $id : num
	* @param $data : array -> data to update
	* @return 1 on success
	* @return 0 on failure
	*/
	public function updateQuestion($id, $data) {
		$this->setData($data);
		return $this->update($id);
	}

	/**
	* This method give all Question registered
	* @return array of all Question
	*/
	public function getAllQuestion() {
		return $this->all();
	}
}

?>