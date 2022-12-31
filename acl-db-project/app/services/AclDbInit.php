<?php

namespace services;

use models\User;
use Ubiquity\db\reverse\DbGenerator;
use Ubiquity\orm\DAO;
use Ubiquity\orm\reverse\DatabaseChecker;
use Ubiquity\orm\reverse\DatabaseReversor;
use Ubiquity\security\acl\AclManager;

class AclDbInit {

	private array $operations;

	private function createUsers(): array {
		$result=[];
		$this->addUser($result,'user','0000','@USER');
		$this->addUser($result,'admin','0000','@ADMIN');
		$this->addUser($result,'invited','0000','@INVITED');
		return $result;
	}

	private function addUser(array &$messages,string $login, string $password, string $role): void {
		if (!DAO::exists(User::class,'login= :login',['login'=>$login])) {
			$user=new User();
			$user->setLogin($login);
			$user->setPassword($password);
			$user->setRole($role);
			if (DAO::insert($user)) {
				$messages[]="User $login added";
			}
		}
	}

	public function initialize(): void {
		$dbChecker=new DatabaseChecker();
		$dbChecker->checkAll();
		$operations=[];
		if (!$dbChecker->tableExists('user')) {
			$generator = new DatabaseReversor(new DbGenerator(), 'default');
			if ($generator->generateTablesForModels([User::class], true)) {
				$operations[]='Table user created!';
			}
		}
		$operations+=$this->createUsers();
		if (! AclManager::permissionExists('READ')) {
			AclManager::addPermission('READ', 10);
			$operations[]='Permission READ added';
		}
		if (! AclManager::permissionExists('WRITE')) {
			AclManager::addPermission('WRITE', 50);
			$operations[]='Permission WRITE added';
		}
		if (! AclManager::roleExists('@INVITED')) {
			AclManager::addAndAllow('@INVITED', '*', 'READ');
			$operations[]='Allow @INVITED to READ with *';
		}
		if (! AclManager::roleExists('@USER')) {
			AclManager::addAndAllow('@USER', 'MyAclController.index', 'READ');
			$operations[]='Allow @USER to READ with MyAclController.index';
			AclManager::addAndAllow('@USER', 'MyAclController.forUserWrite', 'WRITE');
			$operations[]='Allow @USER to WRITE with MyAclController.forUserWrite';
		}
		if (! AclManager::roleExists('@ADMIN')) {
			AclManager::addRole('@ADMIN', ['@USER']);
			$operations[]='Role @ADMIN added';
			AclManager::addAndAllow('@ADMIN', 'MyAclController.forAdmin', 'ALL');
			$operations[]='Allow @ADMIN to ALL with MyAclController.forAdmin';
			AclManager::addAndAllow('@ADMIN', '*', 'WRITE');
			$operations[]='Allow @ADMIN to WRITE with *';
		}
		$this->operations=$operations;
	}

	public function hasOperations(): bool {
		return !empty($this->operations);
	}

	/**
	 * @return array
	 */
	public function getOperations(): array {
		return $this->operations;
	}

}