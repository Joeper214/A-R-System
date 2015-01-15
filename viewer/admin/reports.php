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
							<option value="<?php echo $['brandID'];?>"><?php echo $row['brandName']; ?></option>
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

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle producttabletitle' id='tabletitle'>Product Name</th>
			<th class='listtitle'>Stock</th>
			<th class='listtitle'>Price</th>
			<th class='listtitle'>Status</th>
		</tr>

  <?php 
		  $queryprod = mysql_query("SELECT * FROM `product`");
							
		while($row = mysql_fetch_assoc($queryprod)) {

     $price = number_format($row['price'], 2, '.', ',');
  ?>

		<tr class='trlist'>	
		   <td class='list' id='productname'><?php echo $row['productName'];?></td>
 		<td class='list stock'><?php echo $row['stock']?></td>
        	<td class='list stock'>P <?php echo $price; ?></td>
			<td class='list'>
 <?php if($row['productStatus'] == 1){
    echo "<a class='enabled' onclick='disableProduct({$row['productID']});' href='#'><em>Enabled</em></a>";
      }else {
    echo "<a class='disabled' disabled='true' onclick='enableProduct({$row['productID']});' href='#'><em>Disabled</em></a>";
  } ?>
</td>
		</tr>
   <?php }?>
	</table>
	
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