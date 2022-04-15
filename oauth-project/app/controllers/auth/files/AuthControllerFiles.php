<?php
namespace controllers\auth\files;

use Ubiquity\controllers\auth\AuthFiles;
 /**
 * Class AuthControllerFiles
 **/
class AuthControllerFiles extends AuthFiles{
	public function getViewIndex(): string{
		return "AuthController/index.html";
	}

	public function getViewInfo(): string{
		return "AuthController/info.html";
	}

	public function getViewNoAccess(): string{
		return "AuthController/noAccess.html";
	}

	public function getViewDisconnected(): string{
		return "AuthController/disconnected.html";
	}

	public function getViewMessage(): string{
		return "AuthController/message.html";
	}

	public function getViewBaseTemplate(): string{
		return "AuthController/baseTemplate.html";
	}


}
