<script type='text/javascript' src='script/moveable.js'></script>
<div class="popUpContainer" style="display:none;" id="cont<?php echo $row['productID']?>">
    <div class="popUpHeader">
   <div class="popUpTitle"><?php echo $row['productName']; ?></div>

        <div id="popUpCancel"><a href="javascript:popUpHide('cont<?php echo $row['productID']?>','bg<?php echo $row['productID']?>');"><em>Cancel</em></a></div>

    </div>
	<div class='popUpHeaderLine'></div>



    <div id="popUpInnerContainer">

		<form class='popUpForm' method="post" action="../mysystem/controller/cas
h_controller.php">

   

   <input type="hidden" name="action" value="add">

   <input type="hidden" name="target" value="cart">
   <input type="hidden" name="accountID" value="<?php echo $_SESSION['accountID']; ?>">

   <input type="hidden" name="productID" value="<?php echo $row['productID']; ?>">

   <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
   <input type="hidden" name="stock" value="<?php echo $row['stock']; ?>">
   <input type="hidden" name="productType" value="<?php echo $row['productType']?>">




<div class='popUpNote'>Enter the quantity and check serials if product has serials</div>

			<div id='clear'></div>

			<div><br/>
				<label for='quantity' >Stock</label>
				<input type='number' min='1' name='stocks' id='stock' value='<?php echo $row['stock']; ?>' disabled='true'/><br/>
			</div>
			
			<div id='clear'></div>
   <?php if($row['productType'] == 1){ ?>

			<div class='serialContainer'>
				<label>Product Serials</label><br/>
					<ul id='serials'>
	<?php 
			   $query_serials = mysql_query("SELECT * FROM serial
                           WHERE productID={$row['productID']}
                           AND serialStatus = 1
                           AND isTaken = 0
                           ");
while($getserials = mysql_fetch_assoc($query_serials)){
  $get = new GetModel();
	?>
  <li><input name="serials[]" value="<?php echo $getserials['serialID'] ?>" type='checkbox'/> <?php echo $getserials['serialNumber']; 

      ?></li>
    <?php } ?>
					</ul>	
			</div>
			   <?php }else{ ?>
	<div>

				<label for='quantity' >Quantity</label>
				<input type="number" onkeydown="return allNumbers(event);" min='1' name='quantity' value='1'/><br/>
			</div>

<?php }?>

			<div class='submit'>
				<input style='width: 125px;'  type='submit' class='inputbutton' name='submit' value='ADD TO CART'/>
			</div>
			
			<div id='clear'></div>
		</form>
    </div>
</div>

<div class="popUpBackground" style="display:none;" id="bg<?php echo $row['productID']?>"></div>

<?php
	if(isset($_POST['submit'])) {
		echo "<script>productAddedToCart()</script>";
	}
?>