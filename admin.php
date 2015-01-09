<?php
	session_start();




	require "model/model.php";
	
	$goTo = new ConnectModel();
	$goTo -> connectToDatabase();
?>
<html>
<head>
	<title>Administrator</title>

<link rel="stylesheet" type="text/css" href="style/jquery-ui.css" media="screen" />
	  <link rel="stylesheet" type="text/css" href="style/jquery-ui.css" media="print" />
	  <link rel="stylesheet" type="text/css" href="style/style.css" media="screen"/>
	  <link rel="stylesheet" type="text/css" href="style/style.css" media="print"/>
	  
	  <link rel="stylesheet" type="text/css" href="style/popUpStyle.css" media="screen" /> 
	  <link rel="stylesheet" type="text/css" href="style/popUpStyle.css" media="print" />  
	  <script type="text/javascript" src="script/jQuery/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="script/jQuery/jquery-ui.js"></script> 
	<script type="text/javascript" src="script/javascript.js"></script>
	<script type="text/javascript" src="script/bootstrap.js"></script>
       


	<link rel="shortcut icon" href="images/icon.ico">

</head>
<body onload="javascript:popUpHide('popUpContainer','popUpBackground');">
<div id="wrapper">
	<div id="Header">
	  <div id="banner"></div>
	  <div id='toprightbutton'>
		<ul>
			<li><a href="admin.php?option=home">MY ACCOUNT</a></li>
			<li><a href="admin.php?option=logout">LOG OUT</a></li>
        </ul>
	  </div>
	</div>
	<div id='headerline'></div>
	<div id="container">
      </br>
	  </br>
	  
	    <ul id='managelink'>
            <li><a href="admin.php?option=manageemployee">MANAGE EMPLOYEE</a></li>
            <li><a href="admin.php?option=managecategory">MANAGE CATEGORY</a></li>
			<li><a href="admin.php?option=managebrand">MANAGE BRAND</a></li>
            <li><a href="admin.php?option=manageproduct">MANAGE PRODUCT</a></li>
            <li><a href="admin.php?option=manageservice">MANAGE SERVICE</a></li>
            <li><a href="admin.php?option=transactions">VIEW TRANSACTIONS</a></li>
			<li><a href="admin.php?option=reports">GENERATE REPORT</a></li>
        </ul>
		
		<div id="placeholder">
			<?php
				if(isset($_GET['option'])) {
					require "controller/controller.php";
					
					$goTo = new Controller();
					$goTo -> adminSelectOption($_GET['option']);
				} else {
					require "viewer/admin/home.php";
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