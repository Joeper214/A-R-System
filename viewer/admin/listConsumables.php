<?php 

if(isset($_POST['searchConsume'])){
  $keys = $_POST['searchKey1'];
  $query = mysql_query("SELECT * FROM product p, brand b where productType=0 AND p.productName LIKE '%$keys%' AND b.brandID=p.brandID");
}else{
  $query = mysql_query("SELECT * FROM product p, brand b where productType=0 AND b.brandID=p.brandID");
}
$count2 = NULL;
while($row = mysql_fetch_assoc($query)){
  $price = number_format($row['price'], 2, '.', ',');
  $count2++;
?>


<tr class='trlist'>	
			<td class='list' id='productname'><?php echo $row['productName'] ?></td>
			<td class='list'><?php echo $row['brandName'] ?></td>
			<td class='list'><?php echo $row['stock'] ?>
    <?php if($row['productType'] == 1){
          }else{
    //    echo "<a class='addstock'></a>";
               }
     ?>
                        </td>
			    <td class='list price'><?php echo $price ?></td>
			    
			    <td class='list'>
			    <a class="remove" <?php echo "href='javascript:popUpShow(\"change{$row['productID']}\",\"popUpInnerContainer\",\"bg{$row['productID']}\");'";?>></a>
			    </td>
		        
			<td class='list'>
			    <a class="addstock" <?php echo "href='javascript:popUpShow(\"add{$row['productID']}\",\"popUpInnerContainer\",\"addbg{$row['productID']}\");'";?>>></a>
</td>
			<td class='list'><a class='edit' href='admin.php?option=editProduct&productID=<?php echo $row['productID']; ?>'><em>Edit</em></a></td>
			<td class='list'><a class='view' href='admin.php?option=viewProduct&productID=<?php echo $row['productID']; ?>'><em>View</em></a></td>
			<td class='list'>
    <?php if($row['productStatus'] == 1){
    echo "<a class='enabled' onclick='disableProduct({$row['productID']});' href='#'><em>Enabled</em></a>";
      }else {
    echo "<a class='disabled' onclick='enableProduct({$row['productID']});' href='#'><em>Disabled</em></a>";
      }
  include "changeQuantity.php";
  include "addQuantity.php";
}

if($count2==0){
  echo "<tr><td>No Consumable product Found!</td></tr>";
}
?>
  </td>
		</tr>