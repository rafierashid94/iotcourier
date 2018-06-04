<?php
require_once 'config.php';

class Database{
    
	private $host 		= null;
	private $user 		= null;
	private $pass 		= null;
    private $database 	= null;

    private $connection = null;

    function __construct(){
			$this->host = Config::$db_host;
			$this->user = Config::$db_user;
			$this->pass = Config::$db_pass;
			$this->database = Config::$db_name;
    }
    
    public function connect(){
		
		if(!$this->connection || $this->connection==null){
			$conn = new mysqli($this->host,$this->user,$this->pass,$this->database);
		}
		return $conn;
	}

	public function disconnect($conn){
		$conn->close();
	}
}
?>