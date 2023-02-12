<?php 

abstract class AbstractServerArray
{
	protected array $serverArray;

	public function get($key, $default = null){
		return $this->serverArray[$key] ?? $default;
	}

	public function has($key){
		return isset($this->serverArray[$key]);
	}

	public function add($key, $value){
		$this->serverArray[$key] = $value;
	}

	public function delete($key){
		unset($this->serverArray[$key]);
	}

	public abstract function clear();
}