<?php
namespace models;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\Transformer;
use Ubiquity\attributes\items\Validator;

/**
 * @table('user')
*/
#[Table('user')]

class User{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	#[Id]
	#[Column('id',nullable: false,dbType: 'int(11)')]
	#[Validator('id',constraints: ['autoinc'=>true])]
	private $id;

	/**
	 * @column("name"=>"name","nullable"=>false,"dbType"=>"varchar(30)")
	 * @validator("length","constraints"=>array("max"=>30,"notNull"=>true))
	**/
	#[Column('name',nullable: false,dbType: 'char(30)')]
	#[Validator('length',constraints: ['max'=>30,'notNull'=>true])]
	private $name;

	/**
	 * @column("name"=>"login","nullable"=>false,"dbType"=>"varchar(30)")
	 * @validator("length","constraints"=>array("max"=>30,"notNull"=>true))
	**/
	#[Column('login',nullable: false,dbType: 'char(30)')]
	#[Validator('length',constraints: ['max'=>30,'notNull'=>true])]
	private $login;

	/**
	 * @column("name"=>"password","nullable"=>false,"dbType"=>"varchar(128)")
	 * @validator("length","constraints"=>array("max"=>128,"notNull"=>true))
	 * @transformer("name"=>"password")
	**/
	#[Column('password',nullable: false,dbType: 'char(128)')]
	#[Validator('length',constraints: ['max'=>128,'notNull'=>true])]
	#[Transformer('password')]
	private $password;

	/**
	 * @column("name"=>"oauth","nullable"=>true,"dbType"=>"varchar(32)")
	 * @validator("length","constraints"=>array("max"=>32))
	**/
	#[Column('oauth',nullable: true,dbType: 'char(32)')]
	#[Validator('length',constraints: ['max'=>32])]
	private $oauth;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getName(){
		return $this->name;
	}

	 public function setName($name){
		$this->name=$name;
	}

	 public function getLogin(){
		return $this->login;
	}

	 public function setLogin($login){
		$this->login=$login;
	}

	 public function getPassword(){
		return $this->password;
	}

	 public function setPassword($password){
		$this->password=$password;
	}

	 public function getOauth(){
		return $this->oauth;
	}

	 public function setOauth($oauth){
		$this->oauth=$oauth;
	}

	 public function __toString(): string {
		return ($this->login??'no value').'';
	}

}