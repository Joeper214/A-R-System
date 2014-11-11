<?php
	$goTo = new ConnectModel();
	$goTo -> connectToDatabase();
	
	$goTo = new GetModel();
	$accountID = $goTo -> get_account_id($_SESSION['technicianUsername'], $_SESSION['technicianPassword']);
	
$userInfo = $goTo -> getUserInfo_by_id($accountID);


foreach($userInfo as $user){
  $bday = new DateTime($user['birthDate']);
  $_SESSION['completeName'] = $user['fname']." ".$user['mname']." ".$user['lname'];
?>
<header id='accounttitle'>
	<p>Account information</p>
</header>
<ul id='accountlink'>
        <li><a href="technician.php?option=edituserinformation&personID=<?php echo $user['personID'];?>">Edit Information</a></li>
	<li><a href='technician.php?option=changeusername&accountID=<?php echo $accountID; ?>'>Change Username</a></li>
	<li><a href='technician.php?option=changepassword&accountID=<?php echo $accountID; ?>' >Change Password</a></li>
	<li><a href='technician.php?option=changeaccountpicture&accountID=<?php echo $accountID;?>'>Change Account Picture</a></li>
</ul>
</br>
<div id="img">
	<img id="employeeimg" src="images/photos/<?php echo $user['photo']; ?>">
</div>
<table id='emptable'>
	<tr>
		<td>Username</td>
		<td>:<input class='inputv' type='text' name='username' disabled='true' value='<?php echo $user['username']; ?>'/></td>
	</tr>
	<tr>
		<td>First name</td>
		<td>:<input class='inputv' type='text' name='firstName' disabled='true' value='<?php echo $user['fname']; ?>'/></td>
	</tr>
	<tr>
		<td>Middle name</td>
		<td>:<input class='inputv' type='text' name='middleName' disabled='true' value='<?php echo $user['mname']; ?>'/></td>
	</tr>
	<tr>
		<td>Last name</td>
		<td>:<input class='inputv' type='text' name='lastName' disabled='true' value='<?php echo $user['lname']; ?>'/></td>
	</tr>
	<tr>
		<td>Gender</td>
		<td>:<input class='inputv' type='text' name='gender' disabled='true' value='<?php echo $user['gender']; ?>'/></td>
	</tr>
	<tr>
		<td>Birth date</td>
		<td>:<input class='inputv' type='text' name='birthDate' disabled='true' value='June 10, 1994'/></td>
	</tr>
	<tr>
		<td>Birth place</td>
		<td>:<input class='inputv' type='text' name='birthPlace' disabled='true' value='<?php echo $user['birthPlace']; ?>'/></td>
	</tr>
	<tr>
		<td>Religion</td>
		<td>:<input class='inputv' type='text' name='religion' disabled='true' value='Islam'/></td>
	</tr>
	<tr>
		<td>Position</td>
		<td>:<input class='inputv' type='text' name='position' disabled='true' value='<?php if($user['position'] == 1){echo 'Manager';
                                                                                                    }else if($user['position'] ==2){echo 'Cashier';
                                                                                                    }else if($user['position'] ==3){echo 'Technician';
                                                                                                    }else{}
                                                                                                      ?>'/></td>
	</tr>
	<tr>
		<td>Address</td>
		<td>:<input class='inputv' type='text' name='address' disabled='true' value='<?php echo $user['address']; ?>'/></td>
	</tr>
	<tr>
		<td>Contact no.</td>
		<td>:<input class='inputv' type='text' name='conactNumber' disabled='true' value='<?php echo $user['contactNumber']; ?>'/></td>
	</tr>
</table>
<?php	

   }
	mysql_close();
?>