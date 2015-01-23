
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