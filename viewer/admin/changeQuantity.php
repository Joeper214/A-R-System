<script type='text/javascript' src='script/moveable.js'></script>
<div class="popUpContainer" style="display:none;" id="change<?php echo $row['productID']?>">
    <div class="popUpHeader">
   <div class="popUpTitle"><?php echo $row['productName']; ?></div>

        <div id="popUpCancel"><a href="javascript:popUpHide('change<?php echo $row['productID']?>','bg<?php echo $row['productID']?>');"><em>Cancel</em></a></div>

    </div>
	<div class='popUpHeaderLine'></div>



    <div id="popUpInnerContainer">

		<form class='popUpForm' method="post" action="../mysystem/controller/exec_controller.php">

   

   <input type="hidden" name="action" value="edit">
    <input type="hidden" name="target" value="stock">
   <input type='hidden' name="curstock" value='<?php echo $row['stock']; ?>'/>
   
   <input type="hidden" name="productID" value="<?php echo $row['productID']; ?>">

   <input type="hidden" name="price" value="<?php echo $row['price']; ?>">


   <div class='popUpNote'>Enter number of defective and reason for disposal </div>

			<div id='clear'></div>

			<div><br/>
				<label for='quantity' >Current Stock</label>
				<input type='number' min='1' name='stockasd' id='stock' value='<?php echo $row['stock'] ?>' disabled='true'/><br/>
			</div>
			
   Number of defective: <input type="text" onkeydown="return allNumbers(event)"name="quantity" autofocus required min='1' value='1'maxlength="4"/></br> </br></br>
   <label></label> <textarea class='textarea' name='reason' placeholder='Reason for disposal' autofocus required></textarea>
			<div id='clear'></div>

			<div class='submit'>
				<input style='width: 125px;' type='submit' class='inputbutton' name='submit' value='Save'/>
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