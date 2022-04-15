<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;

#[Table(name: "artists")]
class Artists{
	
	#[Id()]
	#[Column(name: "ArtistId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $ArtistId;

	
	#[Column(name: "Name",dbType: "NVARCHAR(120)")]
	#[Validator(type: "notNull",constraints: [])]
	private $Name;


	public function getArtistId(){
		return $this->ArtistId;
	}


	public function setArtistId($ArtistId){
		$this->ArtistId=$ArtistId;
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