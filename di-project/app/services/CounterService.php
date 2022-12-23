<?php


namespace services;


use Ubiquity\log\Logger;
use Ubiquity\utils\http\USession;

/**
 * Class CounterService
 * @package services
 */
class CounterService {
	protected $key='counter';
	protected int $initialValue=0;
	public function getValue():int{
		return USession::get($this->key,0);
	}

	protected function setValue(int $value){
		USession::set($this->key,$value);
	}

	public function __construct($controller) {
		Logger::appInfo('Application di','Service instanciated in '.get_class($controller));
	}

	public function inc(){
		$this->setValue($this->getValue()+1);
	}

	public function clear(){
		$this->setValue($this->initialValue);
	}
}