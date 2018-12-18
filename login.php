<?php include('Server.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
	<link rel="stylesheet" type="text/css" href="stylein.css">
</head>

<body>
	
	<form method="post" action="login.php">
    <div class="header">
		<h1> Login </h1>
	</div>
		<div class="input-group">
			<label> Username </label>
			<input type="text" name="username" placeholder="username" >
		</div>
		<div class="input-group">
			<label> Password </label>
			<input type="password" name="password" placeholder="password">
		</div>
		<p>
			Ready ?
          
		</p>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>
		<p>
			Create new account <a href="register.php"> Register </a>
		</p>
		
	</form>
	
</body>
</html>