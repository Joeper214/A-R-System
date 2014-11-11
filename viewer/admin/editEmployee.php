<?php include ("personInfo.php"); ?>
<script>
$(function(){
    $("#da").datepicker();
    $("#dd").datepicker();
  });
</script>


<div id='adminleft'>
	<header id='accounttitle'>
		<p>Edit Employee</p>
	</header>
	<table>
		<form method="POST" action="../mysystem/controller/exec_controller.php" enctype="multipart/form-data" onsubmit="return true">
   <input type="hidden" name="action" value="edit">
   <input type="hidden" name="target" value="user">
<tr>
   <td>Photo</td>
   
</tr>
<tr>
   <td>	<img id="employeeimg" src="images/photos/<?php echo $photo; ?>" /></td>
   
</tr>   

<tr>
   <td>New Photo</td>
   
</tr>
<tr>
   <td>	<input type="hidden" name="MAX_FILE_SIZE" value="41943040" />
        <input type="file" name="f_attach" autofocus required/>
  </td>
   
</tr>




			<tr>
				<td>First name</td>
			</tr>
			<tr>
              <input type="hidden" name="pID" value="<?php echo $_GET['personID'] ?>">
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
			</tr>
			<tr>
				<td><input onkeydown="return isAlpha(event.keyCode)" class='input' type='text' name='religion' value='<?php echo $religion; ?>' autofocus required/></td>
			</tr>
			<tr>
				<td>Position</td>
			</tr>
			<tr>
				<td>
					<select name='position' class='inputselect'>

  <option value="1" <?php if($position == "1") 
        echo "selected='true'"; ?> >Manager</option>
	<option value="2" <?php if($position == "2") 
        echo "selected='true'"; ?>>Cashier</option>
	<option value="3" <?php if($position == "3") 
        echo "selected='true'"; ?>>Technician</option>
	<option value="4" <?php if($position == "4") 
        echo "selected='true'"; ?>>Utility</option>
					</select>
				</td>
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
				<td><input onkeydown="return allNumbers(event);" class='input' type='text' name='number' value='<?php echo $contact; ?>' autofocus required/></td>
			</tr>
			<tr>
				<td colspan='2'>
					<input type='submit' class='inputbutton' name='cancel' value='CANCEL' formnovalidate/>
					<input type='submit' class='inputbutton' name='save' value='SAVE' />
				</td>
			</tr>
		</form>
	</table>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all employee</p>
   <form method='POST'>
		<ul id='search'>
                  <li> Search by:
                     <select name="searchType" required="true">
                        <option value="1">Firstname</option>
                        <option value="2">Middlename</option>
                        <option value="3">Lastname</option>
                     </select>
                  <li>
			<li><input type='text' class='searchinput' name='searchKey' placeholder='Search Employee'/ required="true"></li>
			<li><button  type='submit' name='search' autofocus/><a></a></button></li>
		</ul>
		</form>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle employeetabletitle' id='tabletitle'>Employee Name</th>
			<th class='listtitle'>Account</th>
			<th class='listtitle'>Account-Status</th>
			<th class='listtitle'>Edit</th>
			<th class='listtitle'>View</th>
			<th class='listtitle'>Employment-Status</th>

		</tr>
  <?php include("listEmployee.php"); ?>
	</table>
	
</div>
<div id='clear'></div>

<?php
     $edit = new UpdateModel();
	if(isset($_POST['save'])) {
	  if(isset ($_POST['pID']) && $_POST > 0){
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
		echo "<script>employeeUpdated()</script>";
	    }else{
	      echo "<script>alert('Edit Failed')</script>";
	    }
	  } 
	  

	} else if(isset($_POST['cancel'])) {
		echo "<script>manageEmployee()</script>";
	}
?>