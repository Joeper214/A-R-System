<?php
        ob_start();
	session_start();




	require "model/model.php";
	
	$goTo = new ConnectModel();
	$goTo -> connectToDatabase();
?>
<html>
<head>
<title>Cashier</title>
<link rel="stylesheet" type="text/css" href="style/jquery-ui.css" media="screen" />
	  <link rel="stylesheet" type="text/css" href="style/jquery-ui.css" media="print" />
	  <link rel="stylesheet" type="text/css" href="style/style.css" media="screen"/>
	  <link rel="stylesheet" type="text/css" href="style/style.css" media="print"/>
	  
	  <link rel="stylesheet" type="text/css" href="style/popUpStyle.css" media="screen" /> 
	  <link rel="stylesheet" type="text/css" href="style/popUpStyle.css" media="print" />  

	  <script type="text/javascript" src="script/jQuery/jquery-1.9.1.js"></script>
	  <script type="text/javascript" src="script/jQuery/jquery-ui.js"></script> 
	  <script type="text/javascript" src="script/javascript.js"></script>
	  <script type="text/javascript" src="script/moveable.js"></script>
	  <script type="text/javascript" src="script/js/jquery.PrintArea.js"></script> 

	<link rel="shortcut icon" href="images/icon.ico">

</head>
<body onload="javascript:popUpHide('popUpContainer','popUpBackground');">
<div id="wrapper">
	<div id="Header">
	  <div id="banner"></div>
	  <div id='toprightbutton'>
		<ul>
			<li><a href="cashier.php?option=home">MY ACCOUNT</a></li>
			<li><a href="cashier.php?option=logout">LOG OUT</a></li>
        </ul>
	  </div>
	</div>
	<div id='headerline'></div>
	<div id="container">
      </br>
	  </br>
	  
	    <ul id='managelink'>
			<li><a href="cashier.php?option=managecustomer">MANAGE CUSTOMERS</a></li>
			<li><a href="cashier.php?option=product">PRODUCTS</a></li>
			<li><a href="cashier.php?option=transactions">VIEW TRANSACTIONS</a></li>
            <li><a href="cashier.php?option=warranty">MANAGE WARRANTY</a></li>
            <li><a href="cashier.php?option=reports">GENERATE TRANSACTION REPORT</a></li>
        </ul>
		
		<div id="placeholder">
			<?php
				if(isset($_GET['option'])) {
					require "controller/controller.php";
					
					$goTo = new Controller();
					$goTo -> cashierSelectOption($_GET['option']);
				} else {
					require "viewer/cashier/home.php";
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