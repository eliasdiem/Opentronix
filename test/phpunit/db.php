<?php

class dbsetup
{
	private $host = 'localhost';
	private $user = 'username';
	private $pass = 'password';
	private $dbname = 'dbname';
	private $conn = FALSE;

	public function __construct()
	{
	}

	public function connect()
	{
		$this->conn = mysql_connect($this->host, $this->user, $this->pass);
		if( FALSE == $this->conn ) {
			return;
		}
		$db = mysql_select_db($this->dbname, $this->conn);
		if( FALSE == $db ) {
			return;
		}
		mysql_query('SET NAMES utf8', $this->conn);
	}

	private function _query($query)
	{
		if( FALSE == $this->conn ) {
			return;
		}
		$result = mysql_query($query, $this->conn);
	}

	public function setup()
	{
		$q = <<<EOQ
			BLA BLA BLA
EOQ;

		$this->_query($q);
	}

	public function disconnect()
	{
	}
}

	public function __destruct()
	{
		if( $this->conn ) {
			@mysql_close($this->conn);
			$this->conn = FALSE;
		}
	}
?>
