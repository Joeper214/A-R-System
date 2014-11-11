<div id='adminleft'>
	<header id='accounttitle' style='border-bottom: none;'>
		<a class='back' href='admin.php?option=transactions' style='margin-bottom: -10px;'><em>Back</em></a>
	</header>
	<header id='accounttitle'>
		<p>Customer Information</p>
	</header>

<form method='POST' action='../mysystem/controller/cash_controller.php'>
   <input type="hidden" name="action" value="add">
   <input type="hidden" name="target" value="technical">

<?php 
   if(isset($_GET['personID'])&&isset($_GET['accID'])){
   $get = new GetModel();
   $personInfo = $get->getCustomerInfo($_GET['personID']);

}else{
  header("location: cashier.php?option=transaction");
} ?>

   <input type="hidden" name="personID" value="<?php echo $_GET['personID']?>">
   <input type="hidden" name="accountID" value="<?php echo $_GET['accID']?>">
<?php foreach($personInfo as $person){
?>
		<tr>
			<td>First name</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='asdfname' value='<?php echo $person['fname']; ?>' autofocus required/></td>
		</tr>
		<tr>
			<td>Middle name</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='asdmname' value='<?php echo $person['mname']; ?>' autofocus required/></td>
		</tr>
		<tr>
			<td>Last name</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='asdlname' value='<?php echo $person['lname']; ?>' autofocus required/></td>
		</tr>
		<tr>
			<td>Address</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='asdaddress' value='<?php echo $person['address']; ?>' autofocus required/></td>
		</tr>
		<tr>
			<td>Contact number</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='dfdfcontact' value='<?php echo $person['contactNumber']; ?>' autofocus required/></td>
		</tr>
		<tr>
			<td>Device Repaired</td>
		</tr>
		<tr>
   <td>

<?php 
      //      echo $_SESSION['customerID'];
      $devices = $get->getDevices($_GET['personID']);
    if($devices){
      foreach($devices as $device){
	
	echo "</br>&nbsp; &nbsp; &nbsp;* ";
	echo $device['deviceName']."";
      }
    }else{
      echo "no devices add yet.";
    }
?>

   </td>
   </tr>
	</table>
    <?php } ?>
</div>

<div id='productright'>
	<header id='accounttitle'>
		<p>Customer Acquired Services</p>
	</header>

	<table id='productlisttable'>
		<tr>
			<th class='listtitle' id='tabletitle' style='width: 10%'>Date</th>
			<th class='listtitle' id='tabletitle' style='width: 40%'>Service name</th>

			<th class='listtitle' id='tabletitle'>Device Name</th>
			<th class='listtitle' id='tabletitle' style='width: 15%'>Rate</th>

		</tr>
 <?php 
	    //	    echo $_SESSION['customerID'].$_SESSION['accountID'];
$services = $get->getServicesApplied($_GET['personID'],$_GET['accID']);
 
      if($services) {
	$tot = NULL;
      foreach($services as $service){
	$date = new DateTime($service['serviceDate']);
	$tot += $service['serviceRate'];
	$price = number_format($tot, 2, '.', ',');
	$serviceRate = number_format($service['serviceRate'], 2, '.', ',');
?>
		<tr>
<input type="hidden" name="technicalID[]" value="<?php echo $service['technicalID']?>"> 
	<td class='list' id='servicename'><?php echo $date->format('m/d/Y');?></td>
<td class='list' id='servicename'><?php echo $service['serviceName'];?></td>
<td class='list' id='rate'><?php echo $service['deviceName'];?></td>
<td class='list' id='rate'>P <?php echo $serviceRate;?></td>

		</tr>
							   <?php } ?>
<tr class='serviceacquiredtotal'>	
 <td colspan='3' class='list amountdue' >TOTAL &nbsp; :</td>
											 <td  class='list amountdue'>P <?php echo $price; ?>
											 <input id="total" name="total" type="hidden" value="<?php echo $tot; ?>">
											    
											    </td>
			</tr>
<?php      }else {?>
	<tr><td></td><td> NO services applied yet.</td></tr>
      <?php } ?>
	</table>


		<header id='accounttitle'>
			<p>Transaction Information</p>
		</header>
		<table>
			<tr>
				<td class='bold'>Technician</td>
			</tr>
			<tr>
				<td><input class='input' type='text' disabled='true' name='fnameasd' value='<?php  $attendantInfo = $get->getUserInfo_by_id($_GET['accID']);
                    foreach ($attendantInfo as $attendant){
                   echo $attendant['fname'].' '.$attendant['mname'].' '.$attendant['lname'];
                    }
                      ?>' autofocus/></td>
			</tr>
			<tr>
				<td class='bold'>Transaction Date</td>
			</tr>
			<tr>
   <td><input class='input' type='text' disabled='true' name='mname' value='<?php  echo $date->format('F j, Y');



 ?>' autofocus/></td>
			</tr>
		</table>
  <input type="hidden" id="state" value="1">
		<table id='paymentform'>
		        
		</table>
        
	</form>
	
</div>
<div id='clear'></div>
<?php
	if(isset($_POST['printtechnicalreportsdetail'])) {
		echo "<script>printPendingPaymentReceipt()</script>";
	}
?>