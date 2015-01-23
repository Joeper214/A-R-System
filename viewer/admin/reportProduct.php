<?php 
    $get = new GetModel();
$netincome = null;
$model = null;
$totaldisp = null;
$totalstock = null;
$totalsold = null;
$grand = null;

?>
	<table id='emplisttable'>
		<tr>	
			<th class='listtitle producttabletitle' id='tabletitle'>Product Name</th>
			<th class='listtitle'>Stock</th>
			<th class='listtitle'>Disposed</th>
			<th class='listtitle'>Sold Quantity</th>
			<th class='listtitle'>Total</th>
			<th class='listtitle'>Sold Amount</th>

		</tr>

  <?php 
		  $queryprod = mysql_query("SELECT * FROM product p, brand b
where b.brandID=p.brandID");

while($row = mysql_fetch_assoc($queryprod)) {
  $total = null;
  
  
  $total += $row['stock'];
  $totalstock += $row['stock'];
  
  $grand += $row['stock'];
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
    $grand += $disposed;
    $totaldisp += $disposed;
     echo $disposed;
      }else {

    $disposed = $get->getDisposed($row['productID']);
    $total += $disposed;
    $grand += $disposed;
    $totaldisp += $disposed;
    echo $disposed;
  } ?>
</td>

			<td class='list stock'>
 <?php 
    $sold = $get->getSold($row['productID']);
  if($disposed){
     echo $sold;
     $total += $sold;
     $grand += $sold;
     $totalsold += $sold;
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
<td class="list price">
    <?php 
    $sold *= $row['price'];
    $netincome += $sold;
    $price = number_format($sold, 2, '.', ',');
    echo $price;
    ?>
</td>


		</tr>
   <?php }?>
<tr>

</tr>

 <tr class='trlist'>
    <td class="list"><b>Total: </b></td>
   <td class="list stock"><b><?php echo $totalstock; ?></b></td>
   <td class="list stock"><b><?php echo $totaldisp; ?> </b></td>
   <td class="list stock"><b><?php echo $totalsold;?> </b></td>
    <td class="list stock"><b><?php echo $grand; ?> </b></td>
    
 </tr>
    <tr class="trlist">
  <td class="list"><b>Total Net income:</b></td>
  <td> </td>  <td> </td>  <td> </td><td> </td>
  <td class="list price"><?php 
 $net = number_format($netincome, 2, '.', ',');
 echo $net;?></td>
  
    </tr>
	</table>



