<?php
namespace controllers;

use Ubiquity\utils\http\USession;
use Ubiquity\utils\http\URequest;
use controllers\auth\files\AuthControllerFiles;
use Ubiquity\controllers\auth\AuthFiles;
use Ubiquity\client\oauth\OAuthAdmin;
use models\User;
use Ajax\semantic\components\validation\Rule;
use Ubiquity\orm\DAO;
use controllers\traits\UITrait;
use Ubiquity\utils\http\UResponse;
use models\Authtokens;
use Ubiquity\contents\transformation\TransformersManager;
use Ubiquity\contents\validation\ValidatorsManager;

/**
 * Auth Controller AuthController
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 * @route("login","automated"=>true,"inherited"=>true)
 */
class AuthController extends \Ubiquity\controllers\auth\AuthController {
	use UITrait;

	public function index() {
		$providers = OAuthAdmin::getEnabledProviders();
		$bts = $this->jquery->semantic()->htmlButtonGroups('bts');
		foreach ($providers as $icon => $name) {
			$bt = $bts->addElement($name);
			$bt->addIcon($icon);
			$bt->addClass($icon . " plus");
			$bt->asLink('/Auth/login/' . $name);
		}
		$this->jquery->compile($this->view);
		parent::index();
	}

	protected function onConnect($connected) {
		$urlParts = $this->getOriginalURL();
		USession::set($this->_getUserSessionKey(), $connected);
		if (isset($urlParts)) {
			$this->_forward(implode("/", $urlParts), false, false);
		} else {
			$this->_forward('_default', false, false);
		}
	}

	protected function _connect() {
		if (URequest::isPost()) {
			$login = URequest::post($this->_getLoginInputName());
			$password = URequest::post($this->_getPasswordInputName());
			$u = DAO::getOne(User::class, 'login= ?', false, [
				$login
			]);
			if (isset($u) && password_verify($password, $u->getPassword())) {
				return $u;
			}
		}
		return null;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \Ubiquity\controllers\auth\AuthController::isValidUser()
	 */
	public function _isValidUser($action = null) {
		return USession::exists($this->_getUserSessionKey());
	}

	public function _getBaseRoute() {
		return 'login';
	}

	protected function getFiles(): AuthFiles {
		return new AuthControllerFiles();
	}

	public function _displayInfoAsString() {
		return true;
	}

	/**
	 *
	 * @route("name"=>"signup")
	 */
	public function signup() {
		$frm = $this->jquery->semantic()->dataForm('frm-signup', new User());
		$frm->setFields([
			'title',
			'name',
			'login',
			'password',
			'passwordConf',
			'submit',
			'cancel'
		]);
		$frm->setCaptions([
			'Enter your settings',
			'Name',
			'Login',
			'Password',
			'Password confirmation',
			'Create account',
			'Cancel'
		]);
		$frm->fieldAsInput('name', [
			'rules' => [
				'empty'
			]
		]);
		$frm->fieldAsInput('login', [
			'rules' => [
				'empty',
				[
					'checkLogin',
					'The login {value} is not available!'
				]
			]
		]);
		$frm->fieldAsInput('password', [
			'inputType' => 'password',
			'rules' => [
				'empty',
				[
					'checkPassword',
					"%function(value){return $('[name=password]')[0].prompt;}%"
				]
			]
		]);
		$frm->fieldAsInput('passwordConf', [
			'inputType' => 'password',
			'rules' => [
				Rule::match('password'),
				'empty'
			]
		]);
		$frm->setValidationParams([
			"on" => "blur",
			"inline" => true
		]);
		$frm->fieldAsMessage('title', [
			'header' => 'Sign up',
			'icon' => 'users'
		]);
		$frm->fieldAsButton('cancel', 'fluid', [
			'value' => 'Cancel',
			'jsCallback' => function ($bt) {
				$bt->asLink('/');
			}
		]);
		$frm->fieldAsSubmit('submit', 'green fluid', '/login/_signup', '#response', [
			'hasLoader' => 'internal',
			'transition' => 'random'
		]);

		$this->jquery->exec(Rule::ajax($this->jquery, "checkLogin", "/login/_checkLogin", "{}", "result=data.result;", "postForm", [
			"form" => "frm-signup"
		]), true);
		$this->jquery->exec(Rule::ajax($this->jquery, "checkPassword", "/login/_checkPassword", "{}", "$('[name=password]')[0].prompt=data.message;result=data.result;", "postForm", [
			"form" => "frm-signup"
		]), true);
		$frm->addSeparatorAfter('title');
		$frm->addDividerBefore('login', 'Connexion parameters');
		$frm->addDividerBefore('submit', '');
		$this->jquery->renderView("AuthController/signup.html");
	}

	/**
	 *
	 * @post
	 */
	public function _signup() {
		$u = new User();
		URequest::password_hash('password');
		URequest::setValuesToObject($u, $_POST);
		if (DAO::insert($u)) {
			$this->showMessage('Account creation', 'your account has been successfully created.', 'check circle', 'success');
		} else {
			$this->showMessage('Account creation', 'Problem when creating the account.', 'warning circle', 'warning');
		}
		$this->jquery->html('#frm-signup', '', true);
		$this->jquery->renderDefaultView();
	}

	/**
	 *
	 * @post
	 */
	public function _checkLogin() {
		UResponse::asJSON();
		$login = URequest::post('login');
		echo json_encode([
			'result' => ! DAO::exists(User::class, 'login= ?', [
				$login
			])
		]);
	}

	/**
	 *
	 * @post
	 */
	public function _checkPassword() {
		UResponse::asJSON();
		$password = URequest::post('password');
		$user = new User();
		$user->setPassword($password);
		$violations = ValidatorsManager::validate($user, "signup");
		$hasError = (count($violations) > 0);
		echo json_encode([
			'result' => ! $hasError,
			'message' => ($hasError) ? $violations[0]->getMessage() : ''
		]);
	}

	public function _getLoginInputName() {
		return 'login';
	}

	public function _checkConnectionTimeout() {
		return 10000;
	}

	protected function toCookie($connected) {
		do {
			$token = new Authtokens();
			$token->setUserid($connected->getId());
			TransformersManager::transformInstance($token, 'toView');
			$saved = DAO::insert($token);
		} while ($saved === false);
		return $token->getSelector() . ':' . $token->getHashedValidator();
	}

	protected function fromCookie($cookie) {
		list ($selector, $validator) = explode(':', $cookie);
		DAO::$useTransformers = true;
		$auth = DAO::getOne(Authtokens::class, 'selector= ?', [
			'user'
		], [
			$selector
		]);
		if (isset($auth) && ! $auth->isExpired()) {
			if (hash_equals($auth->getHashedValidator(), $validator)) {
				return $auth->getUser();
			}
		}
		return null;
	}
}
