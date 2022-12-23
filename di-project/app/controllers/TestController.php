<?php
namespace controllers;
 use services\CounterService;
 use Ubiquity\attributes\items\di\Autowired;
 use Ubiquity\attributes\items\di\Injected;
 use Ubiquity\attributes\items\router\Route;

 /**
  * Controller TestController
  */
 #[Route('test',automated: true)]
class TestController extends \controllers\ControllerBase{

	#[Autowired]
	public CounterService $counter;

	#[Injected('counterD')]
	public CounterService $counterDown;

	public function index(){
		$this->loadView("TestController/index.html",['counter'=>$this->counter,'counterD'=>$this->counterDown]);
	}

	#[Route(name: 'test.inc')]
	public function inc(){
		$this->counter->inc();
		$this->counterDown->inc();
		$this->index();
	}

	#[Route(name: 'test.clear')]
	public function clear(){
		$this->counter->clear();
		$this->counterDown->clear();
		$this->index();
	}
}
