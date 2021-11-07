<?php
namespace models;

use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Transformer;
use Ubiquity\attributes\items\Validator;

class User {

	/**
	 *
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	 */
	#[Id()]
	#[Column(name: 'id',nullable: false,dbType: 'int(11)')]
	#[Validator('id',constraints: ['autoinc'=>true])]
	private $id;

	/**
	 *
	 * @column("name"=>"firstname","nullable"=>false,"dbType"=>"varchar(30)")
	 * @validator("length","constraints"=>array("max"=>30,"notNull"=>true))
	 */
	#[Column(name: 'firstname',nullable: false,dbType: 'varchar(30)')]
	#[Validator('length',constraints: ['max'=>30,'notNull'=>true])]
	private $firstname;

	/**
	 *
	 * @column("name"=>"lastname","nullable"=>false,"dbType"=>"varchar(30)")
	 * @validator("length","constraints"=>array("max"=>30,"notNull"=>true))
	 */
	#[Column(name: 'lastname',nullable: false,dbType: 'varchar(30)')]
	#[Validator('length',constraints: ['max'=>30,'notNull'=>true])]
	private $lastname;

	/**
	 *
	 * @column("name"=>"password","nullable"=>false,"dbType"=>"varchar(30)")
	 * @validator("length","constraints"=>array("max"=>30,"notNull"=>true))
	 * @transformer("password")
	 */
	#[Column(name: 'password',nullable: false,dbType: 'varchar(30)')]
	#[Validator('length',constraints: ['max'=>30,'notNull'=>true])]
	#[Transformer('password')]
	private $password;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getFirstname() {
		return $this->firstname;
	}

	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}

	public function getLastname() {
		return $this->lastname;
	}

	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function __toString() {
		return $this->lastname;
	}
}