<?php
namespace controllers\auth\files;

use Ubiquity\controllers\auth\AuthFiles;
 /**
 * Class AuthControllerFiles
 **/
class AuthControllerFiles extends AuthFiles{
	public function getViewIndex(){
		return "AuthController/index.html";
	}

	public function getViewInfo(){
		return "AuthController/info.html";
	}

	public function getViewNoAccess(){
		return "AuthController/noAccess.html";
	}

	public function getViewDisconnected(){
		return "AuthController/disconnected.html";
	}

	public function getViewMessage(){
		return "AuthController/message.html";
	}

	public function getViewBaseTemplate(){
		return "AuthController/baseTemplate.html";
	}


}
