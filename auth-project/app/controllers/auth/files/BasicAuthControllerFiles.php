<?php
namespace controllers\auth\files;

use Ubiquity\controllers\auth\AuthFiles;
 /**
 * Class BasicAuthControllerFiles
 **/
class BasicAuthControllerFiles extends AuthFiles{
	public function getViewIndex(): string{
		return "BasicAuthController/index.html";
	}

	public function getViewInfo(): string{
		return "BasicAuthController/info.html";
	}

	public function getViewNoAccess(): string{
		return "BasicAuthController/noAccess.html";
	}

	public function getViewDisconnected(): string{
		return "BasicAuthController/disconnected.html";
	}

	public function getViewMessage(): string{
		return "BasicAuthController/message.html";
	}

	public function getViewBaseTemplate(): string{
		return "BasicAuthController/baseTemplate.html";
	}


}
