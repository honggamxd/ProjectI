<?php include('Server.php');
if (!isset($_SESSION['username'])) {
	 header('Location: login.php');
}
$db = mysqli_connect('localhost','root','123456', 'login_out');
 

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
 
	$sql3 = "SELECT  nameevent, starttime, startdate, endtime, enddate, location, contact, note, event.idevent
		FROM event,user_event
		WHERE user_event.iduser = '{$_SESSION['id']}'
			AND user_event.idevent = event.idevent" ;
	$result1 = mysqli_query($db, $sql3);


?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>View schedule</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
      <link rel="stylesheet" href="css/stylein.css">

  
</head>

<body>
 <div class="cview__header" >
<div id="menu">
<div> <a href="./calender.php" > Calender </a> </div>
<div> <a> Schedule </a> </div>
<div> <a href="./addevent.php"> Add event </a> </div>
<div> <a href="./profile.php" > Profile </a> </div>
<div> <a href="./login.php" > Logout </a> </div>
	</div>
</div>
<div class="header">
<form method= "post" action="schedule.php">
  <div class="day-view-content">
      <div class="day-highlight">
          <div>    
          <div class="qtr">
            <label class="add-event-label">
          Day
          <input type="date" class="add-event-edit"    name="day">  
            </label>
            <div class="input-group">
			<button type="submit" name="view" class="btn">View</button>
		</div>
          </div> 
  </div>
  </div>
  </div>
  </div>

<div class="day-view-content">
      <div class="day-highlight">
      
      
  
          <div>   
         <?php 
		 if(isset($_POST['view'])){
		
		$day = $_POST['day'];
			
			$query2 = "SELECT  nameevent, starttime, startdate, endtime, enddate, location, contact, note, event.idevent
			FROM event,user_event
			WHERE user_event.iduser = '{$_SESSION['id']}'
			AND user_event.idevent = event.idevent
			AND startdate = '$day' " ;
			
			$result2 = mysqli_query($db,$query2);
			$num2 = mysqli_num_rows($result2);
			if($num2 == 0){
				echo "<p> No event </p>";
			}
			else {
			
			
			 while ($row = mysqli_fetch_array($result2)) {
   				echo "<p>+ Event Name : " . $row['nameevent'] . "</p>";
   				echo "<p>+ From : " . $row['starttime'] . " - " . $row['startdate'] . "</p>" ;
    			echo "<p>+ To : " . $row['endtime'] . " - " . $row['enddate'] . "</p>";
				echo "<p>+ Location:  " . $row['location'] . "</p>";
				echo "<p>+ Contact : " . $row['contact'] . "</p>";
				echo "<p>+ Note : " . $row['note'] . "</p>";

    
    			echo "<p><a href='edit.php?id=" . $row['idevent'] . "'>Edit</a></p>";
    			echo "<hr>";
			 	}
		
			}
		}
	else {
		 while ($row = mysqli_fetch_array($result1)) {
    		echo "<p>+ Event Name : " . $row['nameevent'] . "</p>";
    		echo "<p>+ From : " . $row['starttime'] . " - " . $row['startdate'] . "</p>" ;
    		echo "<p>+ To : " . $row['endtime'] . " - " . $row['enddate'] . "</p>";
			echo "<p>+ Location:  " . $row['location'] . "</p>";
			echo "<p>+ Contact : " . $row['contact'] . "</p>";
			echo "<p>+ Note : " . $row['note'] . "</p>";

   
    		echo "<p><a href='edit.php?id=" . $row['idevent'] . "'>Edit</a></p>";
    		echo "<hr>";
			}
	}
 
?> 
  
  
</div>
</div>
</div>




 

</body>
</html>

