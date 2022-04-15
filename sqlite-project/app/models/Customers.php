<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;

#[Table(name: "customers")]
class Customers{
	
	#[Id()]
	#[Column(name: "CustomerId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $CustomerId;

	
	#[Column(name: "FirstName",dbType: "NVARCHAR(40)")]
	#[Validator(type: "notNull",constraints: [])]
	private $FirstName;

	
	#[Column(name: "LastName",dbType: "NVARCHAR(20)")]
	#[Validator(type: "notNull",constraints: [])]
	private $LastName;

	
	#[Column(name: "Company",dbType: "NVARCHAR(80)")]
	#[Validator(type: "notNull",constraints: [])]
	private $Company;

	
	#[Column(name: "Address",dbType: "NVARCHAR(70)")]
	#[Validator(type: "notNull",constraints: [])]
	private $Address;

	
	#[Column(name: "City",dbType: "NVARCHAR(40)")]
	#[Validator(type: "notNull",constraints: [])]
	private $City;

	
	#[Column(name: "State",dbType: "NVARCHAR(40)")]
	#[Validator(type: "notNull",constraints: [])]
	private $State;

	
	#[Column(name: "Country",dbType: "NVARCHAR(40)")]
	#[Validator(type: "notNull",constraints: [])]
	private $Country;

	
	#[Column(name: "PostalCode",dbType: "NVARCHAR(10)")]
	#[Validator(type: "notNull",constraints: [])]
	private $PostalCode;

	
	#[Column(name: "Phone",dbType: "NVARCHAR(24)")]
	#[Validator(type: "notNull",constraints: [])]
	private $Phone;

	
	#[Column(name: "Fax",dbType: "NVARCHAR(24)")]
	#[Validator(type: "notNull",constraints: [])]
	private $Fax;

	
	#[Column(name: "Email",dbType: "NVARCHAR(60)")]
	#[Validator(type: "notNull",constraints: [])]
	private $Email;

	
	#[Column(name: "SupportRepId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $SupportRepId;


	public function getCustomerId(){
		return $this->CustomerId;
	}


	public function setCustomerId($CustomerId){
		$this->CustomerId=$CustomerId;
	}


	public function getFirstName(){
		return $this->FirstName;
	}


	public function setFirstName($FirstName){
		$this->FirstName=$FirstName;
	}


	public function getLastName(){
		return $this->LastName;
	}


	public function setLastName($LastName){
		$this->LastName=$LastName;
	}


	public function getCompany(){
		return $this->Company;
	}


	public function setCompany($Company){
		$this->Company=$Company;
	}


	public function getAddress(){
		return $this->Address;
	}


	public function setAddress($Address){
		$this->Address=$Address;
	}


	public function getCity(){
		return $this->City;
	}


	public function setCity($City){
		$this->City=$City;
	}


	public function getState(){
		return $this->State;
	}


	public function setState($State){
		$this->State=$State;
	}


	public function getCountry(){
		return $this->Country;
	}


	public function setCountry($Country){
		$this->Country=$Country;
	}


	public function getPostalCode(){
		return $this->PostalCode;
	}


	public function setPostalCode($PostalCode){
		$this->PostalCode=$PostalCode;
	}


	public function getPhone(){
		return $this->Phone;
	}


	public function setPhone($Phone){
		$this->Phone=$Phone;
	}


	public function getFax(){
		return $this->Fax;
	}


	public function setFax($Fax){
		$this->Fax=$Fax;
	}


	public function getEmail(){
		return $this->Email;
	}


	public function setEmail($Email){
		$this->Email=$Email;
	}


	public function getSupportRepId(){
		return $this->SupportRepId;
	}


	public function setSupportRepId($SupportRepId){
		$this->SupportRepId=$SupportRepId;
	}


	 public function __toString(){
		return ($this->SupportRepId??'no value').'';
	}

}