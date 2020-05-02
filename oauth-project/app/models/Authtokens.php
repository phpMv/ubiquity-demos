<?php
namespace models;

use Ubiquity\security\auth\models\AbstractAuthtokens;

/**
 *
 * @table('authtokens')
 */
class Authtokens extends AbstractAuthtokens {

	/**
	 *
	 * @manyToOne
	 * @joinColumn("className"=>"models\\User","name"=>"userid","nullable"=>false)
	 */
	protected $user;

	/**
	 *
	 * @return mixed
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 *
	 * @param mixed $user
	 */
	public function setUser($user) {
		$this->user = $user;
	}
}