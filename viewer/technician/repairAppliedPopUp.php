<script type='text/javascript' src='script/moveable.js'></script>
<div class="popUpContainer" id="cont<?php echo $row['serviceID']; ?>">
    <div class="popUpHeader">
   <div class="popUpTitle"><?php echo $row['serviceName'];?></div>
        <div id="popUpCancel"><a href="javascript:popUpHide('cont<?php echo $row['serviceID']; ?>','bg<?php echo $row['serviceID']; ?>');"><em>Cancel</em></a></div>
    </div>
	<div class='popUpHeaderLine'></div>

    <div id="popUpInnerContainer">
		<form id='popUpForm' method='post' action="../mysystem/controller/tech_controller.php">
   <input type="hidden" name="action" value="add">
   <input type="hidden" name="target" value="technical">
   <input type="hidden" name="serviceID" value="<?php echo $row['serviceID'] ?>">
   <input type="hidden" name="serviceRate" value="<?php echo $row['serviceRate']?>">
   <input type="hidden" name="accountID" value="<?php echo $_SESSION['accountID']?>">
			<div class='popUpNote'>Check the device where the service is applied to</div>
			
			<div id='clear'></div>
			
			<div class='rate'>
				<label for='rate' >Rate</label>
				<input type='text' name='rate' id='rate' value='<?php echo $row['serviceRate']?>' disabled='true'/><br/>
			</div>
			
			<div id='clear'></div>
			
			<div class='serialContainer'>
				<label>Device Applied To</label><br/>
	<ul id='devicerepaired'>
    
   <?php 
   //   echo $_SESSION['customerID'].$row['serviceID'];
   $toApply = $get->getDevices($_SESSION['customerID'],$row['serviceID']);
   if($toApply){
     foreach($toApply as $apply){
       $isApplied = $get->isApplied($apply['deviceID'],$row['serviceID']);
       if($isApplied){
	 
       }else{
       ?>
	<li>
	 
       <input name="devices[]" type='checkbox' value=<?php echo $apply['deviceID']?> >
          
       <?php  echo $apply['deviceName']; ?>       </li>
	   <?php }}}else {echo "no devices added yet.";} ?>

        </ul>	
			</div>

			<div class='submit'>
				<input style='width: 125px;' type='submit' class='inputbutton' name='submit' value='APPLY SERVICE'/>
			</div>
			
			<div id='clear'></div>
		</form>
    </div>
</div>

<div class="popUpBackground" id="bg<?php echo $row['serviceID']; ?>"></div>

<?php
	if(isset($_POST['submit'])) {
		echo "<script>repairApplied()</script>";
	}
?>