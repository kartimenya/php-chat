<?php

namespace Chat\Core;

trait ServerArrayAccessTrait{

	private array $serverArray;

	public function get($key, $default = null){
		return $this->serverArray[$key] ?? $default;
	}

	public function has($key){
		return isset($this->serverArray[$key]);
	}
}