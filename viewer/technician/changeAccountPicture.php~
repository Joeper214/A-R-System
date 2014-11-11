<?php
	$goTo = new GetModel();
	
if(isset($_GET['accountID'])){
  $results = $goTo -> getAccountInfo($_GET['accountID']);
  //	extract($results);
  //	print_r($results);
	foreach($results as $row){
	  $employeeID = $row['employeeID'];
	$fname = $row['fname'];
	$mname = $row['mname'];
	$lname = $row['lname'];
	$date = new DateTime($row['dateRegistered']);
	$gender = $row['gender'];
	$address = $row['address'];
	$contactNumber = $row['contactNumber'];
	$photo = $row['photo'];
	}

  
}
	
	$bool = TRUE;
?>
<header id='accounttitle'>
	<p>Change Account Picture</p>
</header>
<ul id='accountlink'>
	<li class='admininfo' style='color: #fff;'><strong>Change Account Picture for : </strong> <?php echo strtoupper($lname).', '.$fname.' '.substr($mname,0,1).'.'; ?> </li>
</ul>
</br>	
<form method='post' enctype="multipart/form-data">
	<div id="img">
		<img id="employeeimg" src="images/photos/<?php echo $photo; ?>">
	<input type="hidden" name="action" value="add">
	  <input type="hidden" name="target" value="account">
	  <input type="hidden" name="MAX_FILE_SIZE" value="41943040"/>
	  <input type="file" name="f_attach" autofocus required/> 
	</div>
	<table id='userinfotable'>
	  <tr>
	  <td>First name</td>
	  <td><input class='input' disabled='true' type='text' name='fname' value='<?php echo $fname; ?>' autofocus required/></td>
	  </tr>
	  <tr>
			<td>Middle name</td>
	  <td><input class='input' disabled='true' type='text' name='mmname' value='<?php echo $mname; ?>' autofocus required/></td>
	  </tr>
	  <tr>
	  <td>Last name</td>
	  <td><input class='input' disabled='true' type='text' name='lname' value='<?php echo $lname; ?>' autofocus required/></td>
	  </tr>
	  <tr>
	  <td>Gender</td>
			<td>
	  <input class='input' disabled='true' name="gender" type='text' value='<?php echo $gender?>' />
	  </td>
	  </tr>
	  <tr>
	  <td>Birth date</td>
			<td>
	  <input class="input" disabled="true" type="text" value="<?php echo $date->format('F j, Y'); ?>"/>
			</td>
		</tr>
		<tr>
			<td>Birth place</td>
			<td><input class='input' disabled='true' type='text' name='birthPlace' value='Marawi City'/></td>
		</tr>
		<tr>
			<td>Religion</td>
			<td><input class='input' disabled='true' type='text' name='religion' value='Islam'/></td>
		</tr>
		<tr>
			<td>Position</td>
			<td><input class='input' disabled='true' type='text' name='position' value='Manager' autofocus/></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input class='input' disabled='true' type='text' name='address' value='<?php echo $address; ?>' autofocus required/></td>
		</tr>
		<tr>
			<td>Contact no.</td>
			<td><input class='input' disabled='true' type='text' name='number' value='<?php echo $contactNumber; ?>' autofocus required/></td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type='submit' class='inputbutton' name='cancel' value='CANCEL' formnovalidate/>
				<input type='submit' class='inputbutton' name='save' value='SAVE' />
			</td>
		</tr>
	</table>
</form>
<?php

if(isset($_POST['save'])) {
		$goTo = new UpdateModel();
		$isInserted = $goTo -> updateEmployeePhoto($employeeID);
			
			if($isInserted) {
				echo "<script>cashierAccountPictureUpdated()</script>";
			}
		
		else {
			echo "<script>alert('Error!');</script>";
		}
	
		
 	}else if(isset($_POST['cancel'])){
		echo "<script>goToCashier()</script>";
	}
?>