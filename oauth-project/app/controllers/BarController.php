<?php
namespace controllers;

use Ubiquity\attributes\items\router\Post;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\controllers\auth\WithAuthTrait;
use Ubiquity\security\csrf\UCsrfHttp;

/**
 * Controller BarController
 */
class BarController extends ControllerBase {
	use WithAuthTrait;

	/**
	 *
	 * @route("bar","name"=>"bar")
	 */
	#[Route('bar',name: 'bar')]
	public function index() {
		UCsrfHttp::addCookieToken('bar', '/', false, false);
		$this->loadView("BarController/index.html");
	}

	/**
	 *
	 * @post("/submit/bar","name"=>"submit-bar")
	 */
	#[Post('/submit/bar',name: 'submit-bar')]
	public function submit() {
		if (UCsrfHttp::isValidPost('bar') && UCsrfHttp::isValidCookie('bar')) {
			var_dump($_POST);
		} else {
			echo 'Invalid post!';
			var_dump($_COOKIE);
		}
	}

	protected function getAuthController(): \Ubiquity\controllers\auth\AuthController {
		return new AuthController($this);
	}
}
