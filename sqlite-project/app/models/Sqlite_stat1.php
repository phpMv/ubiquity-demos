<?php
namespace models;

use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;

#[Table(name: "sqlite_stat1")]
class Sqlite_stat1{
	
	#[Column(name: "tbl")]
	#[Validator(type: "notNull",constraints: [])]
	private $tbl;

	
	#[Column(name: "idx")]
	#[Validator(type: "notNull",constraints: [])]
	private $idx;

	
	#[Column(name: "stat")]
	#[Validator(type: "notNull",constraints: [])]
	private $stat;


	public function getTbl(){
		return $this->tbl;
	}


	public function setTbl($tbl){
		$this->tbl=$tbl;
	}


	public function getIdx(){
		return $this->idx;
	}


	public function setIdx($idx){
		$this->idx=$idx;
	}


	public function getStat(){
		return $this->stat;
	}


	public function setStat($stat){
		$this->stat=$stat;
	}


	 public function __toString(){
		return ($this->stat??'no value').'';
	}

}