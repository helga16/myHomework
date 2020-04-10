<?php
namespace Framework\Model;
use PDO;



class Textmodel {

	protected $db;
	public $val;
	public $table;
	

	function __construct(){
		$this->db = new PDO('mysql:host=127.0.0.1;dbname=test','olga','password');
	}


	function getInfo($val,$table){
		$this->val = $val;
		$this->table=$table;
		$query="SELECT $this->val FROM $this->table";
		$stmt = $this->db->query($query);
		$row=$stmt->fetch();
		return $row[$this->val];
	}
}