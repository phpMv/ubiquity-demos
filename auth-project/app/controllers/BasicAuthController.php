<?php
namespace controllers;
use Ubiquity\controllers\Startup;
use Ubiquity\controllers\Auth\AuthFiles;
use Ubiquity\utils\http\URequest;
use Ubiquity\utils\http\USession;
use controllers\auth\files\BasicAuthControllerFiles;

 /**
 * Auth Controller BasicAuthController
 **/
class BasicAuthController extends \Ubiquity\controllers\auth\AuthController{
	
	protected function onConnect($connected) {
		$urlParts=$this->getOriginalURL();
		USession::set($this->_getUserSessionKey(), $connected);
		if(isset($urlParts)){
			$this->_forward(implode("/",$urlParts));
		}else{
			Startup::forward("Admin");
		}
	}

	protected function _connect() {
		if(URequest::isPost()){
			$email=URequest::post($this->_getLoginInputName());
			$password=URequest::post($this->_getPasswordInputName());
			$config=(new Admin())->getConfig();
			if($config["email"]===$email && $config["password"]===$password){
				return $email;
			}
		}
		return;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Ubiquity\controllers\auth\AuthController::isValidUser()
	 */
	public function _isValidUser($action=null) {
		return USession::exists($this->_getUserSessionKey());
	}

	public function _getBaseRoute() {
		return 'BasicAuthController';
	}
	
	protected function getFiles(): AuthFiles{
		return new BasicAuthControllerFiles();
	}

	/**
	 * {@inheritDoc}
	 * @see \Ubiquity\controllers\auth\AuthController::_getLoginInputName()
	 */
	public function _getLoginInputName() {
		return "email";
	}
	
	public function _displayInfoAsString() {
		return true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Ubiquity\controllers\auth\AuthController::_checkConnectionTimeout()
	 */
	public function _checkConnectionTimeout() {
		return 10000;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Ubiquity\controllers\auth\AuthController::attemptsNumber()
	 */
	protected function attemptsNumber() {
		return 3;
	}
	
	public function _getBodySelector(){
		return "#main-content";
	}

}
