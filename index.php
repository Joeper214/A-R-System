<?php
	session_start();
?>

<html>
<head>
<title>Login</title>

<link rel="stylesheet" type="text/css" href="style/style.css"/>
<script type="text/javascript" src="script/javascript.js"></script>
<link rel="shortcut icon" href="images/icon.ico">

</head>

<body>
	<div id="wrapper">
		<div id="Header">
		  <div id="banner"></div>
		</div>
		<div id='headerline'></div>
		<div id="container">
		</br>

			<form method="post">
				<fieldset id="loginfield">
<?php
	  if(isset($_GET['msg'])){
	    echo "<h4 style='color:red'>".$_GET['msg']."</h4>";
	  }
?>
				<header>LOGIN</header>

					<table>
						<tr>
							<td class='userpass'>Username</td>
							<td class='radiusinput'><input class="input" type="text" name="username" placeholder="Username" onfocus="if (this.placeholder == &#39;Username&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Username&#39;;}" autofocus required/></td>
						</tr>
						<tr><tr></tr></tr></tr></tr><tr><tr></tr></tr>
						<tr>
							<td class='userpass'>Password</td>
							<td class='radiusinput'><input class="input" type="password" name="password" placeholder="Password" onfocus="if (this.placeholder == &#39;Password&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Password&#39;;}" autofocus required/></td>
						</tr>
						<tr><tr></tr></tr>
						<tr>
							<td></td>
							<td colspan='2' class='loginbuttons'>
								<input class='gradientbutton' name="login" type="submit" value="LOG IN"/>
								<input class='gradientbutton' name="cancel" type="submit" value="CANCEL"/>
							</td>
						</tr>
					</table>
				</fieldset>
				
				<?php
if(isset($_POST['login'])) {
  
  require "model/model.php";
						
  $goTo = new ConnectModel();
  $goTo -> connectToDatabase();
  
  $login = new UpdateModel();
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $query = mysql_query("SELECT * FROM account WHERE username = '$username' AND password = '$password'");
  
  if(mysql_num_rows($query) != 0) {
    
    
    
    while($i = mysql_fetch_assoc($query)) {
      
      
      
$_SESSION['accountID']=$i['accountID'];									  								    									
# Account is of admin:
  if($i['accountType'] == 1) {
      
      $_SESSION['adminUsername'] = $username;
      $_SESSION['adminPassword'] = $password;

      echo "<script>goToAdmin()</script>";
      
    } else {
      
      # Account type is cashier:
	if($i['accountType'] == 2) {
	  
	  if($i['accountStatus'] == 1) {
	    
	    $_SESSION['cashierUsername'] = $username;
	    $_SESSION['cashierPassword'] = $password;
	    $_SESSION['cashierID'] = $i['accountID'];
	    echo "<script>goToCashier()</script>";
	    
	  } else {
	    echo "<script>accountDisabled()</script>";
	  }
	} else {
	  
	  # Account type is technician:
	    if($i['accountStatus'] == 1) {
	  
	  $_SESSION['technicianUsername'] = $username;
	  $_SESSION['technicianPassword'] = $password;
	  $_SESSION['technicianID'] = $i['accountID'];
	  echo "<script>goToTechnician()</script>";
	  
	} else {
	  echo "<script>accountDisabled()</script>";
	}
	}
	}
	}
	} else {
	  echo "<script>accountDontExist()</script>";
	}
	}else if(isset($_POST['cancel'])) {
	  echo "<script>logout()</script>";
	}
	  ?>
	  </form>
	      </div>
	      <div id="footer">
	      <p>copyright 2014 &reg; all right reserved</p>
					</div>
	<div>
</body>
</html>