<?php   

$db = mysqli_connect('localhost','root','123456', 'login_out');
$id="";
	if(isset($_GET['id'])){ 
    $id = $_GET['id'];
    $sql4 = "SELECT  nameevent, starttime, startdate, endtime, enddate, location, contact, note
			FROM event
			 WHERE idevent ='$id'";
    $ket_qua = mysqli_query($db,$sql4);

    while ($row = mysqli_fetch_array($ket_qua)) {
		$nameevent=$row['nameevent'];
		$starttime=$row['starttime'];
		$startdate=$row['startdate'];
		$endtime=$row['endtime'];
		$enddate=$row['enddate'];
		$contact=$row['contact'];
		$location=$row['location'];
		$note=$row['note'];
		}
}

$db = mysqli_connect('localhost','root','123456', 'login_out');

	
	if(isset($_POST['save1'])){
		
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
		
		$sql3 = "UPDATE event
				SET nameevent = '$nameevent', starttime = '$starttime', startdate = '$startdate', endtime ='$endtime', 
				enddate ='$enddate', contact ='$contact', location ='$location', note ='$note'
				WHERE idevent = '$id' ";
				mysqli_query($db, $sql3);

		if (mysqli_query($db, $sql3)) {
			header('location: schedule.php');
			}
				
		}
	}
}

if( isset($_POST['delete']) ){
	
	$sql5 = "
			DELETE FROM event
			WHERE idevent = '$id';
			 ";
			mysqli_query($db,$sql5);
			
			if (mysqli_query($db, $sql5)) {
			header('location: schedule.php');
			}
}


?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Edit event</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
      <link rel="stylesheet" href="css/stylein.css">

  
</head>

<body>
 <div class="cview__header" >
<div id="menu">
<div> <a href="./calender.php" > Calender </a> </div>
<div> <a href="./schedule.php" > Schedule </a> </div>
<div> <a href="./addevent.php"> Add event </a> </div>
<div> <a href="./profile.php" > Profile </a> </div>
<div> <a href="./login.php" > Logout </a> </div>

	</div>
</div>
    <div class="day-view-content">
      <div class="day-highlight">
       <form method="post" action="edit.php">
        <div class="row">
          <div class="half">
         
            <label class="add-event-label">
               Name of event
              <input type="text" class="add-event-edit add-event-edit--long"  name="nameevent"
              value="<?php echo $nameevent; ?>" >
             
            </label>
          </div>
          
          <div class="qtr">
            <label class="add-event-label">
          Start Time
          <input type="date" class="add-event-edit"  id="input-add-event-start-date"  name="startdate" value="<?php echo $startdate; ?>">
              <input type="time" class="add-event-edit"  id="input-add-event-start-time"  name="starttime" 
              value="<?php echo $starttime; ?>">  
            </label>
          </div>
          <div class="qtr">
            <label class="add-event-label">
          End Time
              <input type="date" class="add-event-edit"  id="input-add-event-end-date"  name="enddate" value="<?php echo $enddate; ?>">
              <input type="time" class="add-event-edit"  id="input-add-event-end-time"  name="endtime" value="<?php echo $endtime; ?>">
            </label>
          </div>

          
        </div>
        
        <div class="half">
            <label class="add-event-label">
               Contact
              <input type="text" class="add-event-edit add-event-edit--long"   name="contact" 
              value="<?php echo $contact; ?>">
     
            </label>
          </div>
          <div class="half" >
            <label class="add-event-label">
               Where
              <input type="text" class="add-event-edit add-event-edit--long"  name="location"
               value="<?php echo $location; ?>">
             
            </label>
          </div>
          <div class="half" >
            <label class="add-event-label">
               Note
              <input type="text" class="add-event-edit add-event-edit--long"  name="note"
              value="<?php echo $note; ?>" >
             
            </label>
          </div>
          <div>
        <div class="half">
        <div class="input-group">
			<button type="submit" name="save1" class="btn">Save</button>
            <button type="submit" name="delete" class="btn">Delete</button>
		</div>
     
            </div>
            
          </div>
        
      </div>
      
      
    </div>
    </form>
    
   
  </div>
  
</div>
 

</body>
</html>

