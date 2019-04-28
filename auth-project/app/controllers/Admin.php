<?php
namespace controllers;
use Ubiquity\controllers\admin\UbiquityMyAdminBaseController;
use Ubiquity\controllers\auth\AuthController;
use Ubiquity\controllers\auth\WithAuthTrait;

class Admin extends UbiquityMyAdminBaseController{
	use WithAuthTrait;
	protected function getAuthController(): AuthController {
		return new BasicAuthController();
	}
}
