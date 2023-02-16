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
	<form method="POST">
		<input type="text" name="user_login">
		<button type="submit">login</button>
	</form>
</body>
</html>