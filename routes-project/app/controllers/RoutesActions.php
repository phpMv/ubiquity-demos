<?php
namespace controllers;
 /**
 * Controller RoutesActions
 **/
class RoutesActions extends ControllerBase{

	public function index(){
		echo 'Usage of mecanism : /controller/action';
	}
	
	public function withParams($required,$optional="optional"){
		echo 'Usage of mecanism : /controller/action/params:<br>';
		echo 'params: '.$required.','.$optional;
	}
	
	public function routeForbar(){
		echo "Dynamic bar route";
	}
}
