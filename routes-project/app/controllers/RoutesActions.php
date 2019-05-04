<?php
namespace controllers;
 /**
 * Controller RoutesActions
 **/
class RoutesActions extends ControllerBase{

	public function index(){
		echo "Usage of mecanism : /controller/action";
	}
	
	public function routeForbar(){
		echo "Dynamic bar route";
	}
}
