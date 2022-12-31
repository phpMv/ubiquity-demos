<?php
namespace controllers;

use services\AclDbInit;
use Ubiquity\attributes\items\acl\Permission;
use Ubiquity\attributes\items\di\Autowired;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\controllers\auth\WithAuthTrait;
use Ubiquity\security\acl\controllers\AclControllerTrait;
use Ubiquity\utils\http\URequest;

#[Route(path: "withAcl",automated: true)]
class MyAclController extends ControllerBase {
	const USER='@USER';

	#[Autowired]
	public AclDbInit $aclDbInit;

	use WithAuthTrait,AclControllerTrait{
		WithAuthTrait::isValid insteadof AclControllerTrait;
		AclControllerTrait::isValid as isValidAcl;
	}

	#[Permission('READ')]
	#[Route(name: 'user.read')]
	public function index() {
		$this->allowedMessage('@USER', 'READ');
	}

	#[Permission('WRITE')]
	#[Route(name: 'user.write')]
	public function forUserWrite() {
		$this->allowedMessage(self::USER, 'WRITE');
	}
	#[Permission('READ')]
	#[Route(name: 'all.read')]
	public function onlyRead() {
		$this->allowedMessage('@ALL', 'READ');
	}

	#[Route(name: 'admin.all')]
	#[Permission('ALL')]
	public function forAdmin() {
		$this->allowedMessage('@ADMIN', 'ALL');
	}

	#[Route(name: 'all.write')]
	#[Permission('WRITE')]
	public function writeOnly() {
		$this->allowedMessage('@ALL', 'WRITE');
	}

	public function _getRole(): string {
		$activeUser=$this->getAuthController()->_getActiveUser();
		if (isset($activeUser)) {
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
		if (!$ajax) {
			$this->initialize();
		}
		$this->showMessage('ACLs', $this->_getRole() . ' is not allowed!', 'red', 'warning circle');
		if (!$ajax) {
			$this->finalize();
		}
	}

	public function isValid($action): bool {
		return parent::isValid($action) && $this->isValidAcl($action);
	}

	/**
	 * Initialize ACL if they are not.
	 * @return void
	 */
	public function initialize() {
		parent::initialize();
		$this->aclDbInit->initialize();
		if ($this->aclDbInit->hasOperations()) {
			$list=$this->jquery->semantic()->htmlList('list', $this->aclDbInit->getOperations());
			$list->setBulleted();
			$this->showMessage('Initialization', $list);
		}
	}

}

