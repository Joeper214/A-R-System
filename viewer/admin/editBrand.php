<?php
    $brandID = NULL;
    if(isset($_GET['brandID'])){
      $brandID = $_GET['brandID'];
      
      $goTo = new GetModel();
      
      $brandName = $goTo -> getBrandInfo(1, $brandID);
    }
?>

<div id='adminleft'>
	<header id='accounttitle'>
		<p>Edit Brand</p>
	</header>
	<table>

		<form method="POST" action="../mysystem/controller/exec_controller.php">
      	  <input type="hidden" name="action" value="edit">
	  <input type="hidden" name="target" value="brand">

	  <input type="hidden" value="<?php echo $brandID?>" name="brandID" >
			<tr>
				<td>Brand </td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='brandName' value='<?php echo $brandName; ?>' autofocus required/></td>
			</tr>
			<tr>
				<td colspan='2'>
<a href="admin.php?option=managebrand"  class='inputbutton'/> Cancel</a>
<input type='submit' class='inputbutton' name='save' value='SAVE' /></td>
			</tr>
		</form>
	</table>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all Brands</p>
	          <form method='POST'>
  <ul id='search'>
  <li><input type='text' class='searchinput' name='searchKey' placeholder='Search Brand'/></li>
  <li><button  type='submit' name='search' style="height: 30px;  width: 40px;" autofocus/><a></a></button></li>
  </ul>
  </form>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle categorytabletitle' id='tabletitle'>Brand Name</th>
			<th class='listtitle'>Edit</th>
			<th class='listtitle'>Status</th>
		</tr>
		
	  <?php include ("listBrand.php"); ?>
	</table>
	
</div>
<div id='clear'></div>
<?php
	if(isset($_POST['save'])) {
	  if(isset($_POST['brandName'])){
	    //check if exists
	    $checker = $goTo -> checkBrand($_POST['brandName']);
	    if($checker){
	      	echo "<script>alert('Brand name already exists!');</script>";
		header("location: admin.php?option=managecategory");
	    }else{
	      $edit = new UpdateModel();
	      $id = $_POST['brandID'];
	      $name = $_POST['brandName'];
	      $update = $edit -> updateBrandName($_POST['brandID'],$_POST['brandName']);
	      if($update){
	      echo "<script>alert('Success!')</script>";
	      }
	      echo "<script>alert('Update Failed!)</script>";
	    }
	   
	  }
 echo "<script>alert('Update Failed! $id $name)</script>";
	
	} else if(isset($_POST['cancel'])) {
		echo "<script>manageBrand()</script>";
	}
?>