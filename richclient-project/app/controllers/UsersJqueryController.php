<?php
namespace controllers;

use Ubiquity\orm\DAO;
use models\User;
use Ubiquity\controllers\Router;

/**
 * Controller BarController
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 * @route("users")
 */
class UsersJqueryController extends ControllerBase {

	/**
	 *
	 * {@inheritdoc}
	 * @see \Ubiquity\controllers\Controller::index()
	 * @get
	 */
	public function index() {
		$this->jquery->getOnClick('#users-bt', Router::path('display.users'), '#users', [
			'hasLoader' => 'internal'
		]);
		$this->jquery->renderDefaultView();
	}

	/**
	 *
	 * @get("all","name"=>"display.users","cache"=>true)
	 */
	public function displayUsers() {
		$users = DAO::getAll(User::class);
		$this->jquery->click('#close-bt', '$("#users").html("");');
		$this->jquery->postOnClick('li[data-ajax]', Router::path('display.one.user', [
			""
		]), '{}', '#user-detail', [
			'attr' => 'data-ajax',
			'hasLoader' => false
		]);
		$this->jquery->renderDefaultView([
			'users' => $users
		]);
	}

	/**
	 *
	 * @post("{userId}","name"=>"display.one.user","cache"=>true,"duration"=>3600)
	 */
	public function displayOneUser($userId) {
		$user = DAO::getById(User::class, $userId);
		$this->jquery->hide('#users-content', '', '', true);
		$this->jquery->click('#close-user-bt', '$("#user-detail").html("");$("#users-content").show();');
		$this->jquery->renderDefaultView([
			'user' => $user
		]);
	}
}
