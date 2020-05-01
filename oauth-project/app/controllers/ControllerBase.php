<?php
namespace controllers;

use Ubiquity\controllers\Controller;
use Ubiquity\utils\http\URequest;

/**
 * ControllerBase.
 */
abstract class ControllerBase extends Controller {

	protected $headerView = "@activeTheme/main/vHeader.html";

	protected $footerView = "@activeTheme/main/vFooter.html";

	public function initialize() {
		if (! URequest::isAjax() && ! URequest::has('_initialize')) {
			$this->loadView($this->headerView);
			URequest::set('_initialize');
		}
	}

	public function finalize() {
		if (! URequest::isAjax() && ! URequest::has('_finalize')) {
			$this->loadView($this->footerView);
			URequest::set('_finalize');
		}
	}
}

