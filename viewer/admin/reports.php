<div id='adminleft'>
	<header id='accounttitle'>
		<p>Generate Report</p>
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
						<option value="2">Employee</option>
						<option value="3">Service</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Category</td>
			</tr>
			<tr>
				<td>
					<select name='category' class='inputselect'>
						<option value="all">All</option>
						<?php
						$query = mysql_query("SELECT * FROM category");
								
						while($row = mysql_fetch_assoc($query)) {
						?>
							<option value="<?php echo $row['categoryID'];?>"><?php echo $row['categoryName']; ?></option>
						<?php
						}	
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Brand</td>
			</tr>
			<tr>
				<td>
					<select name='brand' class='inputselect'>
						<option value="all">All</option>
						<?php
						$query = mysql_query("SELECT * FROM brand");
									
						while($row = mysql_fetch_assoc($query)) {
						?>
							<option value="<?php echo $row['brandID'];?>"><?php echo $row['brandName']; ?></option>
						<?php
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Status</td>
			</tr>
			<tr>
				<td>
					<select name='status' class='inputselect'>
						<option value="all">All</option>
						<option value="Available">Available</option>
						<option value="Unavailable">Unavailable</option>
						<option value="Enabled">Enabled</option>
						<option value="Disabled">Disabled</option>
						<option value="Defective">Defective</option>
						<option value="Disposed">Disposed</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Sort by</td>
			</tr>
			<tr>
				<td>
					<select name='sort' class='inputselect'>
						<option value="Name">Name</option>
						<option value="Stock">Stock</option>
						<option value="Price">Price/Rate</option>
						<option value="Status">Status</option>
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
		<p>Product Report</p>
	</header>
<?php
 if(isset($_POST['case'])){
   if($_POST['case'] == 1){
     include "reportProduct.php";
   }else if($_POST['case'] == 2){
     include "reportEmployee.php";
   }else if($_POST['case'] == 3){
     include "reportEmployee.php";
   }
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