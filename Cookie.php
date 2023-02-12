<?php


class Cookie extends AbstractServerArray
{

	public function __construct(){
		$this->serverArray = $_COOKIE;
	}

	public function add($key, $value){
		setcookie($key, $value);
		parent::add($key, $value);
	}

	public function delete($key){
		setcookie($key, null, -1);
		parent::delete($key);
	}

	public function clear(){
		foreach ($this->serverArray as $key => $value) {
			$this->delete($key);
		}
		
	}
}