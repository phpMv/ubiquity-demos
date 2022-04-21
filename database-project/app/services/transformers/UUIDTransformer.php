<?php
namespace services\transformers;

class UUIDTransformer implements \Ubiquity\contents\transformation\TransformerInterface {
	private static \Jenssegers\Optimus\Optimus $optimus;

	public static function getOptimus(): \Jenssegers\Optimus\Optimus {
			return self::$optimus??=new \Jenssegers\Optimus\Optimus(1580030173, 59260789, 1163945558);
	}

	public static function transform($value) {
		return self::getOptimus()->encode($value);
	}

	public static function reverse($value) {
		return self::getOptimus()->decode($value);
	}
}