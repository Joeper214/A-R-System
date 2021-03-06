<?php
	$goTo = new GetModel();
	
	$adminID = $goTo -> getAdminIDByUsernameAndPassword($_SESSION['adminUsername'], $_SESSION['adminPassword']);
	
        $employeeID = $goTo -> getAccountAttribute(2, $adminID);
	
        $personID = $goTo -> getPersonIDByEmployeeID($employeeID);
	   
        //$personID = $goTo -> getPersonAttributes(2, $employeeID);
	
	$fname = $goTo -> getPersonAttributes(1, $personID);
	$mname = $goTo -> getPersonAttributes(2, $personID);
	$lname = $goTo -> getPersonAttributes(3, $personID);
	
	$gender = $goTo -> getEmployeeAttributes(4, $employeeID);
	$birthDate = $goTo -> getEmployeeAttributes(5, $employeeID);
	$birthPlace = $goTo -> getEmployeeAttributes(6, $employeeID);
	$religion = $goTo -> getEmployeeAttributes(7, $employeeID);
	$position = $goTo -> getEmployeeAttributes(8, $employeeID);
	
	$address = $goTo -> getPersonAttributes(9, $personID);
	$contactNumber = $goTo -> getPersonAttributes(10, $personID);
        $photo = $goTo -> getEmployeeAttributes(10, $employeeID);

    $bday = new DateTime($birthDate);

?>

<header id='accounttitle'>
	<p>Account information</p>
</header>
<ul id='accountlink'>
	<li><a href='admin.php?option=edituserinformation&personID=<?php echo $personID; ?>'>Edit Information</a></li>
	<li><a href='admin.php?option=changeUsername&accountID=<?php echo $adminID; ?>'>Change Username</a></li>
	<li><a href='admin.php?option=changepassword&accountID=<?php echo $adminID; ?>'>Change Password</a></li>
	<li><a href='admin.php?option=changeaccountpicture&accountID=<?php echo $adminID; ?>'>Change Account Picture</a></li>
</ul>
</br>
<div id="img">
	<img id="employeeimg" src="images/photos/<?php echo $photo ?>">
</div>
<table id='emptable'>
	<tr>
		<td>Username</td>
		<td>:<input class='inputv' type='text' name='username' disabled='true' value='<?php echo $_SESSION['adminUsername']; ?>'/></td>
	</tr>
	<tr>
		<td>First name</td>
		<td>:<input class='inputv' type='text' name='firstName' disabled='true' value='<?php echo $fname; ?>'/></td>
	</tr>
	<tr>
		<td>Middle name</td>
		<td>:<input class='inputv' type='text' name='middleName' disabled='true' value='<?php echo $mname; ?>'/></td>
	</tr>
	<tr>
		<td>Last name</td>
		<td>:<input class='inputv' type='text' name='lastName' disabled='true' value='<?php echo $lname; ?>'/></td>
	</tr>
	<tr>
		<td>Gender</td>
		<td>:<input class='inputv' type='text' name='gender' disabled='true' value='<?php echo $gender; ?>'/></td>
	</tr>
	<tr>
		<td>Birth date</td>
      <td>:<input class='inputv' type='text' name='birthDate' disabled='true' value='<?php echo $bday->format('F j, Y'); ?>'/></td>
	</tr>
	<tr>
		<td>Birth place</td>
		<td>:<input class='inputv' type='text' name='birthPlace' disabled='true' value='<?php echo $birthPlace; ?>'/></td>
	</tr>
	<tr>
		<td>Religion</td>
		<td>:<input class='inputv' type='text' name='religion' disabled='true' value='<?php echo $religion; ?>'/></td>
	</tr>
	<tr>
		<td>Position</td>
		<td>:<input class='inputv' type='text' name='position' disabled='true' value='<?php if($position == 1){echo 'Manager';
                                                                                                    }else if($position ==2){echo 'Cashier';
                                                                                                    }else if($position ==3){echo 'Technician';
                                                                                                    }else{}
                                                                                                     ?>'/></td>
	</tr>
	<tr>
		<td>Address</td>
		<td>:<input class='inputv' type='text' name='address' disabled='true' value='<?php echo $address; ?>'/></td>
	</tr>
	<tr>
		<td>Contact no.</td>
		<td>:<input class='inputv' type='text' name='conactcontactNumber' disabled='true' value='<?php echo $contactNumber; ?>'/></td>
	</tr>
</table>
<?php	
	mysql_close();
?>