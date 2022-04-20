<?php
namespace controllers;

use Ubiquity\attributes\items\acl\Allow;

use Ubiquity\attributes\items\acl\Permission;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\controllers\auth\WithAuthTrait;
use Ubiquity\security\acl\controllers\AclControllerTrait;
use Ubiquity\utils\http\URequest;

#[Route(path: "withAcl",automated: true)]
class MyAclController extends ControllerBase {
	const USER='@USER';

	use WithAuthTrait,AclControllerTrait{
		WithAuthTrait::isValid insteadof AclControllerTrait;
		AclControllerTrait::isValid as isValidAcl;
	}

	#[Allow(self::USER)]
	#[Permission('READ',10)]
	#[Route(name: 'user.read')]
	public function index() {
		$this->allowedMessage('@USER','READ');
	}

	#[Allow(self::USER)]
	#[Permission('WRITE',50)]
	#[Route(name: 'user.write')]
	public function forUserWrite() {
		$this->allowedMessage(self::USER,'WRITE');
	}
	#[Permission('READ')]
	#[Route(name: 'all.read')]
	public function onlyRead(){
		$this->allowedMessage('@ALL','READ');
	}

	#[Allow('@ADMIN',permission: 'ALL')]
	#[Route(name: 'admin.all')]
	public function forAdmin() {
		$this->allowedMessage('@ADMIN','ALL');
	}

	#[Route(name: 'all.write')]
	#[Allow('@ALL',permission: 'WRITE')]
	public function writeOnly() {
		$this->allowedMessage('@ALL','WRITE');
	}

	public function _getRole(): string {
		$activeUser=$this->getAuthController()->_getActiveUser();
		if(isset($activeUser)){
			return $activeUser->getRole();
		}
		return '@ALL';
	}

	/**
	 * {@inheritdoc}
	 * @see \Ubiquity\controllers\Controller::onInvalidControl()
	 */
	public function onInvalidControl() {
		$ajax=URequest::isAjax();
		if(!$ajax) {
			$this->initialize();
		}
		$this->showMessage('ACLs', $this->_getRole() . ' is not allowed!','red','warning circle');
		if(!$ajax) {
			$this->finalize();
		}
	}

	public function isValid($action):bool{
		return parent::isValid($action)&& $this->isValidAcl($action);
	}

}

