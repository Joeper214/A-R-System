

<form method='POST' action='../mysystem/controller/cash_controller.php'>
   <input type="hidden" name="action" value="add">
   <input type="hidden" name="target" value="transaction">
   <input type="hidden" name="attendant" value="<?php echo $_SESSION['cashierID'];?>">
	<div id='adminleft'>
		<header id='accounttitle' style='border-bottom: none;'>
			<a class='back' style='margin-bottom: -10px;' href='cashier.php?option=cart'><em>Back</em></a>
		</header>
		<header id='accounttitle'>
			<p>Customer Information</p>
		</header>
		<table>
			<tr>
				<td>First name</td>
			</tr>
			<tr>
				<td><input onkeydown="return isAlpha(event.keyCode);" class='input' type='text' name='fname' placeholder='First name' onfocus="if (this.placeholder == &#39;First name&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;First name&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Middle name</td>
			</tr>
			<tr>
				<td><input onkeydown="return isAlpha(event.keyCode);" class='input' type='text' name='mname' placeholder='Middle name' onfocus="if (this.placeholder == &#39;Middle name&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Middle name&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Last name</td>
			</tr>
			<tr>
				<td><input onkeydown="return isAlpha(event.keyCode);" class='input' type='text' name='lname' placeholder='Last name' onfocus="if (this.placeholder == &#39;Last name&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Last name&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Address</td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='address' placeholder='Address' onfocus="if (this.placeholder == &#39;Address&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Address&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Contact number</td>
			</tr>
			<tr>
				<td><input onkeydown="return allNumbers(event)" maxlength="11" class='input' type='text' name='contact' placeholder='Contact number' onfocus="if (this.placeholder == &#39;Contact number&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Contact number&#39;;}" autofocus required/></td>
			</tr>
		</table>
	</div>

	<div id='productright'>
		<header id='accounttitle'>
			<p>Customer Cart Summary</p>
		</header>
<?php
   $cartQuery = mysql_query("select *, (c.quantity*c.price) AS 'subtotal' 
                             from cartdetail c, product p
                             where processStatus = 0
                             AND  c.accountID = {$_SESSION['accountID']}
                             and c.productID = p.productID
                             ");
  ?>
		<table id='productlisttable'>
			<tr>
				<th class='listtitle producttabletitle' id='tabletitle' style='width: 59%;'>Product name</th>
				<th class='listtitle'>Warranty</th>
				<th class='listtitle'>Quantity</th>
				<th class='listtitle'>Price</th>
				<th class='listtitle'>Sub Total</th>
			</tr>
			
   <?php if(isset($cartQuery)) { ?>
<?php 
     $tot = NULL;
  while($cart = mysql_fetch_assoc($cartQuery)){
    $_SESSION['prodID'] = $cart['productID'];
    $cartID = $cart['cartDetailID'];
    setlocale(LC_MONETARY, 'en_US');
    $number = $cart['price'];
    $tot += $cart['subtotal'];
    $sub = $cart['subtotal'];

    $price = number_format($number, 2, '.', ',');
    $subtotal = number_format($sub, 2, '.', ',');
    $total = number_format($tot, 2, '.', ',');
  ?>
    <tr>
       <td class='list' id='productname'><?php echo $cart['productName']; ?></td>
        <input type="hidden" name="carts[]" value="<?php echo $cart['cartDetailID']; ?>" >
										<td class='list stock'><?php $get = new GetModel();
    $warranty  = $get->getWarranty($cart['productID']);
    if($warranty){
      echo $warranty." Days";
    }else{
      echo "None";
    }

                               ?></td>
       <td class='list stock'><?php echo $cart['quantity']; ?></td>
       <td class='list' id='price'><?php echo $cart['price']; ?></td>
      <td class='list' id='price'><?php echo $subtotal; ?></td>
       </tr>
	      <?php }} ?>
			<tr class='serviceacquiredtotal'>	
				<td colspan='4' class='list amountdue'>TOTAL &nbsp; :</td>
				<td  class='list'><?php echo $total; ?>
                <input id="total" name="total" type="hidden" value="<?php echo $tot; ?>">

                                </td>
			</tr>
											
		</table>
		
		<header id='accounttitle'>
			<p>Transaction Information</p>
		</header>
		<table>
			<tr>
				<td class='bold'>Attendant</td>
			</tr>
			<tr>
				<td><input class='input' type='text' disabled='true' name='fnameasd' value='<?php echo $_SESSION['cashierName'];?>' autofocus/></td>
			</tr>
			<tr>
				<td class='bold'>Transaction Date</td>
			</tr>
			<tr>
   <td><input class='input' type='text' disabled='true' name='mname' value='<?php $today = new DateTime(); echo $today->format('F j, Y');



 ?>' autofocus/></td>
			</tr>
		</table>
		
		<table id='paymentform'>
			<tr>
				<td class='bold'>Amount paid</td>
                           <td> 


</td>
			</tr>
			<tr>


				<td><input id="amount" class='input bold pricerates' type='text' name='fnameasd' placeholder='Amount paid' onkeydown="return Decimals(event)" onkeyup="inputChange();" onfocus="if (this.placeholder == &#39;Amount paid&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Amount paid&#39;;}" autofocus required/></td>
			</tr>
			<tr>
									  <td class='bold'>Change</td>
			</tr>
			<tr>
				<td><input id="change" class='input bold pricerates' type='text' name='fnameasdasd' placeholder='Change' onfocus="if (this.placeholder == &#39;Change&#39;) {this.placeholder = &#39;&#39;;}" disabled="true" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Change&#39;;}" autofocus required/></td>
			</tr>
		</table>
		
		<input id="pay" onclick="printReceipt();" disabled="true" style='width: 165px; border: none; float: right; margin: 5px 1px 5px 0px; border: 1px solid #fff; box-shadow: 0px 0px 1px #000;' type='submit' class='inputbutton' name='printreceipt' value='PRINT RECEIPT'/>
		
	</div>
</form>
<div id='clear'></div>
<?php
	if(isset($_POST['printreceipt'])) {
		echo "<script>printReceipt()</script>";
	}
?>