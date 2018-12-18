 <?php
	session_start();
	$id="";
	$username ="";
	$password_1="";
	$password_2="";
	$password_3="";
	$password_4="";
	$errors = array();
	
	$db = mysqli_connect('localhost','root','123456', 'login_out');
	if(isset($_POST['register'])){
		$password_1=$_POST['password_1'];
		$password_2=$_POST['password_2'];
		if(empty($_POST['username'])){
			header('location: register.php');
		}
		else if(empty($_POST['password_1'])){
			header('location: register.php');
		}
		else if($password_1 != $password_2){
			header('location: register.php');
		}
	
	else{
		$password = $_POST['password_1'];
		$username = $_POST['username'];
		$ssql = "SELECT * FROM user
		WHERE username= '$username' ";
		$qqe = mysqli_query($db,$ssql);
		$num1 = mysqli_num_rows($qqe);
		if($num1 == 0){
		$sql = "INSERT INTO login_out.user(username,password)
			VALUES('$username','$password')";
		mysqli_query($db,$sql);
		$_SESSION['username'] = $username;
				header('location: calender.php');
		}
		else echo '<p style="font-size: 25px " align="left" > Username already exists</p>';
		}
	 
	}
	
	
	if(isset($_POST['login'])){
			
		if(empty($_POST['username'])){
			echo '<p style="font-size: 25px " align="left" > Enter username </p>';
			
		}
		else if(empty($_POST['password'])){
				echo '<p style="font-size: 25px "  align="center"> Enter password </p>';
			}
		else{
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$query = "SELECT iduser,username,password FROM user WHERE username ='$username' AND password='$password' ";
			$result = mysqli_query($db,$query);
			if(mysqli_num_rows($result) == 1){
				list($id, $username, $password) = mysqli_fetch_array($result);
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $id;
			
			header('location: calender.php');
			}
		else{
			echo '<p style="font-size: 25px " align="center"> Username or password is correct </p>';
			}
		}
	}
	if(isset($_POST['done'])){
		
		if(empty($_POST['password_3'])){
			header('location: profile.php');
		}
	
		else{ 
			$password_3=$_POST['password_3'];
			$password_4=$_POST['password_4'];
			if($password_3 != $password_4){
			header('location: profile.php');
			}
			else {
				//
				echo '<p style="font-size: 25px "> Changed password  </p>';
				header('location: calender.php');
				
			/*$query5 = "UPDATE user SET password = '$password_3' WHERE user.iduser = '$id' ";
			$mysqli_query($db,$query5);
				if(mysqli_affected_rows($db) == 1) {
				echo '<p style="font-size: 25px " align="center"> Changed password  </p>';	
				}
				else
				{ echo '<p style="font-size: 25px " align="center"> Correct </p>'; 
				header('location: profile.php');}*/
			}
		}
	}
	
	$nameevent="";
	$starttime="";
	$startdate="";
	$endtime="";
	$enddate="";
	$contact="";
	$location="";
	$note="";
	$ide="";
	
	if(isset($_POST['cancel'])) header('location: calender.php');
	if(isset($_POST['save'])){
		
		if(empty($_POST['nameevent'])){
			echo '<p style="font-size: 25px " align="left" > Enter nameevent </p>';
		}
		else if(empty($_POST['startdate'])){
			echo '<p style="font-size: 25px " align="left" > Enter day start </p>';
		}
		else if(empty($_POST['starttime'])){
			echo '<p style="font-size: 25px " align="left" > Enter start time </p>';
		}
	
	else{
		$nameevent=$_POST['nameevent'];
		$starttime=$_POST['starttime'];
		$startdate=$_POST['startdate'];
		$endtime=$_POST['endtime'];
		$enddate=$_POST['enddate'];			
		$contact=$_POST['contact'];
		$location=$_POST['location'];
		$note=$_POST['note'];
		
		if(!empty($_POST['endtime']) && ( $starttime > $endtime )){
			echo '<p style="font-size: 25px " align="left" > Error </p>';
			}
		else if(!empty($_POST['enddate']) && ( $startdate > $enddate )){
			echo '<p style="font-size: 25px " align="left"  > Error </p>';
			}
		else {
		
		$sql1 = "INSERT INTO event(nameevent,startdate,starttime,enddate,endtime,contact,location,note)
				VALUES('$nameevent','$startdate','$starttime','$enddate','$endtime','$contact','$location','$note')";
		//mysqli_query($db,$sql1);

		if (mysqli_query($db, $sql1)) {
    	$ide = mysqli_insert_id($db);
		$_SESSION['ide'] = $ide;
		$_SESSION['startdate']= $startdate;
		}
			
			$sql2 = "INSERT INTO user_event(iduser,idevent)
						VALUES ('{$_SESSION['id']}','{$_SESSION['ide']}')";
			mysqli_query($db,$sql2);
			header('location: schedule.php');
		}
				
	}
}







	
mysqli_close($db);	
?>