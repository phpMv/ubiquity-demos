<?php
namespace controllers;
 use Ubiquity\attributes\items\router\Route;

 /**
  * Controller MainController
  */
class MainController extends \controllers\ControllerBase{

	#[Route(name: 'home')]
	public function index(){
		$this->showMessage('Auth-Acls-project','This controller handles authentication, but does not require to be logged in.<br>You can test the rights for the connected user below.','info','info circle');
		$this->loadView("MainController/index.html");
	}
	public function isValid($action):bool {
		return true;
	}
}
