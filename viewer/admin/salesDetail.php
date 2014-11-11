<?php 
if(isset($_GET['transID'])){
  $get = new GetModel();
  $infos = $get->getTransInfo($_GET['transID']);
  foreach($infos as $info){
    $date = new DateTime($info['dateRecorded']);
    $accountID = $info['accountID'];
    
?>


<div id='adminleft'>
	<header id='accounttitle' style='border-bottom: none;'>
		<a class='back' href='admin.php?option=transactions' style='margin-bottom: -10px;'><em>Back</em></a>
	</header>
	<header id='accounttitle'>
		<p>Customer Information</p>
	</header>
	<table>
		<tr>
			<td>First name</td>
		</tr>
		<tr>
			<td><input class='input' type='text' disabled='true' name='fname' value='<?php echo $info['fname']; ?>' autofocus/></td>
		</tr>
		<tr>
			<td>Middle name</td>
		</tr>
		<tr>
			<td><input class='input' type='text' disabled='true' name='mname' value='<?php echo $info['mname']; ?>' autofocus/></td>
		</tr>
		<tr>
			<td>Last name</td>
		</tr>
		<tr>
			<td><input class='input' type='text' disabled='true' name='lname' value='<?php echo $info['lname']; ?>' autofocus/></td>
		</tr>
		<tr>
			<td>Address</td>
		</tr>
		<tr>
			<td><input class='input' type='text' disabled='true' name='address' value='<?php echo $info['address']; ?>' autofocus/></td>
		</tr>
		<tr>
			<td>Contact number</td>
		</tr>
		<tr>
			<td><input class='input' type='text' disabled='true' name='contact' value='<?php echo $info['contactNumber']; ?>' autofocus/></td>
		</tr>
      <?php } ?>
	</table>
</div>
<?php 
	    $carts = $get->getCart_by_id($_GET['transID']);

?>
<div id='productright'>
	<header id='accounttitle'>
		<p>Customer Cart Summary</p>
	</header>

	<table id='emplisttable'>
			<tr>
				<th class='listtitle producttabletitle' id='tabletitle' style='width: 59%;'>Product name</th>
				<th class='listtitle'>Warranty</th>
				<th class='listtitle'>Quantity</th>
				<th class='listtitle'>Price</th>
				<th class='listtitle'>Sub Total</th>
			</tr>
<?php     
   $tot=NULL;
  //$nombre_format_francais = number_format($number, 2,'.' , ',');
   foreach ($carts as $cart){ 
      setlocale(LC_MONETARY, 'en_US');
      $price = number_format( $cart['price'], 2, '.', ',');
      $subtotal = number_format($cart['subtotal'], 2, '.', ',');
      $tot += $cart['subtotal'];
      $total = number_format($tot, 2, '.', ',');
      //    $price = number_format($number, 2, '.', ',');
  ?>
			<tr>

      <td class='list' id='productname'><?php echo $cart['productName'];?></td>
									      <td class='list stock'><?php $get = new GetModel();
      $warranty = $get->getWarranty($cart['productID']);
      if($warranty){
	echo $warranty." days";
      }else{
	echo "None";
      }
?></td>
																		<td class='list transactionpayment'><?php echo $cart['quantity']; ?></td>
																						   <td class='list' id='price' style="width: 20%"><?php echo $price; ?></td>
																						   <td class='list ' id='price'  style="width: 20%"><?php echo $subtotal; ?></td>
			</tr>
      <?php } ?>
											      	<tr class='serviceacquiredtotal'>	
				<td colspan='4' class='list amountdue' >TOTAL &nbsp; :</td>
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
			<td><input class='input' type='text' disabled='true' name='fname' value='
<?php 
   $attendant = $get->getAttendant($accountID);
 echo $attendant;
?>
' autofocus/></td>
		</tr>
		<tr>
			<td class='bold'>Transaction Date</td>
		</tr>
		<tr>
											 <td><input class='input' type='text' disabled='true' name='mname' value='<?php echo $date->format('F j, Y');?>' autofocus/></td>
		</tr>
	</table>
											 <?php }?>
</div>
<div id='clear'></div>