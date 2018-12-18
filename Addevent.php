<?php  include('Server.php');
if (!isset($_SESSION['username'])) {
	 header('Location: login.php');
}?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Add event</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
      <link rel="stylesheet" href="css/stylein.css">

  
</head>

<body>
 <div class="cview__header" >
<div id="menu">
<div> <a href="./calender.php" > Calender </a> </div>
<div> <a href="./schedule.php" > Schedule </a> </div>
<div> <a> Add event </a> </div>
<div> <a href="./profile.php" > Profile </a> </div>
<div> <a href="./login.php" > Logout </a> </div>

	</div>
</div>
    <div class="day-view-content">
      <div class="day-highlight">
       <form method="post" action="Addevent.php">
        <div class="row">
          <div class="half">
         
            <label class="add-event-label">
               Name of event
              <input type="text" class="add-event-edit add-event-edit--long" placeholder="New event" name="nameevent" >
             
            </label>
          </div>
          
          <div class="qtr">
            <label class="add-event-label">
          Start Time
          <input type="date" class="add-event-edit"  id="input-add-event-start-date"  name="startdate">
              <input type="time" class="add-event-edit"  id="input-add-event-start-time"  name="starttime">  
            </label>
          </div>
          <div class="qtr">
            <label class="add-event-label">
          End Time
              <input type="date" class="add-event-edit"  id="input-add-event-end-date"  name="enddate">
              <input type="time" class="add-event-edit"  id="input-add-event-end-time"  name="endtime">
            </label>
          </div>

          
        </div>
        
        <div class="half">
            <label class="add-event-label">
               Contact
              <input type="text" class="add-event-edit add-event-edit--long" placeholder="Contact"  name="contact">
     
            </label>
          </div>
          <div class="half" >
            <label class="add-event-label">
               Where
              <input type="text" class="add-event-edit add-event-edit--long" placeholder="Event location" name="location" >
             
            </label>
          </div>
          <div class="half" >
            <label class="add-event-label">
               Note
              <input type="text" class="add-event-edit add-event-edit--long" placeholder="Event note" name="note" >
             
            </label>
          </div>
          <div>
        <div class="half">
        <div class="input-group">
			<button type="submit" name="save" class="btn">Save</button>
            <button type="submit" name="cancel" class="btn1">Cancel</button>
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
