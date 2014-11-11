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
		<p>Add Category</p>
	</header>
	<table>
		<form method="POST" action="../mysystem/controller/exec_controller.php">
<input type="hidden" name="action" value="add">
<input type="hidden" name="target" value="category">

			<tr>
				<td>Category name</td>
			</tr>
			<tr>
				<td><input onkeydown="return isAlpha(event.keyCode)" class='input' type='text' name='categoryName' placeholder='Category name' onfocus="if (this.placeholder == &#39;Category name&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Category name&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Description</td>
			</tr>
			<tr>
				<td><textarea class='textarea' name='description' placeholder='Category description' onfocus="if (this.placeholder == &#39;Category description&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Category description&#39;;}" autofocus required></textarea></td>
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
		<p>List of all category</p>
	        <form method='POST'>
		<ul id='search'>
			<li><input type='text' class='searchinput' name='searchKey' placeholder='Search Category'/></li>
			<li><button  type='submit' name='search' autofocus/><a></a></button></li>
		</ul>
		</form>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle categorytabletitle' id='tabletitle'>Category Name</th>
			<th class='listtitle'>Edit</th>
			<th class='listtitle'>View</th>
			<th class='listtitle'>Status</th>
		</tr>
	  <?php include("listCategory.php"); ?>		

	</table>
	
</div>
<div id='clear'></div>
<?php
	if(isset($_POST['save'])) {
	
		$categoryName = $_POST['category_name'];
			
		$description = $_POST['description'];
		$availability = 1;
			
		$goTo = new VerifyModel();
		$categoryNameIsNotBeingUsed = $goTo -> verifyIfCategoryNameIsNotBeingUsed($categoryName);
			
		if($categoryNameIsNotBeingUsed) {
			
			$goTo = new InsertModel();
			$isInserted = $goTo -> insertIntoCategory($categoryName, $description, $availability);
			
			if($isInserted) {
				echo "<script>categoryAdded()</script>";
			}
		} else {
			echo "<script>alert('Category already exist!');</script>";
		}
	}
?>