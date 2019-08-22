<?php

class TestModel extends Model{

	public function __construct() {
		// tablename for the model
		$this->table = 'record';
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
	public function getTestId($data) {
		return $this->getPk($data);
	}

	/**
	* This method register Test with given data
	* @param $data : array
	* @return last Test id on success
	* @return 0 on failure
	*/
	public function registerTest($data) {
		$this->setData($data);
		return $this->create();
	}

	/**
	* This method search Test with given data
	* @param $data : array
	* @param $sort : array
	* @return array with all matching records
	*/
	public function searchTest($data, $sort = null) {
		return $this->search($data, $sort);
	}

	/**
	* This method delete Test with given id
	* @param $id : num
	* @return 1 on success
	* @return 0 on failure
	*/
	public function deleteTest($id) {
		 return $this->delete($id);
	}

	/**
	* This method update Test with given id
	* @param $id : num
	* @param $data : array -> data to update
	* @return 1 on success
	* @return 0 on failure
	*/
	public function updateTest($id, $data) {
		$this->setData($data);
		return $this->update($id);
	}

	/**
	* This method give all Test registered
	* @return array of all Test
	*/
	public function getAllTest() {
		return $this->all();
	}
}

?>