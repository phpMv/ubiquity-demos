<?php
namespace models;

/**
 *
 * @table('user')
 */
class User {

	/**
	 *
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	 */
	private $id;

	/**
	 *
	 * @column("name"=>"name","nullable"=>false,"dbType"=>"varchar(30)")
	 * @validator("length","constraints"=>array("max"=>30,"notNull"=>true))
	 */
	private $name;

	/**
	 *
	 * @column("name"=>"login","nullable"=>false,"dbType"=>"varchar(30)")
	 * @validator("length","constraints"=>array("max"=>30,"notNull"=>true))
	 */
	private $login;

	/**
	 *
	 * @column("name"=>"password","nullable"=>false,"dbType"=>"varchar(128)")
	 * @validator("password","constraints"=>array("max"=>10,"uppercase"=>2,"min"=>5),"group"=>"signup")
	 */
	private $password;

	/**
	 *
	 * @column("name"=>"oauth","nullable"=>true,"dbType"=>"varchar(32)")
	 * @validator("length","constraints"=>array("max"=>32,"notNull"=>false))
	 */
	private $oauth;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getLogin() {
		return $this->login;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getOauth() {
		return $this->oauth;
	}

	/**
	 *
	 * @param mixed $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 *
	 * @param mixed $login
	 */
	public function setLogin($login) {
		$this->login = $login;
	}

	/**
	 *
	 * @param mixed $password
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 *
	 * @param mixed $oauth
	 */
	public function setOauth($oauth) {
		$this->oauth = $oauth;
	}

	public function __toString() {
		return ($this->login ?? 'no value') . '';
	}
}