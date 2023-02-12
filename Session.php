<?php


class Session extends AbstractServerArray
{	
	public function __construct(){
		session_start();
		$this->serverArray = &$_SESSION;
	}

	public function clear(){
		session_destroy();
	}
}