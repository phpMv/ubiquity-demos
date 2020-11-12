<?php
namespace controllers;

use Ubiquity\controllers\Router;
use Ubiquity\orm\DAO;
use models\User;

/**
 * Controller UsersCompoController
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 * @route("users-compo")
 */
class UsersCompoController extends ControllerBase {

	private function semantic() {
		return $this->jquery->semantic();
	}

	/**
	 *
	 * @get
	 */
	public function index() {
		$bt = $this->semantic()->htmlButton('users-bt', 'Display users');
		$bt->addIcon('users');
		$bt->getOnClick(Router::path('display.compo.users'), '#users', [
			'hasLoader' => 'internal'
		]);
		$this->jquery->renderDefaultView();
	}

	/**
	 *
	 * @get("all","name"=>"display.compo.users")
	 */
	public function displayUsers() {
		$users = DAO::getAll(User::class);
		$this->jquery->click('#close-bt', '$("#users").html("");');
		$this->jquery->postOnClick('li[data-ajax]', Router::path('display.one.user', [
			""
		]), '{}', '#user-detail', [
			'attr' => 'data-ajax'
		]);
		$this->jquery->renderDefaultView([
			'users' => $users
		]);
	}
}
