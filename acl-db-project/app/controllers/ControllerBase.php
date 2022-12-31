<?php
namespace controllers;

use Ajax\php\ubiquity\JsUtils;
use Ubiquity\controllers\auth\AuthController;
use Ubiquity\controllers\auth\WithAuthTrait;
use Ubiquity\controllers\Controller;
use Ubiquity\controllers\Startup;
use Ubiquity\utils\http\URequest;

/**
 * controllers$ControllerBase
 * @property JsUtils $jquery
 */
abstract class ControllerBase extends Controller {
	use WithAuthTrait;
	protected $headerView = "@activeTheme/main/vHeader.html";

	protected $footerView = "@activeTheme/main/vFooter.html";

	public function initialize() {
		if (! URequest::isAjax()) {
			$this->loadView($this->headerView);
		}
	}

	public function finalize() {
		if (! URequest::isAjax()) {
			$this->jquery->getHref('.ui.buttons a','#response',['hasLoader'=>'internal','historize'=>false]);
			$this->jquery->renderView($this->footerView);
		}
	}

	protected function showMessage($title,$content,$type='info',$icon='info'){
		$this->loadView('@activeTheme/main/message.html',compact('title','content','type','icon'));
	}

	protected function allowedMessage($role,$permission){
		$controller=Startup::getController();
		$action=Startup::getAction();
		$this->showMessage('ACLs',"You are allowed to access to action <b>$action</b> on <b>$controller</b><br>with the role: <b>$role</b> or the permission: <b>$permission</b>.",'success','check square');
	}

	protected function getAuthController(): AuthController {
		return new MyAuthController($this);
	}
}

