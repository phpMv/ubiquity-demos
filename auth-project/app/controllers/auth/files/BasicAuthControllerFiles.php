<?php
namespace controllers\auth\files;

use Ubiquity\controllers\auth\AuthFiles;
 /**
 * Class BasicAuthControllerFiles
 **/
class BasicAuthControllerFiles extends AuthFiles{
	public function getViewIndex(){
		return "BasicAuthController/index.html";
	}

	public function getViewInfo(){
		return "BasicAuthController/info.html";
	}

	public function getViewNoAccess(){
		return "BasicAuthController/noAccess.html";
	}

	public function getViewDisconnected(){
		return "BasicAuthController/disconnected.html";
	}

	public function getViewMessage(){
		return "BasicAuthController/message.html";
	}

	public function getViewBaseTemplate(){
		return "BasicAuthController/baseTemplate.html";
	}


}
