<?php
namespace models;
class User{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"firstname","nullable"=>false,"dbType"=>"varchar(30)")
	 * @validator("length","constraints"=>array("max"=>30,"notNull"=>true))
	**/
	private $firstname;

	/**
	 * @column("name"=>"lastname","nullable"=>false,"dbType"=>"varchar(30)")
	 * @validator("length","constraints"=>array("max"=>30,"notNull"=>true))
	**/
	private $lastname;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getFirstname(){
		return $this->firstname;
	}

	 public function setFirstname($firstname){
		$this->firstname=$firstname;
	}

	 public function getLastname(){
		return $this->lastname;
	}

	 public function setLastname($lastname){
		$this->lastname=$lastname;
	}

	 public function __toString(){
		return $this->lastname;
	}

}