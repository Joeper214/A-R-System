<div id='adminleft'>
<?php 
   $fname = NULL;
   $mname = NULL;
   $lname = NULL;
   $position = NULL;
   $employeeID = NULL;
   $access = new GetModel();
   if(isset($_GET['personID'])){
      $personInfo = $access -> getPersonInfo($_GET['personID']);
      foreach($personInfo as $Person){
	$fname = $Person['fname'];
	$mname = $Person['mname'];
	$lname = $Person['lname'];
	$employeeID = $Person['employeeID'];
	$position = $Person['position'];
	  }
   }
?>
	<header id='accounttitle'>
		<p>Create Account</p>
	</header>
	<ul style='margin: -5px 0px 15px;'>
     <li><strong>Name : </strong> <?php echo $lname.", ".$fname." ".$mname;?></li>
	</ul>
	<form method='POST'>
		<div id='clear'></div>
		<table>
			<tr>
				<td>Username</td>
			</tr>
			<tr>
     <?php 
     if($position == "1"){
       echo "<input type='hidden' name='accountType' value='1'>";
     }else if($position == "2"){
              echo "<input type='hidden' name='accountType' value='2'>";
     }else if($position == "3"){
              echo "<input type='hidden' name='accountType' value='3'>";
     }else if($position == "4"){
       echo "<input type='hidden' name='accountType' value='4'>";
     } ?>
<input type="hidden" name="employeeID" value="<?php echo $employeeID; ?>" >
				<td><input class='input' type='text' name='username' placeholder='Username' onfocus="if (this.placeholder == &#39;Username&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Username&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Password</td>
			</tr>
			<tr>
				<td><input class='input' type='password' name='password' placeholder='Enter Password' onfocus="if (this.placeholder == &#39;Enter Password&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Enter Password&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Confirmation</td>
			</tr>
			<tr>
				<td><input class='input' type='password' name='password2' placeholder='Re-Enter Password' onfocus="if (this.placeholder == &#39;Re-Enter Password&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Re-Enter Password&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td colspan='2'>
					<input type='submit' class='inputbutton' name='cancel' value='CANCEL' formnovalidate/>
					<input type='submit' class='inputbutton' name='save' value='SAVE' />
				</td>
			</tr>
		</table>
	</form>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all employee</p>
		<ul id='search'>
			<li><input type='text' name='search' placeholder="Search Employee" onfocus="if (this.placeholder == &#39;Search Employee&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Search Employee&#39;;}"/></li>
			<li><a href='#' name='search'/></a></li>
		</ul>
		<ul id='addemployee'>
			<li><a href='admin.php?option=manageemployee'/>&nbsp; ADD EMPLOYEE</a></li>
		</ul>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle employeetabletitle' id='tabletitle'>Employee Name</th>
			<th class='listtitle'>Account</th>
			<th class='listtitle'>Account-Status</th>
			<th class='listtitle'>Edit</th>
			<th class='listtitle'>View</th>
<!--			<th class='listtitle'>Employment</th>-->
		</tr>
		
										<?php include("listEmployee.php"); ?>


	</table>
	
</div>
<div id='clear'></div>
<?php
	if (isset($_POST['save'])){
	  $accType = $_POST['accountType'];
	  $empID = $_POST['employeeID'];
	  $usr = $_POST['username'];
	  $pw = $_POST['password'];
	  echo $query = mysql_query("insert into account(employeeID,accountType,
                        accountStatus,username,password)
             VALUES('".$empID."','".$accType."',1,'".$usr."','".$pw."');");
	  if($query){
		echo "<script>accountCreated()</script>";
	  }else{
	    	echo "<script>alert('Creation Failed!')</script>";
	  }
	}else if (isset($_POST['cancel'])) {
		echo "<script>manageEmployee()</script>";
	}
?>