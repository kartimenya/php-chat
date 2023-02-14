<?php

class Post {
	use ServerArrayAccessTrait;

	public function __construct(){
		$this->serverArray = $_POST;
	}
}