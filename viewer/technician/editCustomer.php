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
		<p>Edit Customer</p>
	</header>
	<table>

		<form method="POST" action="../mysystem/controller/exec_controller.php">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name="target" value="customer">
    <input type="hidden" name="personID" value="<?php echo $_GET['id']?>">
    <input type="hidden" name="user" value="cashier">
			<tr>
				<td>First name</td>
			</tr>
			<tr>
				<td><input onkeydown="return isAlpha(event.keyCode)" class='input' type='text' name='fname' value="<?php echo $person['fname']; ?>" autofocus required/></td>
			</tr>
			<tr>
				<td>Middle name</td>
			</tr>
			<tr>
				<td><input onkeydown="return isAlpha(event.keyCode)" class='input' type='text' name='mname' value="<?php echo $person['mname']; ?>" autofocus required/></td>
			</tr>
			<tr>
				<td>Last name</td>
			</tr>
			<tr>
				<td><input onkeydown="return isAlpha(event.keyCode)" class='input' type='text' name='lname' value="<?php echo $person['lname']; ?>" autofocus required/></td>
			</tr>
			<tr>
				<td>Address</td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='address' value="<?php echo $person['address']; ?>" autofocus required/></td>
			</tr>
			<tr>
				<td>Contact no.</td>
			</tr>
			<tr>
				<td><input onkeydown="return allNumbers(event)" maxlength="11" class='input' type='text' name='number' value="<?php echo $person['contactNumber']; ?>"' autofocus required/></td>
			</tr>
			<tr>
				<td colspan='2'>
					<input type='submit' class='inputbutton' name='cancel' value='CANCEL' formnovalidate />
					<input type='submit' class='inputbutton' name='save' value='SAVE' />
				</td>
			</tr>
		</form>
	</table>
    <?php } ?>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all customers</p>
		<ul id='search'>
			<li><input type='text' name='search' placeholder="Search Customer" onfocus="if (this.placeholder == &#39;Search Customer&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Search Customer&#39;;}"/></li>
			<li><a href='#' name='search'/></a></li>
		</ul>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle customertabletitle' id='tabletitle'>Customer Name</th>
			<th class='listtitle'>Edit</th>
			<th class='listtitle'>View</th>
			<th class='listtitle'>Repair</th>
		</tr>
<?php $query = mysql_query("select * from person where personType=1");
   while($row = mysql_fetch_assoc($query)){ ?>
		<tr>	
			<td class='list' id='customername'>
		<?php echo $row['lname']." ,".$row['fname']." ".$row['mname'];?></td>
			<td class='list'><a class='edit' href='technician.php?option=editcustomer&id=<?php echo $row['personID'];?>'><em>Edit</em></a></td>
			<td class='list'><a class='view' href='technician.php?option=viewcustomer&id=<?php echo $row['personID'];?>'><em>View</em></a></td>
			<td class='list'><a class='repair' href='technician.php?option=product&id=<?php echo $row['personID'];?>'><em>Sales</em></a></td>
		</tr>
   <?php }?>
	</table>
	
</div>
<div id='clear'></div>

<?php
	if(isset($_POST['save'])) {
		echo "<script>customerUpdated()</script>";
	} else if(isset($_POST['cancel'])) {
		echo "<script>cashierManageCustomer()</script>";
	}
?>