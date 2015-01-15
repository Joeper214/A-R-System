<div id='adminleft'>
	<header id='accounttitle'>
		<p>Transaction Reports</p>
	</header>
	<table>
		<form method='POST'>
			<tr>
				<td>Transaction type</td>
			</tr>
			<tr>
				<td>
					<select name='transact_type' class='inputselect'>
						<option>All</option>
						<option value="1">Sales</option>
						<option value="2">Technical</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan='2'><input type='submit' class='fullinputbutton' name='viewtransactions' value='VIEW TRANSACTIONS' /></td>
			</tr>
		</form> 
	</table>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all transactions</p> </br></br>
   <ul id='search'>
		<form method='POST'>
   <li><input type='text' class='searchinput' name='searchKey' placeholder='Search Customer'/></li>
   <li><button  type='submit' name='search' style="height: 30px;  width: 40px;" autofocus/><a></a></button></li>
   </form>
   </ul>

		<ul id='productfilter'>
			<li>Sort by &nbsp; </li>

			<li>
                  <form method="POST">
				<select name='sortkey' class='inputselectproductfilter' style="height: 35px;">
					<option value="1">Name</option>
					<option value="2">Type</option>
					<option value="3">Price</option>
				</select>
			</li>
    <li><button type="submit" name="sort" style="height: 35px;  width: 40px;"><a></a></button></form></li>

		</ul>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle' id='tabletitle'>Date</th>
			<th class='listtitle' id='tabletitle'>Customer Name</th>
			<th class='listtitle'>Transaction</th>
			<th class='listtitle' id='tabletitle'>Attendant</th>
			<th class='listtitle'>Payment</th>
			<th class='listtitle'>View</th>
		</tr>
   <?PHP INCLUDE "listTransactions.php"; ?>
	</table>
	
	<form method='POST'>
		<input style='width: 150px; border: none; float: right; margin: 5px 1px 5px 0px; border: 1px solid #fff; box-shadow: 0px 0px 1px #000;' type='submit' class='inputbutton' name='printsalesreport' value='GENERATE REPORT' />
	</form>
	
</div>
<div id='clear'></div>
<?php
	if(isset($_POST['printsalesreport'])) {
		echo "<script>printSalesReport()</script>";
	}
?>