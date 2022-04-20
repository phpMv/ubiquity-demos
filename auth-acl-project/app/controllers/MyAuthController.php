<?php
namespace controllers;
use models\User;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\UResponse;
use Ubiquity\utils\http\USession;
use Ubiquity\utils\http\URequest;
use controllers\auth\files\MyAuthControllerFiles;
use Ubiquity\controllers\auth\AuthFiles;
use Ubiquity\attributes\items\router\Route;

#[Route(path: "/login",inherited: true,automated: true)]
class MyAuthController extends \Ubiquity\controllers\auth\AuthController{

	protected function onConnect($connected) {
		$urlParts=$this->getOriginalURL();
		USession::set($this->_getUserSessionKey(), $connected);
		if(isset($urlParts)){
			$url=implode("/",$urlParts);
		}else{
			$url='/';
		}
		UResponse::forward(URequest::getUrl($url));
	}

	protected function _connect() {
		if(URequest::isPost()){
			$email=URequest::post($this->_getLoginInputName());
			$password=URequest::post($this->_getPasswordInputName());
			$user=DAO::getOne(User::class,'login= ?',false,[$email]);
			if($user!=null && $user->getPassword()===$password){
				return $user;
			}
		}
		return;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Ubiquity\controllers\auth\AuthController::isValidUser()
	 */
	public function _isValidUser($action=null): bool {
		return USession::exists($this->_getUserSessionKey());
	}

	public function _getBaseRoute(): string {
		return '/login';
	}
	
	protected function getFiles(): AuthFiles{
		return new MyAuthControllerFiles();
	}

	public function _displayInfoAsString(): bool {
		return true;
	}

}
