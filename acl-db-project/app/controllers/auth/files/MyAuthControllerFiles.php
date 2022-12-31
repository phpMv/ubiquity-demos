<?php
namespace controllers\auth\files;

use Ubiquity\controllers\auth\AuthFiles;
 /**
  * Class MyAuthControllerFiles
  */
class MyAuthControllerFiles extends AuthFiles{
	public function getViewIndex(): string{
		return "MyAuthController/index.html";
	}

	public function getViewInfo(): string{
		return "MyAuthController/info.html";
	}

	public function getViewNoAccess(): string{
		return "MyAuthController/noAccess.html";
	}

	public function getViewDisconnected(): string{
		return "MyAuthController/disconnected.html";
	}

	public function getViewCreate(): string{
		return "MyAuthController/create.html";
	}


}
