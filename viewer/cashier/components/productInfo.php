<?php 
$query = mysql_query("select * from product WHERE productStatus = 1");

while($row = mysql_fetch_assoc($query)){
?>
  $check = new VerifyModel();
  $isAdded = $check->isAddedToCart($row['productID'],$_SESSION['accountID']);
  if($isAdded){

  }else{
	<tr>
    <td class='list' id='productname'><?php echo $row['productName']; ?></td>
									    <td class='list' id='price'> <?php 

        setlocale(LC_MONETARY, 'en_US');
        echo money_format('%(#10n', $row['price']);
		   ?></td>
   <td class='list stock'><?php echo $row['stock']; ?></td>
  <td class='list'><?php if($row['stock'] > 0){ ?>
<a class='addtocart' href='javascript:popUpShow("cont<?php echo $row['productID']?>","popUpInnerContainer<?php echo $row['productID']?>","bg<?php echo $row['productID']?>");'><em>Add to cart</em></a>
																														
						<?php }else { echo "no stock."; } ?>
</td>
	   </tr>
<?php 
    include "../addToCartpopUp.php";			
  }
}
?>
