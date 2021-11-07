<?php
namespace controllers;

use Ajax\semantic\html\base\constants\Direction;
use Ubiquity\attributes\items\router\Get;
use Ubiquity\attributes\items\router\Post;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\orm\DAO;
use models\User;
use Ubiquity\controllers\Router;

/**
 * Controller UsersJqueryController
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 * @route("users")
 */
#[Route('users')]
class UsersJqueryController extends ControllerBase {

	/**
	 *
	 * {@inheritdoc}
	 * @see \Ubiquity\controllers\Controller::index()
	 * @get
	 */
	#[Get]
	public function index() {
		$frm=$this->jquery->semantic()->htmlForm('');
		$this->jquery->getOnClick('#users-bt', Router::path('display.users'), '#users', [
			'hasLoader' => 'internal'
		]);
		$this->jquery->renderDefaultView();
	}

	/**
	 *
	 * @get("all","name"=>"display.users","cache"=>true)
	 */
	#[Get('all',name: 'display.users',cache: true)]
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

	/**
	 *
	 * @post("{userId}","name"=>"display.one.user","cache"=>true,"duration"=>3600)
	 */
	#[Post('{userId}',name: 'display.one.user',cache: true,duration: 3600)]
	public function displayOneUser($userId) {
		$user = DAO::getById(User::class, $userId);
		$this->jquery->hide('#users-content', '', '', true);
		$this->jquery->click('#close-user-bt', '$("#user-detail").html("");$("#users-content").show();');
		$this->jquery->renderDefaultView([
			'user' => $user
		]);
	}
	#[Get('/test')]
	public function testAction(){
		$frm=$this->jquery->semantic()->htmlForm('frm');
		$input=$frm->addInput('password','Password','password');
		$input->addIcon('users');
		$this->jquery->renderDefaultView();
	}
}
