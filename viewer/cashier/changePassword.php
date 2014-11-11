<?php
	$goTo = new GetModel();
	$adminID = $goTo -> get_account_id($_SESSION['cashierUsername'], $_SESSION['cashierPassword']);
	
if(isset($_GET['accountID'])){
  $results = $goTo -> getAccountInfo($_GET['accountID']);
  
  foreach($results as $row){
    $completeName = $row['lname']." ".$row['fname']." ".$row['mname'];
    $userID = $row['username'];

  }
}

?>

<header id='accounttitle'>
	<p>Change Password</p>
</header>
<ul id='accountlink'>
   <li class='admininfo' style='color: #fff;'><strong>Change Password for : </strong> <?php echo $completeName; ?> </li>
</ul>
</br>
<table id='accountpasswordusername'>
	<form method='POST'>
		<tr>
			<td>Current password &nbsp;</td>
			<td><input class='input' type='password' name='currentPassword' placeholder='Type your Password' autofocus required/></td>
		</tr>
		
		<tr>
			<td>New password &nbsp;</td>
			<td><input class='input' type='password' name='newPassword' placeholder='New Password' autofocus required/></td>
		</tr>
		
		<tr>
			<td>Confirm password &nbsp;</td>
			<td><input class='input' type='password' name='confirmNewPassword' placeholder='Confirm Password'autofocus required/></td>
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
		
		# Verify if typed current password is equals to original password:
			if($_POST['currentPassword'] == $_SESSION['cashierPassword']) {
			
				# Verify if new password is equals to new password2:
				if($_POST['newPassword'] == $_POST['confirmNewPassword']) {
				
					# Verify if new password is equal to original password:
					if($_POST['newPassword'] == $_POST['currentPassword']) {
					
						# Nothing changes:
						echo "<script>adminPasswordChanged()</script>";
					} else {
					
						# New password is not equals to original password:
						$goTo = new VerifyModel();
						$isValid = $goTo -> isPasswordValid($_POST['newPassword']);
						
						# Verify if new password is not being used:
						if($isValid) {
						
							$password = $_POST['newPassword'];
						
							$isUpdated = $query = mysql_query("UPDATE account SET password = '$password' WHERE accountID = '$adminID'");
							
							if($isUpdated) {
							
								$_SESSION['cashierPassword'] = $password;
							
								echo "<script>cashierPasswordChanged()</script>";
							}
						} else {
							# New password is being used (Print error message):
							echo "<script>alert('Password is already in use!');</script>";
							# echo "<div class='alert'><p>Password is already being used!</p></div>";
						}
					}
				} else {
					# Typed new passwords are not equals (Print error message):
					echo "<script>alert('Password do not match!');</script>";
					# echo "<div class='alert'><p>Password do not match!</p></div>";
				}
			} else {
				# typed current password is not equals to original password (Print error message):
				echo "<script>alert('Current password is invalid!');</script>";
				# echo "<div class='alert'><p>Current password is invalid!</p></div>";
			}
	}else if (isset($_POST['cancel'])) {
		echo "<script>goToCashier()</script>";
	}
?>