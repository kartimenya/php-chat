<?php

namespace Chat\Core;

trait MutableServerArrayTrait{

	private array $serverArray;

	public function add($key, $value){
		$this->serverArray[$key] = $value;
	}

	public function delete($key){
		unset($this->serverArray[$key]);
	}

	public abstract function clear();
}