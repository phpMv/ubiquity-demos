<?php
namespace controllers;

use Hybridauth\Adapter\AdapterInterface;
use Ubiquity\controllers\auth\WithAuthTrait;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\USession;
use models\User;
use controllers\traits\UITrait;

/**
 * Controller OAuthController
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 */
class OAuthController extends \Ubiquity\controllers\auth\AbstractOAuthController {
	use WithAuthTrait{
		initialize as _initializeAuth;
		isValid as _isValidAuth;
		finalize as _finalizeAuth;
	}
	use UITrait;

	/**
	 *
	 * @route("index","name"=>"oauth-index")
	 */
	public function index() {
		$this->loadView('OAuthController/index.html');
	}

	/**
	 *
	 * @route("Auth/login/{name}")
	 */
	public function _oauth(string $name): void {
		parent::_oauth($name);
	}

	/**
	 *
	 * @route("test","name"=>"test")
	 */
	public function test() {
		echo 'test ok!';
		echo $this->getAuthController()->_getActiveUser();
	}

	protected function onConnect(string $name, AdapterInterface $provider) {
		$userProfile = $provider->getUserProfile();
		$key = md5($name . $userProfile->identifier);
		$user = DAO::getOne(User::class, 'oauth= ?', false, [
			$key
		]);
		if (! isset($user)) {
			$user = new User();
			$user->setOauth($key);
			$user->setLogin($userProfile->displayName);
			DAO::save($user);
		}
		USession::set('activeUser', $user);
		header('location:/');
	}

	protected function getAuthController(): AuthController {
		return new AuthController($this);
	}

	public function isValid($action) {
		if ($action !== '_oauth') {
			return $this->_isValidAuth($action);
		}
		return true;
	}

	public function initialize() {
		$this->_initializeAuth();
		$this->initializeAuth();
	}

	public function finalize() {
		$this->_finalizeAuth();
		$this->finalizeAuth();
	}
}
