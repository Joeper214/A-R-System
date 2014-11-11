<?php 
$serviceID = NULL;
if(isset($_GET['serviceID'])){
  $serviceID = $_GET['serviceID'];
  
  $get = new GetModel();
  $serviceInfo = $get->getServiceInfo($serviceID);

  if($serviceInfo){
  foreach($serviceInfo as $service){
    
    $serviceName = $service['serviceName'];
    $serviceRate = $service['serviceRate'];
    }
  }
}
?>


<div id='adminleft'>
	<header id='accounttitle'>
		<p>Edit Service</p>
	</header>
	<table>

  <form method='POST' action="../mysystem/controller/exec_controller.php">
   <input type="hidden" name="action" value="edit">
   <input type="hidden" name="target" value="service">
  
  <input type="hidden" value="<?php echo $serviceID; ?>" name="serviceID" >
			<tr>
				<td>Service name</td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='serviceName' value="<?php echo $serviceName ?>" autofocus required/></td>
			</tr>
			<tr>
				<td>Service rate</td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='serviceRate' value="<?php echo $serviceRate; ?>" autofocus required/></td>
			</tr>
			<tr>
				<td colspan='2'>
					<input class='inputbutton' type='submit' name='cancel' value='CANCEL' formnovalidate />
					<input class='inputbutton' type='submit' name='save' value='SAVE' />
				</td>
			</tr>
		</form>
	</table>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all services</p>
	<form method='POST'>
  <ul id='search'>
  <li><input type='text' class='searchinput' name='searchKey' placeholder='Search Consumable'/></li>
  <li><button  type='submit' name='search' autofocus/><a></a></button></li>
  </ul>
  </form>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle servicetabletitle' id='tabletitle' style='width: 65%;'>Service Name</th>
			<th class='listtitle'>Rate</th>
			<th class='listtitle'>Edit</th>
			<th class='listtitle'>Status</th>
		</tr>
	    <?php include "listService.php"; ?>
	</table>
	
</div>
<div id='clear'></div>
<?php


  /*
	if(isset($_POST['save'])) {
	    //chekc if exists
	  
	    $checker = $get->checkService($_POST['serviceName']);

	    if($checker){
	      	echo "<script>alert('Service name already exists!');</script>";
	      echo $id.$name.$rate;
		//	header("location: admin.php?option=manageservice");
	    }else{
	      $edit = new UpdateModel();
	      $id = $_POST['serviceID'];
	      $name = $_POST['serviceName'];
	      $rate = $_POST['serviceRate'];

	      $update = $edit->updateService($id,$name,$rate);
	      
	      if($update){
	      echo $id.$name.$rate;
		echo "<script>alert('Success!');</script>";
	      }
	      echo $id."  ".$name."  ".$rate;
	      echo "<script>alert('Update Failed!');</script>";
	    }
	
	
	} else if(isset($_POST['cancel'])) {
		echo "<script>manageService()</script>";
	}
  */
?>