<?php 

if(isset($_POST['searchNonConsume'])){
  $key2 = $_POST['searchKey2'];
  $query = mysql_query("SELECT * FROM product p, brand b,nonconsumable n 
where productType=1 AND productName LIKE '%$key2%' AND  b.brandID=p.brandID AND n.productID = p.productID");
}else{
  $query = mysql_query("SELECT * FROM product p, brand b,nonconsumable n 
where productType=1 AND b.brandID=p.brandID AND n.productID = p.productID");
}

$count = NULL;
while($row = mysql_fetch_assoc($query)){
  $count++;
    $price = number_format($row['price'], 2, '.', ',');
?>


<tr class='trlist'>	
   <td class='list' id='productname'><?php echo $row['brandName']." ".$row['productName']." ".$row['model']; ?></td>
			<td class='list'><?php echo $row['stock'] ?>
    <?php if($row['productType'] ==1){
          }else{
    //    echo "<a class='addstock'></a>";
               }
     ?>
                        </td>
			<td class='list price'><?php echo $price ?></td>

		        
			<td class='list'>
    <?php if($row['productType'] ==1){ ?>
<a class='replace' href='admin.php?option=editserial&productID=<?php echo $row['productID']; ?>'><em>Edit-Serial<em></a>
   <?php  }else {echo "<a></a>";}?>
</td>
			<td class='list'><a class='edit' href='admin.php?option=editProduct&productID=<?php echo $row['productID']; ?>'><em>Edit</em></a></td>
			<td class='list'><a class='view' href='admin.php?option=viewProduct&productID=<?php echo $row['productID']; ?>'><em>View</em></a></td>
			<td class='list'>
    <?php if($row['productStatus'] == 1){
    echo "<a class='enabled' onclick='disableProduct({$row['productID']});' href='#'><em>Enabled</em></a>";
      }else {
    echo "<a class='disabled' onclick='enableProduct({$row['productID']});' href='#'><em>Disabled</em></a>";
  }
}
if($count==0){
  echo "<tr><td>No Non-Consumable product Found!</td></tr>";
}
?>
  </td>
		</tr>