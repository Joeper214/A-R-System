<?php
	$goTo = new ConnectModel();
	$goTo -> connectToDatabase();
?>

<?php if(isset($_GET['msg'])){
  echo "<p style='color:red' ><b>".$_GET['msg']."</b></p>";
}
?>
<div id='adminleft'>
	<header id='accounttitle'>
		<p>Add Brand</p>
	</header>
	<table>

		<form method="POST" action="../mysystem/controller/exec_controller.php">
	  <input type="hidden" value="add" name="action">
	  <input type="hidden" value="brand" name="target">
			<tr>
				<td>Brand name</td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='brandName' placeholder='Brand name' onfocus="if (this.placeholder == &#39;Brand name&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Brand name&#39;;}" autofocus required/></td>
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
		<p>List of all Brands</p>
  <form method='POST'>
  <ul id='search'>
  <li><input type='text' class='searchinput' name='searchKey' placeholder='Search Brand'/></li>
  <li><button  type='submit' name='search' autofocus/><a></a></button></li>
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
	
		$brandName = $_POST['brand_name'];
		$availability = 1;
			
		$goTo = new VerifyModel();
		$brandNameIsNotBeingUsed = $goTo -> verifyIfBrandNameIsNotBeingUsed($brandName);
			
		if($brandNameIsNotBeingUsed) {
			
			$goTo = new InsertModel();
			$isInserted = $goTo -> insertIntoBrand($brandName);
			
			if($isInserted) {
				echo "<script>brandAdded()</script>";
			}
		} else {
			echo "<script>alert('Category name already exist!');</script>";
		}
	}
?>