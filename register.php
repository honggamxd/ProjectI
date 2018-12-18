
<?php include('Server.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
	<link rel="stylesheet" type="text/css" href="stylein.css">
</head>

<body>
	
	<form method="post" action="register.php">
    <div class="header">
		<h1> Register </h1>
	</div>
		<div class="input-group">
			<label> Username </label>
			<input type="text" name="username" placeholder="username">
		</div>
		<div class="input-group">
			<label> Password </label>
			<input type="password" name="password_1" placeholder="password" >
		</div>
		<div class="input-group">
			<label> Confirm password </label>
			<input type="password" name="password_2" placeholder="password" >
		</div>
		<p>
			
            
            
            
		</p>
		<div class="input-group">
			<button type="submit" name="register" class="btn">Register</button>
		</div>
		<p>
			You have account ? <a href="login.php"> Login </a>
		</p>
		
	</form>
	
</body>
</html>