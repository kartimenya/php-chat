<?php


class Cookie
{
	private array $cooki;

	public function __construct(){
		$this->cookie = $_COOKIE;
	}

	public function add($key, $value){
		setcookie($key, $value);
		$this->cookie[$key] = $value;
	}

	public function get($key, $default = null){
		return $this->cookie[$key] ?? $default;
	}

	public function has($key){
		return isset($this->cookie[$key]);
	}

	public function delete($key){
		setcookie($key, null, -1);
		unset($this->cookie[$key]);
	}
}