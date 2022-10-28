<?php
/**
 * Function: Add a Controller Database Connection.
 * Thank you: https://phppot.com/php/simple-php-shopping-cart/
 * */

class DBController {
	/**
	 * Editing a configuration variables.
	 * */
	private $db_host = "xxxx";
	private $db_user = "xxxx";
	private $db_pass = "xxxx";
	private $db_name = "xxxx";
	private $db_conn;
	
	/**
	 * Don't edit.
	 * */
	function __construct() {
		$this->db_conn = $this->connectDB();
	}
	
	function connectDB() {
		$db_conn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		return $db_conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->db_conn, $query);
		while($row = mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}

	function processQuery($query) {
		$result  = mysqli_query($this->db_conn, $query);
		return $result;	
	}

	function numRows($query) {
		$result  = mysqli_query($this->db_conn, $query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>