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
		</tr>

  <?php 
		  $queryprod = mysql_query("SELECT * FROM product p, brand b
where b.brandID=p.brandID");
							
while($row = mysql_fetch_assoc($queryprod)) {

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
        	<td class='list stock'><?php echo $row['stock'] ?></td>
			<td class='list stock'>
 <?php if($row['productType'] == 1){
    $disposed = $get->getReplaced($row['productID']);
     echo $disposed;
      }else {
     $disposed = $get-
    echo "2";
    
  } ?>
</td>
		</tr>
   <?php }?>
	</table>