
		<form method="POST" action="../mysystem/controller/exec_controller.php">

   <input type="hidden" name="action" value="add">
   <input type="hidden" name="target" value="product">

<tr>
				<td>Product type</td>
			</tr>
			<tr>
				<td>
 <select class='inputselect' name='productType'>
<option value="0" onclick="consumable();">Consumables</option>
<option value="1" onclick="nonConsumable();">Non-consumables</option>
					</select>
				</td>
			</tr>




			<tr>
				<td>Product name</td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='productName' placeholder='Product name' autofocus required/></td>
			</tr>
			
			<tr>
				<td>Description</td>
			</tr>
			<tr>
   <td><textarea class='textarea' name='description' placeholder='Product description' autofocus required></textarea></td>
			</tr>
		<td>Category</td>
      </tr>
	<tr>
		<td>
	<select class='inputselect' name='categoryID'>
		<?php
	$query = mysql_query("SELECT * FROM category where categoryStatus=1");
	while($row = mysql_fetch_assoc($query)) {
	  if($row['categoryName'] == "Accessories" || $row['categoryName'] == "accessories" ){
	    echo "<option value='{$row['categoryID']}' selected='true'>".$row['categoryName']."</option>";
	    $accessory = $row['categoryName'];
	    
	  }else{
	    
	  }
	}
if(isset($accessory)){
}else{
  echo "<option disabled='true' style='color:red'>Please Enable the Accessory Category to add Consumables</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td>Brand</td>
	</tr>
	<tr>
		<td>
		<select class="inputselect" name="brandID">
	<?php
	$query = mysql_query("SELECT * FROM brand where brandStatus = 1");
	while($row = mysql_fetch_assoc($query)) {
	echo "<option value='{$row['brandID']}'>".$row['brandName']."</option>";
	}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Price</td>
			</tr>
			<tr>
				<td><input onkeydown="return allNumbers(event);" class='input' type='text' name='price' placeholder='Price' autofocus required/></td>
			</tr>
			<tr>
				<td>Stock</td>
			</tr>
			<tr>
	<td><input onkeydown="return allNumbers(event);" class='input' type='number' min='1' name='stock' placeholder='Stock' autofocus required/></td>
	</tr>
	  
	  <tr>
	  
	  
		
				<td colspan='2'><input class='inputbutton' type='reset' name='cancel' value='CANCEL' />

	  <?php if(isset($accessory)){ ?>
<input class='inputbutton' type='submit' name='save' value='SAVE' /></td>
   <?php }else { ?>
<input disabled="true" class='inputbutton' type='submit' name='save' value='SAVE' /></td>
   <?php } ?>
			</tr>
		</form>