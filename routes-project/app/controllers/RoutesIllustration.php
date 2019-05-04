<?php
namespace controllers;
 use Ubiquity\controllers\Router;

 /**
 * Controller RoutesIllustration
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 **/
class RoutesIllustration extends ControllerBase{

	public function index(){
		$this->jquery->getHref("a","#response");
		$this->jquery->renderView("RoutesIllustration/index.html");
	}
}
