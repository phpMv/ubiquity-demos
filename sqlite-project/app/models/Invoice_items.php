<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;

#[Table(name: "invoice_items")]
class Invoice_items{
	
	#[Id()]
	#[Column(name: "InvoiceLineId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $InvoiceLineId;

	
	#[Column(name: "InvoiceId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $InvoiceId;

	
	#[Column(name: "TrackId",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $TrackId;

	
	#[Column(name: "UnitPrice",dbType: "NUMERIC(10,2)")]
	#[Validator(type: "notNull",constraints: [])]
	private $UnitPrice;

	
	#[Column(name: "Quantity",dbType: "INTEGER")]
	#[Validator(type: "notNull",constraints: [])]
	private $Quantity;


	public function getInvoiceLineId(){
		return $this->InvoiceLineId;
	}


	public function setInvoiceLineId($InvoiceLineId){
		$this->InvoiceLineId=$InvoiceLineId;
	}


	public function getInvoiceId(){
		return $this->InvoiceId;
	}


	public function setInvoiceId($InvoiceId){
		$this->InvoiceId=$InvoiceId;
	}


	public function getTrackId(){
		return $this->TrackId;
	}


	public function setTrackId($TrackId){
		$this->TrackId=$TrackId;
	}


	public function getUnitPrice(){
		return $this->UnitPrice;
	}


	public function setUnitPrice($UnitPrice){
		$this->UnitPrice=$UnitPrice;
	}


	public function getQuantity(){
		return $this->Quantity;
	}


	public function setQuantity($Quantity){
		$this->Quantity=$Quantity;
	}


	 public function __toString(){
		return ($this->Quantity??'no value').'';
	}

}