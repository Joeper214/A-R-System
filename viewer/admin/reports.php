<div id='adminleft'>
	<header id='accounttitle'>
		<p>Query here...</p>
	</header>
	<table>

		<form method='POST'>
			<tr>
				<td>Use Case</td>
			</tr>
			<tr>
				<td>
					<select name='case' class='inputselect'>
						<option value="1">Product</option>
						<option value="2">Employee Sales</option>
						<option value="3">Service</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan='2'>
					<input type='submit' class='fullinputbutton' name='viewbrandreport' value='VIEW' />
				</td>
			</tr>
		</form>
	</table>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>Generate Report</p>
	</header>
<?php
 if(isset($_POST['case'])){
   if($_POST['case'] == 1){
     include "reportProduct.php";
   }else if($_POST['case'] == 2){
     include "reportEmployee.php";
   }else if($_POST['case'] == 3){
     include "reportService.php";
   }
 }else{
   echo "<p>please select a query and click view.</p>";
 }
?>
	
	<form method='POST'>
		<input style='width: 150px; border: none; float: right; margin: 5px 1px 5px 0px; border: 1px solid #fff; box-shadow: 0px 0px 1px #000;' type='submit' class='inputbutton' name='printreport' value='PRINT REPORT' />
	</form>
	
</div>
<div id='clear'></div>
<?php
	if(isset($_POST['view'])) {
		echo "<script>viewReport()</script>";
	} else if(isset($_POST['printreport'])) {
		echo "<script>printReport()</script>";
	}
?>