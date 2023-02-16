<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat</title>
	<?php $style = ($theme === 'night') ? 'style-night.css' : 'style.css';?>
	<link rel="stylesheet" type="text/css" href="<?php echo($style); ?>">
</head>
<body>
	<?php
		foreach ($message as $message) {
			echo "<div class='message'>";
			echo "<div class='time'>" . date("d.m.Y H:i", $message['time']) . "</div>";
			echo "<div class='login'>" . htmlspecialchars($message['login']) . "</div>";
			echo "<div class='massage-text'>" . htmlspecialchars($message['message']) . "</div>";
			echo "</div>";

		}
		?>
		<form method="POST">
			<input type="text" name="user_message">
			<button type="submit">add</button>
		</form>
	</body>
	</html>