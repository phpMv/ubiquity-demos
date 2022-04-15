<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;

#[Table(name: "albums")]
class Albums{
	
	#[Id()]
	#[Column(name: "AlbumId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $AlbumId;

	
	#[Column(name: "Title",dbType: "NVARCHAR(160)")]
	#[Validator(type: "notNull",constraints: [])]
	private $Title;

	
	#[Column(name: "ArtistId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $ArtistId;


	public function getAlbumId(){
		return $this->AlbumId;
	}


	public function setAlbumId($AlbumId){
		$this->AlbumId=$AlbumId;
	}


	public function getTitle(){
		return $this->Title;
	}


	public function setTitle($Title){
		$this->Title=$Title;
	}


	public function getArtistId(){
		return $this->ArtistId;
	}


	public function setArtistId($ArtistId){
		$this->ArtistId=$ArtistId;
	}


	 public function __toString(){
		return ($this->ArtistId??'no value').'';
	}

}