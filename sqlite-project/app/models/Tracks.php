<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;

#[Table(name: "tracks")]
class Tracks{
	
	#[Id()]
	#[Column(name: "TrackId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $TrackId;

	
	#[Column(name: "Name",dbType: "NVARCHAR(200)")]
	#[Validator(type: "notNull",constraints: [])]
	private $Name;

	
	#[Column(name: "AlbumId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $AlbumId;

	
	#[Column(name: "MediaTypeId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $MediaTypeId;

	
	#[Column(name: "GenreId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $GenreId;

	
	#[Column(name: "Composer",dbType: "NVARCHAR(220)")]
	#[Validator(type: "notNull",constraints: [])]
	private $Composer;

	
	#[Column(name: "Milliseconds",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $Milliseconds;

	
	#[Column(name: "Bytes",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $Bytes;

	
	#[Column(name: "UnitPrice",dbType: "NUMERIC(10,2)")]
	#[Validator(type: "notNull",constraints: [])]
	private $UnitPrice;


	public function getTrackId(){
		return $this->TrackId;
	}


	public function setTrackId($TrackId){
		$this->TrackId=$TrackId;
	}


	public function getName(){
		return $this->Name;
	}


	public function setName($Name){
		$this->Name=$Name;
	}


	public function getAlbumId(){
		return $this->AlbumId;
	}


	public function setAlbumId($AlbumId){
		$this->AlbumId=$AlbumId;
	}


	public function getMediaTypeId(){
		return $this->MediaTypeId;
	}


	public function setMediaTypeId($MediaTypeId){
		$this->MediaTypeId=$MediaTypeId;
	}


	public function getGenreId(){
		return $this->GenreId;
	}


	public function setGenreId($GenreId){
		$this->GenreId=$GenreId;
	}


	public function getComposer(){
		return $this->Composer;
	}


	public function setComposer($Composer){
		$this->Composer=$Composer;
	}


	public function getMilliseconds(){
		return $this->Milliseconds;
	}


	public function setMilliseconds($Milliseconds){
		$this->Milliseconds=$Milliseconds;
	}


	public function getBytes(){
		return $this->Bytes;
	}


	public function setBytes($Bytes){
		$this->Bytes=$Bytes;
	}


	public function getUnitPrice(){
		return $this->UnitPrice;
	}


	public function setUnitPrice($UnitPrice){
		$this->UnitPrice=$UnitPrice;
	}


	 public function __toString(){
		return ($this->UnitPrice??'no value').'';
	}

}