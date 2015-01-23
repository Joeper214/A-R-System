
	<table id='emplisttable'>
		<tr>	
			<th class='listtitle' id='tabletitle'>Name</th>
			<th class='listtitle'>Total Sales</th>
		</tr>

  <?php 
		  $queryprod = mysql_query("SELECT * FROM `product`");
							
		while($row = mysql_fetch_assoc($queryprod)) {

     $price = number_format($row['price'], 2, '.', ',');
  ?>

		<tr class='trlist'>	
		   <td class='list' id='productname'><?php echo $row['productName'];?></td>
 		<td class='list stock'><?php echo $row['stock']?></td>

</td>
		</tr>
   <?php }?>
	</table>