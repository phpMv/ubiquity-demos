<?php
namespace controllers\traits;

use Ubiquity\utils\http\URequest;

/**
 * controllers\traits$UITrait
 *
 * @author jc
 * @version 1.0.0
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 *
 */
trait UITrait {

	protected function initializeAuth() {
		if (! URequest::isAjax() && ! URequest::has('_initialize')) {
			$this->loadView("@activeTheme/main/vHeader.html");
			URequest::set('_initialize');
		}
	}

	protected function finalizeAuth() {
		if (! URequest::isAjax() && ! URequest::has('_finalize')) {
			$this->loadView("@activeTheme/main/vFooter.html");
			URequest::set('_finalize');
		}
	}

	protected function showMessage($header = '', $content = '', $icon = 'info circle', $type = 'info', $id = 'msg') {
		$msg = $this->jquery->semantic()->htmlMessage($id, $content, $type);
		$msg->addHeader($header);
		$msg->setIcon($icon);
		return $msg;
	}
}

