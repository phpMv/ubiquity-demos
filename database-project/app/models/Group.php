<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\OneToMany;
use Ubiquity\attributes\items\ManyToOne;
use Ubiquity\attributes\items\JoinColumn;
use Ubiquity\attributes\items\ManyToMany;
use Ubiquity\attributes\items\JoinTable;

#[Table(name: "group")]
class Group{
	
	#[Id()]
	#[Column(name: "id",dbType: "int(11)")]
	#[Validator(type: "id",constraints: ["autoinc"=>true])]
	private $id;

	
	#[Column(name: "name",nullable: true,dbType: "varchar(65)")]
	#[Validator(type: "length",constraints: ["max"=>65])]
	private $name;

	
	#[Column(name: "email",nullable: true,dbType: "varchar(255)")]
	#[Validator(type: "email",constraints: [])]
	#[Validator(type: "length",constraints: ["max"=>255])]
	private $email;

	
	#[Column(name: "aliases",nullable: true,dbType: "mediumtext")]
	private $aliases;

	
	#[ManyToOne()]
	#[JoinColumn(className: "models\\Organization",name: "idOrganization")]
	private $organization;

	
	#[ManyToMany(targetEntity: "models\\User",inversedBy: "groups")]
	#[JoinTable(name: "groupusers")]
	private $users;


	 public function __construct(){
		$this->users = [];
	}


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


	public function getEmail(){
		return $this->email;
	}


	public function setEmail($email){
		$this->email=$email;
	}


	public function getAliases(){
		return $this->aliases;
	}


	public function setAliases($aliases){
		$this->aliases=$aliases;
	}


	public function getOrganization(){
		return $this->organization;
	}


	public function setOrganization($organization){
		$this->organization=$organization;
	}


	public function getUsers(){
		return $this->users;
	}


	public function setUsers($users){
		$this->users=$users;
	}


	 public function addUser($user){
		$this->users[]=$user;
	}


	 public function __toString(){
		return $this->name.'';
	}

}