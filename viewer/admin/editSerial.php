<?php
ob_start();
	$goTo = new ConnectModel();
	$goTo -> connectToDatabase();
$productID = NULL;

if(isset($_GET['productID'])){
  $productID = $_GET['productID'];
}else{
  header("location: admin.php?option=manageproduct");
}
?>

<div id='adminleft'>
	<header id='accounttitle'>
		<p>Add Serial</p>
	</header>
	<table>
		<form method='POST'>
  <input type="hidden" name="productID" value="<?php echo $productID; ?>">

  <?php if(isset($_GET['serial'])){ ?>
 <input type='hidden' name='edit' value="<?php echo $_GET['serial'] ?>">
    <?php } ?>
			<tr>
				<td>Serial Number</td>
			</tr>
			<tr>
				<td><input class='input' 
value="<?php if(isset($_GET['serial'])){
              echo $_GET['serial'];
       }?>"

type='text' name='serialNumber' placeholder='Serial Number' onfocus="if (this.placeholder == &#39;Category name&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Category name&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td colspan='2'>
					<input type='reset' class='inputbutton' name='cancel' value='CANCEL' />
					<input type='submit' class='inputbutton' name='save' value='SAVE' />
				</td>
			</tr>
		</form>
	</table>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all serial</p><p style="color:green"> 
	  <?php if(isset($_GET['msg'])){
	  echo $_GET['msg'];
	}?>

                 </p>
		<ul id='search'>
			<li><input type='text' name='search' placeholder="Search Category" onfocus="if (this.placeholder == &#39;Search Category&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Search Category&#39;;}"/></li>
			<li><a href='#' name='search'/></a></li>
		</ul>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle categorytabletitle' id='tabletitle'>Serial Number</th>
			<th class='listtitle'>Replace</th>
			<th class='listtitle'>Status</th>
		</tr>
	  <?php include("listSerial.php"); ?>		

	</table>
	
</div>
<div id='clear'></div>
<?php
	if(isset($_POST['save'])) {
	
		$serialNumber = $_POST['serialNumber'];
			
		$pID = $_POST['productID'];
		$availability = 1;
			
		$goTo = new VerifyModel();
		$isSerial = $goTo -> isSerialExist($serialNumber);
			
		if($isSerial) {
			
		  if(isset($_POST['edit'])){
		    $edit = new UpdateModel();
		    $isUpdated = $edit->updateSerial($_POST['edit'],$serialNumber);
		    //$reflectStock = $edit->updateStock($pID);
			  $msg = "{$serialNumber} has been updated!";
				header("location: admin.php?option=editserial&productID={$pID}&msg={$msg}");
		    
		  }else


			$goTo = new InsertModel();
			$edit = new UpdateModel();
			$isInserted = $goTo -> insertSerial($serialNumber, $pID, $availability);
			$edit -> updateStock($pID);
			
			if($isInserted) {
			  $msg = "{$serialNumber} has been addeed!";
				header("location: admin.php?option=editserial&productID={$pID}&msg={$msg}");
			}
		} else {
			echo "<script>alert('Serial already exist!');</script>";
		}
	}
?>