<?php


class Session
{	
	use ServerArrayAccessTrait;
	use MutableServerArrayTrait;

	public function __construct(){
		session_start();
		$this->serverArray = &$_SESSION;
	}

	public function clear(){
		session_destroy();
	}
}