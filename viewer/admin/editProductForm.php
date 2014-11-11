<form method="POST"
action="../mysystem/controller/exec_controller.php"
>
<input type="hidden" name="action" value="edit">
<input type="hidden" name="target" value="product">
<input type="hidden" name="productID" value="<?php echo $product['productID']?>">
			<tr>
				<td>Product</td>
			</tr>
			<tr>
				<td><input class="input"  type="text" name="productName" value="<?php echo $product['productName']; ?>" autofocus required/></td>
			</tr>
			<tr>
				<td>Product type</td>
			</tr>
			<tr>
   <input type="hidden" name="productType" value="<?php echo $product['productType']; ?>">
				<td><input class='input'  disabled="true" type='text' name='prod' value="
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
				<td><textarea class='textarea'  name="productDescription" autofocus required >
<?php echo $product['productDescription']; ?>
</textarea></td>
			</tr>
	
			<tr>
				<td>Category</td>
			</tr>
			<tr>
				<td>

<select class="inputselect" name="categoryID">
        <?php
           $query = mysql_query("SELECT * FROM category WHERE categoryStatus=1");
if($row['productType'] == 0){
  echo "<option value='{$product['categoryID']}' selected='true'>". $product['categoryName']." </option>";
    }else{
  while($row = mysql_fetch_assoc($query)){
    if($row['categoryID'] == $product['categoryID']){
      echo "<option value='{$row['categoryID']}' selected='true'>".$row['categoryName']."</option>";
    }else{
      echo "<option value='{$row['categoryID']}'>".$row['categoryName']."</option>";
    }
  }
}
?>

      </select>

</td>

<td>
      

</td>
			</tr>
			<tr>
				<td>Brand</td>
			</tr>
			<tr>
		        

<td>
<select class="inputselect" name="brandID">
  <?php
  $query = mysql_query("SELECT * FROM brand where brandStatus=1");
while($row = mysql_fetch_assoc($query)) {
  if($row['brandID'] == $product['brandID']){
  echo "<option value='{$row['brandID']}' selected='true'>".$row['brandName']."</option>";
  }else{
  echo "<option value='{$row['brandID']}'>".$row['brandName']."</option>";
  }
}?>
</select>


</td>


			</tr>
			<tr>
				<td>Price</td>
			</tr>
			<tr>
				<td><input onkeydown="return allNumbers(event);" class='input'  type='text' name='price' value="<?php echo $product['price']; ?>" autofocus required/></td>
			</tr>
			<tr>
		




   <?php if ($product['productType'] == 1){
$nonconsumable = $access->getnonconsumableInfo($product['productID']);
?>

		<td>Stock</td>
			</tr>
			<tr>
				<td><input onkeydown="return allNumbers(event);" class='input' disabled="true" type='text' name='stockDisabled' value="<?php echo $product['stock']; ?>" autofocus required/>
<input type="hidden" name="stock" value="<?php echo $product['stock']; ?>">
</td>
			</tr>

<?php

if($nonconsumable){
foreach($nonconsumable as $info){

 ?>

		<tr>
    <td>Model</td>
    </tr>
    <tr>
				<td><input class='input' type='text' name='model' value="<?php echo $info['model']?>" autofocus required/></td>
			</tr>


			<tr>
    <td>Warranty (days)</td>
			</tr>
			<tr>
				<td><input onkeydown="return allNumbers(event);" class='input' type='text' name='warranty' value="<?php echo $info['warranty'];?>" autofocus required/></td>
			</tr>
			<tr>


    <?php }
}
 }else{
   ?>

<td>Stock</td>
			</tr>
			<tr>
				<td><input onkeydown="return allNumbers(event);" class='input'  type='text' name='stock' value="<?php echo $product['stock']; ?>" autofocus required/></td>
			</tr>

      <?php }?>
</textarea></td>
			</tr>
			<tr>
		        <td colspan='2'><input class='inputbutton' type='reset' name='cancel' value='CANCEL' /><input class='inputbutton' type='submit' name='save' value='SAVE' /></td>
			</tr>
   
		</form>