<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\OneToMany;

#[Table(name: "playlist_track")]
class Playlist_track{
	
	#[Id()]
	#[Column(name: "PlaylistId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $PlaylistId;

	
	#[Column(name: "TrackId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $TrackId;

	
	#[OneToMany(mappedBy: "playlist_track",className: "models\\Playlists")]
	private $playlistss;


	 public function __construct(){
		$this->playlistss = [];
	}


	public function getPlaylistId(){
		return $this->PlaylistId;
	}


	public function setPlaylistId($PlaylistId){
		$this->PlaylistId=$PlaylistId;
	}


	public function getTrackId(){
		return $this->TrackId;
	}


	public function setTrackId($TrackId){
		$this->TrackId=$TrackId;
	}


	public function getPlaylistss(){
		return $this->playlistss;
	}


	public function setPlaylistss($playlistss){
		$this->playlistss=$playlistss;
	}


	 public function addToPlaylistss($playlist){
		$this->playlistss[]=$playlist;
		$playlist->setPlaylist_track($this);
	}


	 public function __toString(){
		return ($this->TrackId??'no value').'';
	}

}