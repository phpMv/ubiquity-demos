<?php
namespace models;

use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;

#[Table(name: "sqlite_sequence")]
class Sqlite_sequence{
	
	#[Column(name: "name")]
	#[Validator(type: "notNull",constraints: [])]
	private $name;

	
	#[Column(name: "seq")]
	#[Validator(type: "notNull",constraints: [])]
	private $seq;


	public function getName(){
		return $this->name;
	}


	public function setName($name){
		$this->name=$name;
	}


	public function getSeq(){
		return $this->seq;
	}


	public function setSeq($seq){
		$this->seq=$seq;
	}


	 public function __toString(){
		return ($this->seq??'no value').'';
	}

}