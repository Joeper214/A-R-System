<?php
if(isset($_SESSION['customerID'])){
  unset($_SESSION['customerID']);
}

?>

<form method='POST' action='../mysystem/controller/exec_controller.php'>
   <input type="hidden" name="action" value="add">
   <input type="hidden" name="target" value="customer">
	<div id='adminleft'>
   
		<header id='accounttitle'>
			<p>Add new Customer</p>
		</header>
		<table>
			<tr>
				<td>First name</td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='fname' placeholder='First name' onkeydown="return isAlpha(event.keyCode)" onfocus="if (this.placeholder == &#39;First name&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;First name&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Middle name</td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='mname' placeholder='Middle name' onkeydown="return isAlpha(event.keyCode)" onfocus="if (this.placeholder == &#39;Middle name&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Middle name&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Last name</td>
			</tr>
			<tr>
				<td><input class='input' onkeydown="return isAlpha(event.keyCode)" type='text' name='lname' placeholder='Last name' onfocus="if (this.placeholder == &#39;Last name&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Last name&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Address</td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='address' placeholder='Address' onfocus="if (this.placeholder == &#39;Address&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Address&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Contact number</td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='contact' placeholder='Contact number' maxlength="11" onkeydown="return allNumbers(event)" onfocus="if (this.placeholder == &#39;Contact number&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Contact number&#39;;}" autofocus required/></td>
			</tr>
                  </form>
		</table>
<input type='reset' class='inputbutton' name='cancel' value='CANCEL' formnovalidate />
<input type='submit' class='inputbutton' name='save' value='ADD' />
	</div>


<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all customers</p>
           <form method='POST'>
		<ul id='search'>
                  <li> Search by:
                     <select name="searchType" required="true">
                        <option value="1">Firstname</option>
                        <option value="2">Middlename</option>
                        <option value="3">Lastname</option>
                     </select>
                  <li>
			<li><input type='text' class='searchinput' name='searchKey' placeholder='Search Customer'/ required="true"></li>
			<li><button  type='submit' name='search' autofocus/><a></a></button></li>
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
  <?php include "listCustomer.php"; ?>
	</table>
	
</div>
<div id='clear'></div>
<?php
	if(isset($_POST['viewcustomer'])) {
		echo "<script>viewCustomer()</script>";
	}
?>