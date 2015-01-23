<?php 
    $get = new GetModel();
$model = null;

?>
	<table id='emplisttable'>
		<tr>	
			<th class='listtitle producttabletitle' id='tabletitle'>Product Name</th>
			<th class='listtitle'>Stock</th>
			<th class='listtitle'>Disposed</th>
			<th class='listtitle'>Sold</th>
			<th class='listtitle'>Total</th>
		</tr>

  <?php 
		  $queryprod = mysql_query("SELECT * FROM product p, brand b
where b.brandID=p.brandID");
							
while($row = mysql_fetch_assoc($queryprod)) {
$total = null;
$total += $row['stock'];

  $price = number_format($row['price'], 2, '.', ',');
  ?>

		<tr class='trlist'>	
<td class='list'>
		   <?php if($row['productType'] == 1){
		   $datas = $get->getnonconsumableInfo($row['productID']);
		   foreach ($datas as $data){
                       $model = $data['model'];
                   }
		     echo $row['brandName']." ".$row['productName']." ".$model;
}else{
  echo $row['brandName']." ".$row['productName']; }
  ?>
</td>
    <td class='list stock'><?php echo $row['stock']; ?></td>
			<td class='list stock'>
 <?php if($row['productType'] == 1){
    $disposed = $get->getReplaced($row['productID']);
    $total += $disposed;
     echo $disposed;
      }else {

    $disposed = $get->getDisposed($row['productID']);
    $total += $disposed;
    echo $disposed;
  } ?>
</td>

			<td class='list stock'>
 <?php 
    $disposed = $get->getSold($row['productID']);
  if($disposed){
     echo $disposed;
     $total += $disposed;
}else{
  echo "0";
}
 ?>
</td>
<td class='list stock'>
<b>
 <?php 
    if($total){
        echo $total;
    }else{
        echo "0";
    }
 ?>
</b>
</td>



		</tr>
   <?php }?>
	</table>