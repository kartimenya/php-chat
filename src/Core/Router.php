<?php

namespace Chat\Core;
use Chat\Controller\ChatController;
use Chat\Controller\loginController;


class Router
{

	private array $routes = [
		'/' => [ChatController::class],
		'/login' => [loginController::class],
		'/logout' => [loginController::class, 'logoutAction'],
	];

	public function run(){
		$uri = $_SERVER['REQUEST_URI'];

		if (!isset($this->routes[$uri])) {
			echo '404';
			return;
		}

		$controller = new $this->routes[$uri][0];
		$action = $this->routes[$uri][1] ?? 'mainAction';
		$controller->$action();
	}
}