
		<form method="POST" action="../mysystem/controller/exec_controller.php">

   <input type="hidden" name="action" value="add">
   <input type="hidden" name="target" value="product">

	<tr>
				<td>Product type</td>
			</tr>
			<tr>
				<td>
 <select class='inputselect' name='productType'>
<option value="1" onclick="nonConsumable();">Non-consumables </option>
<option value="0" onclick="consumable();">Consumables</option>
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



			<tr>
				<td>Model</td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='model' placeholder='Model Name' autofocus required/></td>
			</tr>




		<td>Category</td>
      </tr>
	<tr>
		<td>
	<select class='inputselect' name='categoryID'>
		<?php
	$query = mysql_query("SELECT * FROM category WHERE categoryStatus=1");
	while($row = mysql_fetch_assoc($query)) {
	echo "<option value='{$row['categoryID']}'>".$row['categoryName']."</option>";
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
	$query = mysql_query("SELECT * FROM brand WHERE brandStatus = 1");
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
				<td>Waranty</td>
			</tr>
			<tr>
	<td><input onkeydown="return allNumbers(event);" class='input' type='number' min='1' name="warranty" placeholder='Number of days' autofocus required  maxlength="4"/> </td>
	</tr>
	  
	  <tr>
	  <input type="hidden" name="stock" value="0">
	  
		
				<td colspan='2'><input class='inputbutton' type='reset' name='cancel' value='CANCEL' /><input class='inputbutton' type='submit' name='save' value='SAVE' /></td>
			</tr>
		</form>