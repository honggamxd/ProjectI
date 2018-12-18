<?php include('Server.php');
if (!isset($_SESSION['username'])) {
	 header('Location: login.php');
} ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="stylein.css">
</head>

<body>
<div class="cview__header" >
<div id="menu">
<div> <a href="./calender.php" > Calender </a> </div>
<div> <a href="./schedule.php" > Schedule </a> </div>
<div> <a href="./addevent.php"> Add event </a> </div>
<div> <a> Profile </a> </div>
<div> <a href="./login.php" > Logout </a> </div>
	</div>
</div>
	
	<form method="post" action="profile.php">
    <div class="header">
		<h1> Profile </h1>
	</div>
		<div class="input-group">
        <?php if(isset($_SESSION["username"])): ?>
	<p> Welcome <strong> <?php echo $_SESSION['username'];  ?> </strong> </p>

		<?php endif ?>
		</div>
		<div class="input-group">
			<label> New password </label>
			<input type="password" name="password_3" placeholder="newpassword" >
		</div>
		<div class="input-group">
			<label> Confirm new password </label>
			<input type="password" name="password_4" placeholder="newpassword" >
		</div>
		<div class="input-group">
			<button type="submit" name="done" class="btn">Done</button>
		</div>
		
		
	</form>
	
</body>
</html>