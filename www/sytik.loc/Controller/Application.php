<?php
require_once("Model/Model.php");

class Application{

	protected $relationsTable;
	protected $model;
	protected $students;
	
	function __construct(){
		$this->relationsTable = new RelationsTable;
		$this->model = new Courses;
		$this->students = new Students;
	}

	function do(){
		ob_start();
		require 'View/GeneralHeder.phtml';

		if(isset($_POST['adminEntry']) AND !empty($_POST['adminEntry'])){
	
			if(isset($_POST['adminPass']) AND $_POST['adminPass']==="admin"){

				$_SESSION['auth'] = 'log';
				$_SESSION['message']='Admin panel';
			}else{
				$_SESSION['auth'] = 1;
				
			}

		}
					require 'View/LoginForm.phtml';	

		
		
		
		
		if($_SESSION['auth']==='log'){
			if(isset($_POST['addStudOnCourse'])){
			$this->relationsTable->addStudOnCourse(intval($_POST['id_course']),intval($_POST['id_stud']));
			}
			if(isset($_POST['delStudFromCourse'])){
			$this->relationsTable->delStudFromCourse($_POST['id_course'],$_POST['id_stud']);
			}
			if(isset($_POST['courseEdit'])){
			$this->model->editItem('courses',$_POST['courseId'],$_POST['courseTitle'],$_POST['courseTeacher']);
			}
			if(isset($_POST['addCourse'])){
			$this->model->addItem('courses',$_POST['addcourseTitle'],$_POST['addcourseTeacher']);
			}
			if(isset($_POST['addStud'])){
			$this->students->addItem('students',$_POST['addnameStud'],$_POST['addemailStud']);
			}
			if(isset($_POST['studEdit'])){
			$this->students->editItem('students',$_POST['studId'],$_POST['studName'],$_POST['studEmail']);
			}

			$this->checkDeleteItem($_POST['delStud'],'students','students');
			$this->checkDeleteItem($_GET['deleteCourse'],'model','courses');
			//$this->getElem('RelationHeder.phtml','relationsTable','','RelationTable.phtml');

			$this->getElem('Heder.phtml','model','courses','GeneralTable.phtml');
			$this->getElem('Hederstud.phtml','students','students','GeneralTablestud.phtml');
				
		require 'View/Form.phtml';
		}
		$this->getElem('RelationHeder.phtml','relationsTable','','RelationTable.phtml');

		
		
		
		require 'View/Footer.phtml';

		$result = ob_get_contents();

		ob_end_clean();
		echo $result;
	}

	
	function getElem($hederTemplate,$model,$table,$template){
		require 'View/'.$hederTemplate;
		foreach($this->$model->getAll($table) as $item){
		foreach($item as $val){
			extract($item);
		}
		if($table=="courses"){
			$delid="?deleteCourse=".$id;
			$editCourse = "?editId=".$id."&editTitle=".$title."&editTeacher=".$teacher."#editCourses";
		}
		require 'View/'.$template;
		}
		require 'View/FooterTable.phtml';

		return $this;
	}
	function checkDeleteItem($delSubmit,$model,$table){
			if(isset($delSubmit) AND !empty($delSubmit)){
		$this->$model->deleteItem($table,$delSubmit);
		}
		return $this;
	}


}