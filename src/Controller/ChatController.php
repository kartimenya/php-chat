<?php

namespace Chat\Controller;
use Chat\Core\MessagesStorage;
use Chat\Core\Cookie;
use Chat\Core\Session;
use Chat\Core\Post;
use Chat\Core\View;

class ChatController
{
	public function mainAction(){
		$messagesStorage = new MessagesStorage();
		$cooki = new Cookie();
		$session = new Session();
		$post = new Post();
		$view = new View();

		$login = $session->get('login');

		if (!$login) {
			header('Location: /login');
		}

		$message = $post->get('user_message');
		$login = $session->get('login');

		if ($message && $login) {  
		    if ($message === "set_night") {
		       $cooki->add('theme', 'night');
		    }else if ($message === "set_light"){
		        $cooki->delete('theme');
		    }else{
		       $newMessage = [
		        'message' => $message,
		        'login' => $login,
		        'time' => time()
		       ];
		    $messagesStorage->addMessage($newMessage);
		    }
		}

		$view->render('chat', [
			'message' => $messagesStorage->getMessages(),
			'theme' => $cooki->get('theme')
		]);
	}
}