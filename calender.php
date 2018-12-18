<?php include('Server.php'); ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Calender</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
      <link rel="stylesheet" href="css/stylein.css">

  
</head>

<body>
<div class="cview__header" >
<div id="menu">
<div> <a > Calender </a> </div>
<div> <a href="./schedule.php" > Schedule </a> </div>
<div> <a href="./addevent.php" > Add event </a> </div>
<div> <a href="./profile.php" > Profile </a> </div>
<div> <a href="./login.php" > Logout </a> </div>
	</div>
</div>
  <div class="calendar" id="calendar-app">
  <div class="calendar--day-view" id="day-view">
    <span class="day-view-exit" id="day-view-exit">&times;</span>
    <div class="day-view-content">
      <div class="day-highlight">
      </div>
      <div class="day-add-event" id="add-day-event-box" data-active="false">
        <div class="row">
          
        </div>
        
      </div>
      <div id="day-events-list" class="day-events-list">
        
      </div>
    </div>
  </div>
  <div class="calendar--view" id="calendar-view">
    <div class="cview__month">
      <span class="cview__month-last" id="calendar-month-last">Apr</span>
      <span class="cview__month-current" id="calendar-month">May</span>
      <span class="cview__month-next" id="calendar-month-next">Jun</span>
    </div>
    <div class="cview__header">Sun</div>
    <div class="cview__header">Mon</div>
    <div class="cview__header">Tue</div>
    <div class="cview__header">Wed</div>
    <div class="cview__header">Thu</div>
    <div class="cview__header">Fri</div>
    <div class="cview__header">Sat</div>
    <div class="calendar--view" id="dates">
    </div>
  </div>
  <div class="footer">
    <span><span id="footer-date" class="footer__link"></span></span>    
  </div>
</div>
  
    <script src="js/index.js"></script>

</body>
</html>
