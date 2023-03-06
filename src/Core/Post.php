<?php

namespace Chat\Core;

class Post {
	use ServerArrayAccessTrait;

	public function __construct(){
		$this->serverArray = $_POST;
	}
}