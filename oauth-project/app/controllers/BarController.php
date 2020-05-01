<?php
namespace controllers;

use Ubiquity\controllers\auth\WithAuthTrait;

/**
 * Controller BarController
 */
class BarController extends ControllerBase {
	use WithAuthTrait;

	/**
	 *
	 * @route("bar","name"=>"bar")
	 */
	public function index() {
		$this->loadView("BarController/index.html");
	}

	protected function getAuthController(): \Ubiquity\controllers\auth\AuthController {
		return new AuthController($this);
	}
}
