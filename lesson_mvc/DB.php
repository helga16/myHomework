<?php
namespace Framework\Model; 
use PDO;

/**
 * Class DB
 * @package Framework\Model
 */
class DB {
	private static $obj;
	private function __clone(){

	}
	private function __wakeup(){

	}
public function __construct(){


$this->dbh = new PDO('mysql:host=127.0.0.1;dbname=test','olga','password');
}

public static function getConnect(){
	if(! is_object(self::$obj)){
self::$obj = (new self())->dbh;
}
return self::$obj;
}
	
}