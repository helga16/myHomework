<?php
namespace Framework\Model;




class Textmodel {

	protected $db;
	public $val;
	public $table;
	

	function __construct(){
		$this->db = DB::getConnect();

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