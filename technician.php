<?php
	session_start();



	require "model/model.php";
	
	$goTo = new ConnectModel();
	$goTo -> connectToDatabase();
?>
<html>
<head>
	<title>Technician</title>

	<link rel="stylesheet" type="text/css" href="style/jquery-ui.css"/>
	<link rel="stylesheet" type="text/css" href="style/style.css"/>

	<link rel="stylesheet" type="text/css" href="style/popUpStyle.css"> 
	  <script type="text/javascript" src="script/jQuery/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="script/jQuery/jquery-ui.js"></script> 
	<script type="text/javascript" src="script/javascript.js"></script>
	<script type="text/javascript" src="script/bootstrap.js"></script>


</head>
<body>
<div id="wrapper">
	<div id="Header">
	  <div id="banner"></div>
	  <div id='toprightbutton'>
		<ul>
			<li><a href="technician.php?option=home">MY ACCOUNT</a></li>
			<li><a href="technician.php?option=logout">LOG OUT</a></li>
        </ul>
	  </div>
	</div>
	<div id='headerline'></div>
	<div id="container">
      </br>
	  </br>
	  
	    <ul id='managelink'>
			<li><a href="technician.php?option=managecustomer">MANAGE CUSTOMERS</a></li>
			<li><a href="technician.php?option=repair">SERVICES</a></li>
            <li><a href="technician.php?option=managenote">MANAGE NOTES</a></li>
            <li><a href="technician.php?option=reports">GENERATE TRANSACTION REPORT</a></li>
        </ul>
		
		<div id="placeholder">
			<?php
				if(isset($_GET['option'])) {
					require "controller/controller.php";
					
					$goTo = new Controller();
					$goTo -> technicianSelectOption($_GET['option']);
				} else {
					require "viewer/technician/home.php";
				}
			?>
		</div>
  
	</div>
	
	<div id="footer">
	  <p>copyright 2014 &reg; all right reserved</p>
	</div>
<div>
</body>
</html>