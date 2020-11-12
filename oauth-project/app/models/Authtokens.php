<?php
namespace models;
/**
 * @table('authtokens')
*/
class Authtokens{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"selector","nullable"=>false,"dbType"=>"char(24)")
	 * @validator("length","constraints"=>array("max"=>24,"notNull"=>true))
	**/
	private $selector;

	/**
	 * @column("name"=>"hashedValidator","nullable"=>false,"dbType"=>"char(64)")
	 * @validator("length","constraints"=>array("max"=>64,"notNull"=>true))
	**/
	private $hashedValidator;

	/**
	 * @column("name"=>"userid","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $userid;

	/**
	 * @column("name"=>"expires","nullable"=>true,"dbType"=>"datetime")
	 * @validator("type","dateTime")
	 * @transformer("name"=>"datetime")
	**/
	private $expires;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getSelector(){
		return $this->selector;
	}

	 public function setSelector($selector){
		$this->selector=$selector;
	}

	 public function getHashedValidator(){
		return $this->hashedValidator;
	}

	 public function setHashedValidator($hashedValidator){
		$this->hashedValidator=$hashedValidator;
	}

	 public function getUserid(){
		return $this->userid;
	}

	 public function setUserid($userid){
		$this->userid=$userid;
	}

	 public function getExpires(){
		return $this->expires;
	}

	 public function setExpires($expires){
		$this->expires=$expires;
	}

	 public function __toString(){
		return ($this->userid??'no value').'';
	}

}