<?php

namespace services\models;


use services\transformers\UUIDTransformer;

/**
 * Trait UUIDModel
 * @property int $id
 * @package models
 */
trait UUIDModel {
	public function getUuid():int{
		return UUIDTransformer::getOptimus()->encode($this->id);
	}
}