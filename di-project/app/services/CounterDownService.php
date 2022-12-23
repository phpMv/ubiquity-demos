<?php


namespace services;


class CounterDownService extends CounterService {

	public function __construct($controller,int $value) {
		parent::__construct($controller);
		$this->key='counterD';
		$this->initialValue=$value;
		if($this->getValue()==0) {
			$this->setValue($value);
		}
	}

	public function inc(){
		$this->setValue($this->getValue()-1);
	}

}