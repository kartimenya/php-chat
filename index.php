<?php

const MASSAGE_FILE = __DIR__ . "/data/messages.json";

require_once 'MessagesStorage.php';
require_once 'Cookie.php';
require_once 'Session.php';

$messagesStorage = new MessagesStorage();
$cooki = new Cookie();
$session = new Session();

if (!$session->has('login') && isset($_POST['user_login'])) {
    $session->add('login', $_POST['user_login']);
}

$message = $_POST['user_message']?? null;
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php $style = ($cooki->get('theme') === 'night') ? 'style-night.css' : 'style.css';?>
    <link rel="stylesheet" type="text/css" href="<?php echo($style); ?>">
</head>
<body>
    <?php
        if ($session->has('login')) {
            foreach ($messagesStorage->getMessages() as $massage) {
                echo "<div class='message'>";
                echo "<div class='time'>" . date("d.m.Y H:i", $massage['time']) . "</div>";
                echo "<div class='login'>" . htmlspecialchars($massage['login']) . "</div>";
                echo "<div class='massage-text'>" . htmlspecialchars($massage['message']) . "</div>";
                echo "</div>";
                
            }
            echo '<form method="POST">
                    <input type="text" name="user_message">
                    <button type="submit">add</button>
                </form>';
        }else{
            echo '<form method="POST">
                    <input type="text" name="user_login">
                    <button type="submit">login</button>
                </form>';
        }
    ?>
</body>
</html>