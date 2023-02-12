<?php


class Session
{
	private array $session;
	
	public function __construct(){
		session_start();
		$this->session = &$_SESSION;
	}

	public function add($key, $value){
		$this->session[$key] = $value;
	}

	public function get($key, $default = null){
		return $this->session[$key] ?? $default;
	}

	public function has($key){
		return isset($this->session[$key]);
	}

	public function delete($key){
		unset($this->session[$key]);
	}
}