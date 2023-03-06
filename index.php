<?php

const MASSAGE_FILE = __DIR__ . "/data/messages.json";

require_once("vendor/autoload.php");

use Chat\Core\Router;

$router = new Router();
$router->run();

?>