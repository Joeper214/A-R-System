<?php include ("personInfo.php"); ?>


<script>
$(function(){
    $("#da").datepicker();
    $("#dd").datepicker();
  });
</script>


<header id='accounttitle'>
	<p>Edit User Information</p>
</header>
<ul id='accountlink'>
	<li class='admininfo' style='color: #fff;'><strong>Edit User Information for : </strong> <?php echo strtoupper($lname).', '.$fname.' '.substr($mname,0,1).'.'; ?> </li>
</ul>
</br>	
<div id="img">
	<img src="images/photos/<?php echo $photo; ?>">
</div>
<table id='userinfotable'>


		<tr>
			<form method='POST'>
			<tr>
				<td>First name</td>
			</tr>
			<tr>
              <input type="hidden" name="pID" value="<?php echo $_GET['personID'] ?>">
              <input type="hidden" name="position" value="<?php echo $position ?>">
  <td><input onkeydown="return isAlpha(event.keyCode)" class='input' type='text' name='fname' value='<?php echo $fname; ?>' autofocus required/></td>
			</tr>
			<tr>
				<td>Middle name</td>
			</tr>
			<tr>
				<td><input onkeydown="return isAlpha(event.keyCode)" class='input' type='text' name='mname' value='<?php echo $mname; ?>' autofocus required/></td>
			</tr>
			<tr>
				<td>Last name</td>
			</tr>
			<tr>
				<td><input onkeydown="return isAlpha(event.keyCode)" class='input' type='text' name='lname' value="<?php echo $lname; ?>" autofocus required/></td>
			</tr>
			<tr>
				<td>Gender</td>
			</tr>
			<tr>
				<td>
                     
					<select name='gender' class='inputselect'>
  <?php if($gender == "Male"){
  echo "<option selected='true' value='$gender'>".$gender."</option>";
  echo "<option value='Female' >Female</option>";
}else{
 echo "<option selected='true' value='$gender'>".$gender."</option>";
  echo "<option value='Male' >Male</option>";
}
?>
 		       			</select>
				</td>
			</tr>
			<tr>
				<td>Birth date</td>
			</tr>
			<tr>
				<td>
<input class='input' id="da" value="<?php echo $bday->format('m/d/Y')?>" type="text" name="da" placeholder='mm/dd/YYYY' autofocus required />

				</td>
			</tr>
			<tr>
				<td>Birth place</td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='birthPlace' value="<?php echo $bPlace?>" autofocus required/></td>
			</tr>
			<tr>
	
			<td>Religion</td>
+
			</tr>
			<tr>
				<td><input onkeydown="return isAlpha(event.keyCode)" class='input' type='text' name='religion' value='<?php echo $religion; ?>' autofocus required/></td>
			</tr>
			<tr>
				<td>Address   <?php echo $position; ?></td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='address' value='<?php echo $address; ?>' autofocus required/></td>
			</tr>
			<tr>
				<td>Contact no.</td>
			</tr>
			<tr>
				<td><input onkeydown="return allNumbers(event)" maxlength="11" class='input' type='text' name='number' value='<?php echo $contact; ?>' autofocus required/></td>
			</tr>
			<tr>
				<td colspan='2'>
					<input type='submit' class='inputbutton' name='cancel' value='CANCEL' formnovalidate/>
					<input type='submit' class='inputbutton' name='save' value='SAVE' />
				</td>
			</tr>
		</form>
</table>

<?php
     $edit = new UpdateModel();
	if(isset($_POST['save'])) {
	  if(isset($_POST['pID']) && $_POST >0 ){
	    $per = $edit->editPerson($_POST['fname'],
                              $_POST['mname'],
                              $_POST['lname'],
                              $_POST['address'],
                              $_POST['number'],$_POST['pID']);

	    $emp = $edit->editEmployee($_POST['gender'],
                              $_POST['da'],
                              $_POST['birthPlace'],
                              $_POST['religion'],
                              $_POST['position'],$_POST['pID']);
	    if($per && $emp == true){


	      // header("location: admin.php");
		  echo "<script>adminAccountUpdated()</script>";
        
	    }
	  }
 	}else if(isset($_POST['cancel'])){
		echo "<script>goToAdmin()</script>";
	}
?>