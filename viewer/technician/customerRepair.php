<?php

if(isset($_GET['id'])){
  $_SESSION['customerID'] = $_GET['id'];
}else if(isset($_SESSION['customerID'])){

}else{
  $err = "Please select or add a customer before acquiring a service";
  header("location: technician.php?option=managecustomer&err={$err}");
}



$get = new GetModel();
$personInfo = $get->getCustomerInfo($_SESSION['customerID']);
  foreach($personInfo as $person){
?>

<div id='adminleft'>
	<header id='accounttitle'>
		<p>Customer Information</p>
	</header>



		<table>
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


<td>Devices: </td>
                      </tr>
   
   <tr>
   <td>

<?php 
      //      echo $_SESSION['customerID'];
      $devices = $get->getDevices($_SESSION['customerID']);
    if($devices){
      foreach($devices as $device){
	
	echo "&nbsp; &nbsp; &nbsp;* ";
	echo $device['deviceName']."</br>";
      }
    }else{
      echo "no devices add yet.";
    }
?>

   </td>
   </tr>

   <tr><td>
<form method="post" action="../mysystem/controller/tech_controller.php">
       <input type="hidden" name="action" value="add">
       <input type="hidden" name="target" value="device">
       <input type="hidden" name="personID" value="<?php echo $_SESSION['customerID']?>">
   

<input id="device" class='input' type='text' name='device' placeholder='Enter Device Name here' onfocus="if (this.placeholder == &#39;Contact number&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Contact number&#39;;}" autofocus required></td></tr>
   <tr><td><input type="submit" class="inputbutton" value="add" > </td></tr>




		</table>
       <?php } ?>
	</form>



</div>

<div id='adminright'>
<?php
if(isset($_GET['msg'])){
  echo "<p style='color:green'>".$_GET['msg']."</p>";
}
    ?>

	<header id='accounttitle'>
		<p>List of all services</p>
	<!--	<ul id='search'>
			<li><input type='text' name='search'  placeholder="Search Service" onfocus="if (this.placeholder == &#39;Search Service&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Search Service&#39;;}"/></li>
			<li><a href='#' name='search'/></a></li>
		</ul>
		<ul id='productfilter'>
			<li>Sort by &nbsp; </li>
			<li>
				<select name='productfilter' class='inputselectproductfilter'>
					<option>Name</option>
					<option>Rate</option>
				</select>
			</li>
			<li><a href='#' name='view'/></a></li>
		</ul> -->
	</header>

	<table id='emplisttable'>
		<tr>
			<th class='listtitle servicetabletitle' id='tabletitle' style='width: 80%'>Service name</th>
			<th class='listtitle'>Rate</th>
			<th class='listtitle'>Repair</th>
		</tr>
		<tr>
	   <?php $query = mysql_query("select * from service where serviceStatus = 1");

   while ($row = mysql_fetch_assoc($query)){
	$Rate = number_format($row['serviceRate'], 2, '.', ',');
   ?>
   <td class='list' id='servicename'><?php echo $row['serviceName'];?></td>
   <td class='list' id='rate'>P <?php echo $Rate;?></td>
			<td class='list'><a class='repair' href='javascript:popUpShow("cont<?php echo $row['serviceID']; ?>","popUpInnerContainer","bg<?php echo $row['serviceID']; ?>");'><em>Apply repair</em></a></td>
		</tr>
   <?php 	include('repairAppliedPopUp.php'); } 
   ?>

	</table>
	
	<?php
	  //	require_once('customerRepairAppliedPopUp.php');
	?>

<header id='accounttitle'>
		<p>List of all applied services</p>
	</header>

	<table id='productlisttable'>
		<tr>
			<th class='listtitle' id='tabletitle' style='width: 10%'>Date</th>
			<th class='listtitle' id='tabletitle' style='width: 40%'>Service name</th>

			<th class='listtitle' id='tabletitle'>Device Name</th>
			<th class='listtitle' id='tabletitle' style='width: 15%'>Rate</th>
			<th class='listtitle' id='tabletitle' style='width: 10%'>Remove</th>
		</tr>
 <?php 
	    //	    echo $_SESSION['customerID'].$_SESSION['accountID'];
$services = $get->getServicesApplied($_SESSION['customerID'],$_SESSION['accountID']);
 
      if($services) {
	$tot = NULL;
      foreach($services as $service){
	$date = new DateTime($service['serviceDate']);
	$tot += $service['serviceRate'];
	$price = number_format($tot, 2, '.', ',');
	$serviceRate = number_format($service['serviceRate'], 2, '.', ',');
?>
		<tr>
	<td class='list' id='servicename'><?php echo $date->format('m/d/Y');?></td>
<td class='list' id='servicename'><?php echo $service['serviceName'];?></td>
<td class='list' id='rate'><?php echo $service['deviceName'];?></td>
<td class='list' id='rate'>P <?php echo $serviceRate;?></td>
<td class='list'><a class='remove' href='#' onclick="removeService('<?php echo $service['technicalID']?>');"><em>Apply repair</em></a></td>
		</tr>
							   <?php } ?>
<tr class='serviceacquiredtotal'>	
 <td class='list amountdue' >TOTAL &nbsp; :</td>
											 <td  colspan="3" class='list amountdue'>P <?php echo $price; ?>
</td> <td><a class='inputbutton' href='#' onclick="saveServices();">Save</a></td>
											 <input id="total" name="total" type="hidden" value="<?php echo $tot; ?>">
											    
											    </td>
			</tr>
<?php      }else {?>
	<tr><td></td><td> NO services applied yet.</td></tr>
      <?php } ?>
	</table>



</div>



<div id='clear'></div>