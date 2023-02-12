<?php

session_start();

const MASSAGE_FILE = "data/messages.json";

require_once 'MessagesStorage.php';

$messagesStorage = new MessagesStorage();

$messagesArray = $messagesStorage->getMessagesFromFile();


$theme = $_COOKIE['theme'] ?? null;

if (!isset($_SESSION['login']) && isset($_POST['user_login'])) {
    $_SESSION['login'] = $_POST['user_login'];
}

$message = $_POST['user_message']?? null;
$login = $_SESSION['login'] ?? null;

if ($message && $login) {  
    if ($message === "set_night") {
       setcookie("theme", "night");
       $theme = "night";
    }else if ($message === "set_light"){
        setcookie("theme", null, -1);
        $theme = null;
    }else{
       $messagesArray[] = [
        'message' => $message,
        'login' => $login,
        'time' => time()
       ];
    $messagesStorage->setMessagesToFile($messagesArray);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php $style = ($theme === 'night') ? 'style-night.css' : 'style.css';?>
    <link rel="stylesheet" type="text/css" href="<?php echo($style); ?>">
</head>
<body>
    <?php
        if (isset($_SESSION['login'])) {
            foreach ($messagesArray as $massage) {
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