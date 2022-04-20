<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Transformer;
use Ubiquity\attributes\items\Table;

#[Table(name: "user")]
class User{
	
	#[Id()]
	#[Column(name: "id",dbType: "int")]
	#[Validator(type: "id",constraints: ["autoinc"=>true])]
	private $id;

	
	#[Column(name: "login",dbType: "varchar(20)")]
	#[Validator(type: "length",constraints: ["max"=>20,"notNull"=>true])]
	private $login;

	
	#[Column(name: "password",dbType: "varchar(60)")]
	#[Validator(type: "length",constraints: ["max"=>60,"notNull"=>true])]
	#[Transformer(name: "password")]
	private $password;

	
	#[Column(name: "role",dbType: "varchar(30)")]
	#[Validator(type: "length",constraints: ["max"=>30,"notNull"=>true])]
	private $role;


	public function getId(){
		return $this->id;
	}


	public function setId($id){
		$this->id=$id;
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

	public function getRole(){
		return $this->role;
	}

	public function setRole($role){
		$this->role=$role;
	}

	 public function __toString(){
		return ($this->role??'no value').'';
	}


}