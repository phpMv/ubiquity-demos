<?php

namespace controllers\router;

use Ubiquity\controllers\ControllerBase;

abstract class BaseRouterController extends ControllerBase {

	public function baseRoute(){
		echo "Route from base controller";
	}
}

