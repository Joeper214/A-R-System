<?php
	$goTo = new GetModel();

$adminID = $goTo -> getAdminIDByUsernameAndPassword($_SESSION['adminUsername'], $_SESSION['adminPassword']);


if(isset($_GET['accountID'])){
  $results = $goTo -> getAccountInfo($_GET['accountID']);
  
  foreach($results as $row){
    $completeName = $row['lname']." ".$row['fname']." ".$row['mname'];
    $userID = $row['username'];

  }
}
?>
<header id='accounttitle'>
	<p>Change Username</p>
</header>
<ul id='accountlink'>
  <li class='admininfo' style='color: #fff;'><strong>Change username for : </strong><?php echo $completeName; ?></li>
</ul>
</br>
<table id='accountpasswordusername'>
	<form method='POST'>
		<tr>
			<td>Username &nbsp;</td>
			<td><input class='input' disabled='true' type='text' value='<?php echo $_SESSION['adminUsername']?>'/></td>
		</tr>
		
		<tr>
			<td>New Username &nbsp;</td>
			<td><input name='newUsername' class='input' type='text' placeholder='New Username' autofocus required/></td>
		</tr>
		
		<tr>
			<td></td>
			<td>
				<input type='submit' name='cancel' value='CANCEL' class='inputbutton' formnovalidate />
				<input type='submit' name='save' value='SAVE' class='inputbutton' />
			</td>
		</tr>
	</form>
</table>
<?php
	if (isset($_POST['save'])){
	
		if($_SESSION['adminUsername'] == $_POST['newUsername']) {
		
			echo "<script>alert('Username is already in use!');</script>";
		} else {
		
			$goTo = new VerifyModel();
			$isValid = $goTo -> isUsernameValid($_POST['newUsername']);
			
			if($isValid) {
			
				$username = $_POST['newUsername'];
				
				$isUpdated = mysql_query("UPDATE account SET username = '$username' WHERE accountID = '$adminID'");
				
				if($isUpdated) {
				
					$_SESSION['adminUsername'] = $username;
				
					echo "<script>adminUsernameUpdated()</script>";
				}
			} else {
				echo "<script>alert('Username is already in use!');</script>";
			}
		}
	}else if (isset($_POST['cancel'])) {
		echo "<script>goToAdmin()</script>";
	}
?>
