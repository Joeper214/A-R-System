<?php
if(isset($_GET['transID'])){
  $get = new GetModel();
  $infos = $get->getTransInfo($_GET['transID']);
  foreach ($infos as $info){
    $date = new DateTime($info['dateRecorded']);
    $accountID = $info['accountID'];
}
?>

<div id='adminleft'>
	<header id='accounttitle' style='border-bottom: none;'>
		<a class='back' href='cashier.php?option=transactions' style='margin-bottom: -10px;'><em>Back</em></a>
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

		<tr>
			<td>Device Repaired</td>
		</tr>
		<tr>
   <td>

<?php 
      //      echo $_SESSION['customerID'];
      $devices = $get->getDevices($info['personID']);
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
$services = $get->getPaidServices($_GET['transID']);
 
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
				<td><input class='input' type='text' disabled='true' name='fnameasd' value='<?php  $attendantInfo = $get->getUserInfo_by_id($accountID);
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
	
</div>
<div id='clear'></div>