<?php
	$categoryId = $_GET['category_id'];
	
	$goTo = new GetModel();
	
	$categoryName = $goTo -> getCategoryAttributes(1, $categoryId);
	$description  = $goTo -> getCategoryAttributes(2, $categoryId);
?>

<div id='adminleft'>
	<header id='accounttitle'>
		<p>Edit Category</p>
	</header>
	<table>

		<form method="POST" action="../mysystem/controller/exec_controller.php">
	  <input type="hidden" name="action" value="edit">
	  <input type="hidden" name="target" value="category">
	  <input type="hidden" name="categoryID" value="<?php echo $categoryId; ?> ">

			<tr>
				<td>Category name</td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='categoryName' value='<?php echo $categoryName; ?>' autofocus required/></td>
			</tr>
			<tr>
				<td>Description</td>
			</tr>
			<tr>
				<td><textarea class='textarea' name='description' autofocus required><?php echo $description; ?></textarea></td>
			</tr>
			<tr>
				<td colspan='2'>
					<input type='submit' class='inputbutton' name='cancel' value='CANCEL' formnovalidate />
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
	
		$catName = $_POST['category_name'];
		$des = $_POST['description'];

		if($catName == $categoryName) {
			
			$goTo = new UpdateModel();
			$isUpdated = $goTo -> updateCategory($categoryId, $catName, $des);
				
			if($isUpdated) {
				echo "<script>categoryUpdated()</script>";
			}

		} else {
			
			$goTo = new VerifyModel();
			$categoryNameIsNotBeingUsed = $goTo -> verifyIfCategoryNameIsNotBeingUsed($catName);
			
			if($categoryNameIsNotBeingUsed) {
				
				$goTo = new UpdateModel();
				$isUpdated = $goTo -> updateCategory($categoryId, $catName, $des);
					
				if($isUpdated) {
					echo "<script>categoryUpdated()</script>";
				}
			} else {
				echo "<script>alert('Category already exist!');</script>";
			}
		}
	} else if(isset($_POST['cancel'])) {
		echo "<script>manageCategory()</script>";
	}
?>