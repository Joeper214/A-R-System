<div id='adminleft'>
	<header id='accounttitle'>
		<p>Product Information</p>
	</header>
	<table>
		<form method='POST'>
			<tr>
				<td>Product</td>
			</tr>
			<tr>
				<td><input class="input" disabled="true" type="text" name="product_name" value="<?php echo $product['productName']; ?>" autofocus required/></td>
			</tr>
			<tr>
				<td>Product type</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' type='text' name='productType' value="
<?php if($product['productType'] ==1 )
          {echo 'Non-Consumable';}
          else{ echo 'Consumable';}
?>  

" autofocus required/></td>
			</tr>
			<tr>
				<td>Description</td>
			</tr>
			<tr>
				<td><textarea class='textarea' disabled='true' name="<?php echo $product['prductDescription']; ?>" autofocus required >
<?php echo $product['productDescription']; ?>
</textarea></td>
			</tr>
	
			<tr>
				<td>Category</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' type='text' name='category' value="<?php echo $product['categoryName'];?>" autofocus required/></td>
			</tr>
			<tr>
				<td>Brand</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' type='text' name='brand' value="<?php echo $product['brandName']; ?>" autofocus required/></td>
			</tr>
			<tr>
				<td>Price</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' type='text' name='price' value="<?php echo $product['price']; ?>" autofocus required/></td>
			</tr>
			<tr>
				<td>Stock</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' type='text' name='stock' value="<?php echo $product['stock']; ?>" autofocus required/></td>
			</tr>




   <?php if ($product['productType'] == 1){
$nonconsumable = $access->getnonconsumableInfo($product['productID']);


if($nonconsumable){
foreach($nonconsumable as $info){

 ?>

		<tr>
    <td>Model</td>
    </tr>
    <tr>
				<td><input class='input' disabled='true' type='text' name='model' value="<?php echo $info['model']?>" autofocus required/></td>
			</tr>


			<tr>
				<td>Warranty</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' type='text' name='warranty' value="<?php echo $info['warranty'];?>" autofocus required/></td>
			</tr>
			<tr>


    <?php }}
?>
<?php 
$serials = $access->getSerials($product['productID']);


if($serials){


?>

				<td>Serials</td>
			</tr>
			<tr>
				<td><textarea class='textarea' style='height: auto; scrolling: false;' disabled='true' name='serials'><?php 
foreach($serials as $serial){
echo $serial['serialNumber'].","; ?>
 <?php }
    }
}?>
</textarea></td>
			</tr>
			<tr>
		        
			</tr>
   


		</form>
	</table>
</div>