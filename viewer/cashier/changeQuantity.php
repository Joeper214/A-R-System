<script type='text/javascript' src='script/moveable.js'></script>
<div class="popUpContainer" style="display:none;" id="change<?php echo $cartID?>">
    <div class="popUpHeader">
   <div class="popUpTitle"><?php echo $cart['productName']; ?></div>

        <div id="popUpCancel"><a href="javascript:popUpHide('change<?php echo $cartID ?>','bg<?php echo $cartID?>');"><em>Cancel</em></a></div>

    </div>
	<div class='popUpHeaderLine'></div>



    <div id="popUpInnerContainer">

		<form class='popUpForm' method="post" action="../mysystem/controller/cas
h_controller.php">

   

   <input type="hidden" name="action" value="edit">
    <input type="hidden" name="productType" value="<?php echo $cart['productType']; ?>">
   <input type="hidden" name="target" value="cart">
   <input type='hidden' name="stock" value='<?php echo $cart['stock']+$cart['quantity']; ?>'/>
   
   <input type="hidden" name="productID" value="<?php echo $cart['productID']; ?>">

   <input type="hidden" name="price" value="<?php echo $cart['price']; ?>">
   <input type="hidden" name="cartDetailID" value="<?php echo $cart['cartDetailID']; ?>">





<div class='popUpNote'>Enter the quantity and check serials if product has serials</div>

			<div id='clear'></div>

			<div><br/>
				<label for='quantity' >Stock</label>
				<input type='number' min='1' name='stockasd' id='stock' value='<?php echo $cart['stock']+$cart['quantity']; ?>' disabled='true'/><br/>
			</div>
			
			<div id='clear'></div>
   <?php if($cart['productType'] == 1){ ?>
			<div class='serialContainer'>
				<label>Product Serials</label><br/>
					<ul id='serials'>
	<?php 
			   $query_serials = mysql_query("SELECT * FROM serial
                           WHERE productID={$cart['productID']}
                           AND serialStatus = 1
                           AND isTaken != 2
                           ");

$get = new GetModel();
        
while($getserials = mysql_fetch_assoc($query_serials)){
	?>
  <li><input <?php
    //echo     $getserials['serialID'];
    $isExist = $get->getSelSerial($getserials['serialID'],$cartID);
  if($isExist == $getserials['serialID']){
        echo "checked=true";
  }else{
    //echo "checked=false";
  }
             ?>
 name="serials[]" value="<?php echo $getserials['serialID'] ?>" type='checkbox'/> <?php echo $getserials['serialNumber']; ?></li>
    <?php } ?>
					</ul>	
			</div>
			   <?php }else{ ?>
	<div>
				<label for='quantity' >Quantity</label>
				<input type="number" onkeydown="return allNumbers(event);"  min='1' name='quantity' value='<?php echo $cart['quantity']?>'/><br/>
			</div>

<?php }?>

			<div class='submit'>
				<input style='width: 125px;' type='submit' class='inputbutton' name='submit' value='Change'/>
			</div>
			
			<div id='clear'></div>
		</form>
    </div>
</div>

<div class="popUpBackground" style="display:none;" id="bg<?php echo $cartID?>"></div>

<?php
	if(isset($_POST['submit'])) {
		echo "<script>productAddedToCart()</script>";
	}
?>