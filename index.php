<?php

const MASSAGE_FILE = __DIR__ . "/data/messages.json";

require_once 'MessagesStorage.php';
require_once 'ServerArrayAccessTrait.php';
require_once 'MutableServerArrayTrait.php';
require_once 'Cookie.php';
require_once 'Session.php';
require_once 'Post.php';
require_once 'src/Controller/LoginController.php';
require_once 'src/Controller/ChatController.php';
require_once 'src/Core/Router.php';
require_once 'src/Core/View.php';

$router = new Router();
$router->run();

?>