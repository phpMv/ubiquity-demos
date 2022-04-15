<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\OneToMany;
use Ubiquity\attributes\items\ManyToOne;
use Ubiquity\attributes\items\JoinColumn;

#[Table(name: "employees")]
class Employees{
	
	#[Id()]
	#[Column(name: "EmployeeId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $EmployeeId;

	
	#[Column(name: "LastName",dbType: "NVARCHAR(20)")]
	#[Validator(type: "notNull",constraints: [])]
	private $LastName;

	
	#[Column(name: "FirstName",dbType: "NVARCHAR(20)")]
	#[Validator(type: "notNull",constraints: [])]
	private $FirstName;

	
	#[Column(name: "Title",dbType: "NVARCHAR(30)")]
	#[Validator(type: "notNull",constraints: [])]
	private $Title;

	
	#[Column(name: "ReportsTo",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $ReportsTo;

	
	#[Column(name: "BirthDate",dbType: "DATETIME")]
	#[Validator(type: "notNull",constraints: [])]
	private $BirthDate;

	
	#[Column(name: "HireDate",dbType: "DATETIME")]
	#[Validator(type: "notNull",constraints: [])]
	private $HireDate;

	
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

	
	#[OneToMany(mappedBy: "employees",className: "models\\Employees")]
	private $employeess;

	
	#[ManyToOne()]
	#[JoinColumn(className: "models\\Employees",name: "employeeId")]
	private $employees;


	 public function __construct(){
		$this->employeess = [];
	}


	public function getEmployeeId(){
		return $this->EmployeeId;
	}


	public function setEmployeeId($EmployeeId){
		$this->EmployeeId=$EmployeeId;
	}


	public function getLastName(){
		return $this->LastName;
	}


	public function setLastName($LastName){
		$this->LastName=$LastName;
	}


	public function getFirstName(){
		return $this->FirstName;
	}


	public function setFirstName($FirstName){
		$this->FirstName=$FirstName;
	}


	public function getTitle(){
		return $this->Title;
	}


	public function setTitle($Title){
		$this->Title=$Title;
	}


	public function getReportsTo(){
		return $this->ReportsTo;
	}


	public function setReportsTo($ReportsTo){
		$this->ReportsTo=$ReportsTo;
	}


	public function getBirthDate(){
		return $this->BirthDate;
	}


	public function setBirthDate($BirthDate){
		$this->BirthDate=$BirthDate;
	}


	public function getHireDate(){
		return $this->HireDate;
	}


	public function setHireDate($HireDate){
		$this->HireDate=$HireDate;
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


	public function getEmployeess(){
		return $this->employeess;
	}


	public function setEmployeess($employeess){
		$this->employeess=$employeess;
	}


	 public function addToEmployeess($employee){
		$this->employeess[]=$employee;
		$employee->setEmployees($this);
	}


	public function getEmployees(){
		return $this->employees;
	}


	public function setEmployees($employees){
		$this->employees=$employees;
	}


	 public function __toString(){
		return ($this->Email??'no value').'';
	}

}