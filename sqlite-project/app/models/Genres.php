<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;

#[Table(name: "genres")]
class Genres{
	
	#[Id()]
	#[Column(name: "GenreId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $GenreId;

	
	#[Column(name: "Name",dbType: "NVARCHAR(120)")]
	#[Validator(type: "notNull",constraints: [])]
	private $Name;


	public function getGenreId(){
		return $this->GenreId;
	}


	public function setGenreId($GenreId){
		$this->GenreId=$GenreId;
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