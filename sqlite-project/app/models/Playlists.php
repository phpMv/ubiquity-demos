<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\ManyToOne;
use Ubiquity\attributes\items\JoinColumn;

#[Table(name: "playlists")]
class Playlists{
	
	#[Id()]
	#[Column(name: "PlaylistId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $PlaylistId;

	
	#[Column(name: "Name",dbType: "NVARCHAR(120)")]
	#[Validator(type: "notNull",constraints: [])]
	private $Name;

	
	#[ManyToOne()]
	#[JoinColumn(className: "models\\Playlist_track",name: "playlistId")]
	private $playlist_track;


	public function getPlaylistId(){
		return $this->PlaylistId;
	}


	public function setPlaylistId($PlaylistId){
		$this->PlaylistId=$PlaylistId;
	}


	public function getName(){
		return $this->Name;
	}


	public function setName($Name){
		$this->Name=$Name;
	}


	public function getPlaylist_track(){
		return $this->playlist_track;
	}


	public function setPlaylist_track($playlist_track){
		$this->playlist_track=$playlist_track;
	}


	 public function __toString(){
		return ($this->Name??'no value').'';
	}

}