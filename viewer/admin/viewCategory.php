<?php
	$categoryId = $_GET['category_id'];
	
	$goTo = new GetModel();
	
	$categoryName = $goTo -> getCategoryAttributes(1, $categoryId);
	$description  = $goTo -> getCategoryAttributes(2, $categoryId);
	$categoryStatus  = $goTo -> getCategoryAttributes(3, $categoryId);
?>

<div id='adminleft'>
	<header id='accounttitle'>
		<p>Category Information</p>
	</header>
	<table>
		<tr>
			<td>Category name</td>
		</tr>
			<td><input class='input' disabled='true' type='text' name='f_name' value='<?php echo $categoryName; ?>' autofocus/></td>
		</tr>
		<tr>
			<td>Description</td>
		</tr>
		<tr>
			<td><textarea class='textarea' disabled='true' name='description' autofocus ><?php echo $description; ?></textarea></td>
		</tr>
		<tr>
			<td>Status</td>
		</tr>
		<tr>
			<td><input class='input' disabled='true' type='text' name='f_name' value='<?php
       if($categoryStatus == 1){
        echo 'Enabled';
}else{
        echo 'Disabled';
}
    ?>' autofocus/></td>
		</tr>
	</table>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all category</p>
<form method='POST'>
		<ul id='search'>
			<li><input type='text' class='searchinput' name='searchKey' placeholder='Search Category'/></li>
			<li><button  type='submit' name='search' style="height: 30px;  width: 40px;" autofocus/><a></a></button></li>
		</ul>
		</form>
                <ul></ul>
                <ul></ul>
		<ul id='addcategory'>
			<li><a href='admin.php?option=managecategory'/>&nbsp; ADD CATEGORY</a></li>
		</ul>
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