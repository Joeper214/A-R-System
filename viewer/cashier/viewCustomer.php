<?php
if(isset($_GET['id'])){
  $_SESSION['customerID'] = $_GET['id'];
}

$get = new GetModel();
$personInfo = $get->getCustomerInfo($_SESSION['customerID']);
foreach($personInfo as $person){
  
?>

<div id='adminleft'>
	<header id='accounttitle'>
		<p>Customer Information</p>
	</header>
	<table>
		<tr>
			<td>First name</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='f_name' value="<?php echo $person['fname'];?>" autofocus/></td>
		</tr>
		<tr>
			<td>Middle name</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='m_name' value="<?php echo $person['mname'];?>" autofocus/></td>
		</tr>
		<tr>
			<td>Last name</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='l_name' value="<?php echo $person['lname'];?>" autofocus/></td>
		</tr>
		<tr>
			<td>Address</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='address' value="<?php echo $person['address'];?>" autofocus/></td>
		</tr>
		<tr>
			<td>Contact no.</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='number' value="<?php echo $person['contactNumber'];?>" autofocus/></td>
		</tr>
	</table>
    <?php } ?>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all customers</p>
           <form method='POST'>
		<ul id='search'>
			<li><input type='text' class='searchinput' name='searchKey' placeholder='Search Customer'/ required="true"></li>
			<li><button  style="height: 30px;  width: 40px;" type='submit' name='search' autofocus/><a></a></button></li>
		</ul>
		</form>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle customertabletitle' id='tabletitle'>Customer Name</th>
			<th class='listtitle'>Edit</th>
			<th class='listtitle'>View</th>
			<th class='listtitle'>Shop</th>
		</tr>
		<tr>	
  <?php include "listCustomer.php";?>
	</table>
	
</div>
<div id='clear'></div>