<?php
namespace controllers;
use Ubiquity\attributes\items\di\Autowired;
use Ubiquity\attributes\items\router\Get;
 use Ubiquity\attributes\items\router\Route;
use Ubiquity\utils\flash\FlashBag;

/**
  * Controller MainController
  */
class MainController extends \controllers\ControllerBase{

	#[Autowired]
	public FlashBag $bag;

	#[Route('_default')]
	public function index(){
		$this->loadView("MainController/index.html");
	}

	#[Get(path: "/flash",name: "main.flash")]
	public function flash(){
		$this->bag->addMessage('This is a temporary message','No title','info','info circle');
		$this->loadView('MainController/flash.html');
	}

}
