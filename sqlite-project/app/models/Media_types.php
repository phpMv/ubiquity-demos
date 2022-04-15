<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;

#[Table(name: "media_types")]
class Media_types{
	
	#[Id()]
	#[Column(name: "MediaTypeId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $MediaTypeId;

	
	#[Column(name: "Name",dbType: "NVARCHAR(120)")]
	#[Validator(type: "notNull",constraints: [])]
	private $Name;


	public function getMediaTypeId(){
		return $this->MediaTypeId;
	}


	public function setMediaTypeId($MediaTypeId){
		$this->MediaTypeId=$MediaTypeId;
	}


	public function getName(){
		return $this->Name;
	}


	public function setName($Name){
		$this->Name=$Name;
	}


	 public function __toString(){
		return ($this->Name??'no value').'';
	}

}