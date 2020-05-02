<?php

class Model{



private static $obj;
private $db;
private function __clone(){}
private function __wakeup(){}

public function __construct(){
	$user = 'olga';
$pass = 'password';
$host = '127.0.0.1';
$db = 'school';
	$this->pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
}

public static function getConnect(){

	if(!is_object(self::$obj)){

		self::$obj= (new self())->pdo;
	}
	return self::$obj;
}
}

class Courses {
private $pdo;

function __construct(){
	$this->pdo = Model::getConnect(); 
}

function getAll($table){
	$arrData=[];
	
	foreach($this->pdo->query("SELECT *FROM $table", PDO::FETCH_ASSOC) as $row){
		$arrData[] = $row;
	}
return $arrData;	
}

	function deleteItem($table,$id){
	
	$stmt = $this->pdo->query("Delete FROM $table WHERE id=$id");
	}

	function editItem($table,$id,$title,$teacher){

		/*$this->pdo->query("UPDATE courses SET title='$title', teacher= '$teacher' WHERE id='$id'");
		*/
	
	$stmt = $this->pdo->prepare("UPDATE $table SET title=:title, teacher= :teacher WHERE id= :id");
	$stmt->execute(array('title'=>$title, 'teacher'=>$teacher,'id'=>$id));
	
	}

	function addItem($table,$title,$teacher){

		
		$stmt = $this->pdo->prepare("INSERT INTO $table (title, teacher) VALUES(:title, :teacher)");
		$stmt->execute(array('title'=>$title, 'teacher'=>$teacher));
		
		}

}


class Students {
private $pdo;

function __construct(){
	$this->pdo = Model::getConnect(); 
}

function getAll($table){
	$arrData=[];
	
	foreach($this->pdo->query("SELECT *FROM $table", PDO::FETCH_ASSOC) as $row){
		$arrData[] = $row;
	}
return $arrData;	
}

function editItem($table,$id,$name,$email){

	$stmt = $this->pdo->prepare("UPDATE $table SET name=:name, email= :email WHERE id= :id");
	$stmt->execute(array('name'=>$name, 'email'=>$email,'id'=>$id));
	
	}

	function addItem($table,$name,$email){

		
		$stmt = $this->pdo->prepare("INSERT INTO $table (name, email) VALUES(:name, :email)");
		$stmt->execute(array('name'=>$name, 'email'=>$email));
		
		}


function deleteItem($table,$id){
	
	$stmt = $this->pdo->prepare("Delete FROM $table WHERE id=:id");
	$stmt->execute(array('id'=>$id));
	}
}

class RelationsTable{
	
	private $pdo;

	function __construct(){
		$this->pdo = Model::getConnect(); 
	}

	function getAll(){
	$arrData=[];
	
	foreach($this->pdo->query("SELECT title,teacher,name,email FROM courses INNER JOIN course_student cs on(cs.id_course=courses.id) INNER JOIN students on(students.id=cs.id_stud)", PDO::FETCH_ASSOC) as $row){
		$arrData[] = $row;
	}
return $arrData;	
}

	function addStudOnCourse($idcourse,$idstud){
		//$idstud = intval($idstud);
		//$idcourse = intval($idcourse);
		$stmt = $this->pdo->prepare("INSERT INTO `course_student` VALUES(:idcourse, :idstud)");
		$stmt->execute(array('idcourse'=>$idcourse, 'idstud'=>$idstud));

	}
	function delStudFromCourse($id_course,$id_stud){
		$id_stud = intval($id_stud);
		$id_course = intval($id_course);
		$stmt = $this->pdo->prepare("DELETE FROM `course_student` WHERE id_course = :id_course AND id_stud = :id_stud");
		$stmt->execute(array('id_course'=>$id_course, 'id_stud'=>$id_stud));

	}
}