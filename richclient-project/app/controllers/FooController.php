<?php
namespace controllers;

/**
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 */
class FooController extends ControllerBase {

	public function index() {
		$this->jquery->getHref('a', '.result span', [
			'hasLoader' => 'internal',
			'historize' => false
		]);
		$this->jquery->renderView("FooController/index.html");
	}

	/**
	 *
	 * @get("a","name"=>"action.a")
	 */
	public function aAction() {
		echo "a";
	}

	/**
	 *
	 * @get("b","name"=>"action.b")
	 */
	public function bAction() {
		echo "b";
	}

	/**
	 *
	 * @get("c","name"=>"action.c")
	 */
	public function cAction() {
		echo rand(0, 100);
	}
}
