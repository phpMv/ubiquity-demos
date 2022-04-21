<?php
namespace controllers;
 /**
  * Controller MainController
  */
class MainController extends \controllers\ControllerBase{

	public function index(){
		$this->showMessage('Database-uuid-project','This project show the usage of ramsey uuid library with Ubiquity ORM.');
		$this->loadView("MainController/index.html");
	}

	protected function showMessage($title,$content,$type='info',$icon='info'){
		$this->loadView('@activeTheme/main/message.html',compact('title','content','type','icon'));
	}
}
