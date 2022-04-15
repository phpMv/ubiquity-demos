<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;

#[Table(name: "invoices")]
class Invoices{
	
	#[Id()]
	#[Column(name: "InvoiceId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $InvoiceId;

	
	#[Column(name: "CustomerId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $CustomerId;

	
	#[Column(name: "InvoiceDate",dbType: "DATETIME")]
	#[Validator(type: "notNull",constraints: [])]
	private $InvoiceDate;

	
	#[Column(name: "BillingAddress",dbType: "NVARCHAR(70)")]
	#[Validator(type: "notNull",constraints: [])]
	private $BillingAddress;

	
	#[Column(name: "BillingCity",dbType: "NVARCHAR(40)")]
	#[Validator(type: "notNull",constraints: [])]
	private $BillingCity;

	
	#[Column(name: "BillingState",dbType: "NVARCHAR(40)")]
	#[Validator(type: "notNull",constraints: [])]
	private $BillingState;

	
	#[Column(name: "BillingCountry",dbType: "NVARCHAR(40)")]
	#[Validator(type: "notNull",constraints: [])]
	private $BillingCountry;

	
	#[Column(name: "BillingPostalCode",dbType: "NVARCHAR(10)")]
	#[Validator(type: "notNull",constraints: [])]
	private $BillingPostalCode;

	
	#[Column(name: "Total",dbType: "NUMERIC(10,2)")]
	#[Validator(type: "notNull",constraints: [])]
	private $Total;


	public function getInvoiceId(){
		return $this->InvoiceId;
	}


	public function setInvoiceId($InvoiceId){
		$this->InvoiceId=$InvoiceId;
	}


	public function getCustomerId(){
		return $this->CustomerId;
	}


	public function setCustomerId($CustomerId){
		$this->CustomerId=$CustomerId;
	}


	public function getInvoiceDate(){
		return $this->InvoiceDate;
	}


	public function setInvoiceDate($InvoiceDate){
		$this->InvoiceDate=$InvoiceDate;
	}


	public function getBillingAddress(){
		return $this->BillingAddress;
	}


	public function setBillingAddress($BillingAddress){
		$this->BillingAddress=$BillingAddress;
	}


	public function getBillingCity(){
		return $this->BillingCity;
	}


	public function setBillingCity($BillingCity){
		$this->BillingCity=$BillingCity;
	}


	public function getBillingState(){
		return $this->BillingState;
	}


	public function setBillingState($BillingState){
		$this->BillingState=$BillingState;
	}


	public function getBillingCountry(){
		return $this->BillingCountry;
	}


	public function setBillingCountry($BillingCountry){
		$this->BillingCountry=$BillingCountry;
	}


	public function getBillingPostalCode(){
		return $this->BillingPostalCode;
	}


	public function setBillingPostalCode($BillingPostalCode){
		$this->BillingPostalCode=$BillingPostalCode;
	}


	public function getTotal(){
		return $this->Total;
	}


	public function setTotal($Total){
		$this->Total=$Total;
	}


	 public function __toString(){
		return ($this->Total??'no value').'';
	}

}