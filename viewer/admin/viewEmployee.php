<?php 
   $access = new GetModel();
   $personID = NULL;
   $listEmployees = NULL;
$fname = NULL; $mname = NULL; $lname=NULL; $gender = NULL;
   $bday = NULL;
   $position = NULL;
   $bPlace = NULL;
   $contact = NULL;
   $religion = NULL;
$address = NULL;
$employeeStatus = NULL;

if(isset($_GET['personID'])){
  $personID = $_GET['personID'];

  $listEmployees = $access -> getPersonInfo($personID);

  foreach($listEmployees as $employee){
    $fname = $employee['fname'];
    $mname = $employee['mname'];
    $lname = $employee['lname'];
    $gender = $employee['gender'];
    $bday = new DateTime ($employee['birthDate']);
    $bPlace = $employee['birthPlace'];
    $contact = $employee['contactNumber'];
    $religion = $employee['religion'];
    $employeeStatus = $employee['employmentStatus'];
    $position = $employee['position'];
    $address = $employee['address'];
    $photo = $employee['photo'];
  }
}

?>


<div id='adminleft'>
	<header id='accounttitle'>
		<p>Employee Information</p>
	</header>
	<table>

<tr>
   <td>Photo</td>
   
</tr>
<tr>
   <td>	<img id="employeeimg" src="images/photos/<?php echo $photo; ?>" /></td>
   
</tr>



		<tr>
			<td>First name</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='f_name' value='<?php echo $fname; ?>' autofocus required/></td>
		</tr>
		<tr>
			<td>Middle name</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='m_name' value='<?php echo $mname; ?>' autofocus required/></td>
		</tr>
		<tr>
			<td>Last name</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='l_name' value='<?php echo $lname; ?>' autofocus required/></td>
		</tr>
		<tr>
			<td>Gender</td>
		</tr>
		<tr>
			<td>
				<input class='input' disabled='true' type='text' name='gender' value='<?php echo $gender; ?>' autofocus required/>
			</td>
		</tr>
		<tr>
			<td>Birth date</td>
		</tr>
		<tr>
			<td>
				<input class='input' disabled='true' type='text' name='birthDate' value="<?php echo $bday->format('F j, Y, l'); ?>" autofocus required/>
			</td>
		</tr>
		<tr>
			<td>Birth place</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='birthPlace' value='<?php echo $bPlace; ?>' autofocus required/></td>
		</tr>
		<tr>
			<td>Religion</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='religion' value='<?php echo $religion; ?>' autofocus required/></td>
		</tr>
		<tr>
			<td>Position</td>
		</tr>
		<tr>
			<td>
				<input class='input' disabled='true' type='text' name='position' value='<?php if($position ==1){
                     echo "Manager";  
                     }else if($position==2){
                     echo "Cashier";  
                     }else if($position==3){
                     echo "Technician";  
                     }else{
                     echo "Utility";  
                     }
 ?>' autofocus required/>
			</td>
		</tr>
		<tr>
			<td>Address</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='address' value='<?php echo $address; ?>' autofocus required/></td>
		</tr>
		<tr>
			<td>Contact no.</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='number' value='<?php echo $contact; ?>' autofocus required/></td>
		</tr>
		<tr>
			<td>Status</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='f_name' value="<?php 
                    if($employeeStatus == 1){
                      echo 'Active';
                     }else{
                      echo 'Inactive';
                    }
                    
                  ?>" autofocus/></td>
		</tr>
	</table>
</div>

<div id='adminright'>
<header id='accounttitle'>


		<p>List of all employee</p>

</br>   </br>
   	<ul id='search'>
   <form method='POST'>
			<li><input type='text' class='searchinput' name='searchKey' placeholder='Search Employee'/ required="true"></li>
			<li><button  type='submit' style="height: 30px;  width: 40px;"  name='search' autofocus/><a></a></button></li>
		</form>
   </ul>

		<ul id='productfilter'>
			<li>Sort by &nbsp; </li>

			<li>
                  <form method="POST">
				<select name='sortkey' class='inputselectproductfilter' style="height: 35px;  ">
					<option value="lname">Lastname</option>
					<option value="fname">Firstname</option>
					<option value="mname">Middlename</option>
				</select>
			</li>
    <li><button type="submit" name="sort" style="height: 35px;  width: 40px;" ><a></a></button></form></li>

		</ul>
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