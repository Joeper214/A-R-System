<div id='adminleft'>
	<header id='accounttitle'>
		<p>Transaction Reports</p>
	</header>
	<table>

		<form method='POST'>
			<tr>
				<td>Month of: </td>
			</tr>
			<tr>
				<td>
					<select name='month' class='inputselect' style='width: 100px;'>
						<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
					</select>
			</tr>
			<tr>
				<td colspan='2'><input type='submit' class='fullinputbutton' name='viewreports' value='VIEW REPORTS' /></td>
			</tr>
		</form>
	</table>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>Technical transactions</p>
   </br>   </br>
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
				<select name='sortkey' class='inputselectproductfilter' style="height: 35px; ">
   <option value="1">Name</option>
   <option value="3">Price</option>
				</select>
			</li>
    <li><button type="submit" name="sort" style="height: 35px;  width: 40px;"><a></a></button></form>
</li>

		</ul>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle' id='tabletitle'>Date</th>
			<th class='listtitle' id='tabletitle'>Customer Name</th>
			<th class='listtitle' id='tabletitle'>Attendant</th>
			<th class='listtitle'>Payment</th>
			<th class='listtitle'>View</th>
		</tr>
   <?php include "listTransactions.php" ?>
	</table>
	
	<form method='POST'>
		<input style='width: 150px; border: none; float: right; margin: 5px 1px 5px 0px; border: 1px solid #fff; box-shadow: 0px 0px 1px #000;' type='submit' class='inputbutton' name='printtechnicalreport' value='PRINT REPORT' />
	</form>
	
</div>
<div id='clear'></div>
<?php
	if(isset($_POST['printtechnicalreport'])) {
		echo "<script>printTechnicalReport()</script>";
	}
?>