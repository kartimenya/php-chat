<?php

namespace Chat\Controller;
use Chat\Core\Session;
use Chat\Core\Post;
use Chat\Core\View;
use Chat\Core\Cookie;

class LoginController
{
	public function mainAction(){
		$session = new Session();
		$post = new Post();
		$view = new View();
		$cooki = new Cookie();

		if (!$session->has('login') && $post->has('user_login')) {
		    $session->add('login', $post->get('user_login'));
		}

		$login = $session->get('login');

		if ($login) {
			header('Location: /');
		}

		$view->render('login', [
			'theme' => $cooki->get('theme')
		]);
	}

	public function logoutAction(){
		$session = new Session();
		$session->delete('login');
		header('Location: /login');
	}
}