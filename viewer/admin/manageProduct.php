<div id='adminleft'>
	<header id='accounttitle'>
		<p>Add Product</p>
	</header>
	<table>

<?php
   if(isset($_GET['type']) == 1){
     include "ConsumableForm.php";
  }else{
     include "non_consumableForm.php";
  }
?>




	</table>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all Consumable Products</p><p style="color:green"> 
	  <?php if(isset($_GET['msg'])){
	  echo $_GET['msg'];
	}?>

                 </p>
		<form method='POST'>
   <ul id='search'>
   <li><input type='text' class='searchinput' name='searchKey1' placeholder='Search Consumable'/></li>
   <li><button  type='submit' name='searchConsume' style="height: 30px;  width: 40px;" autofocus/><a></a></button></li>
   </ul>
   </form>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle producttabletitle' id='tabletitle'>Product Name</th>
			<th class='listtitle'>Stock</th> 
			<th class='listtitle'>Price</th>
			<th class='listtitle'>Mark-Defective</th>
			<th class='listtitle'>Add-Stock</th>
			<th class='listtitle'>Edit </th>
			<th class='listtitle'>View</th>
			<th class='listtitle'>Status</th>
		</tr>
		<?php include "listConsumables.php" ?>
	
		</tr>
	</table>
	
</div>
<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all Nonconsumable products</p><p style="color:green"> 
	  <?php if(isset($_GET['msgn'])){
	  echo $_GET['msgn'];
	}?>

                 </p>
		<form method='POST'>
   <ul id='search'>
   <li><input type='text' class='searchinput' name='searchKey2'  placeholder='Search Non-Consumable'/></li>
   <li><button  type='submit' name='searchNonConsume' style="height: 30px;  width: 40px;" autofocus/><a></a></button></li>
   </ul>
   </form>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle producttabletitle' id='tabletitle'>Product Name</th>

			<th class='listtitle'>Stock</th>
			<th class='listtitle'>Price</th>
			<th class='listtitle'>Manage-Serials</th>
			<th class='listtitle'>Edit </th>
			<th class='listtitle'>View</th>
			<th class='listtitle'>Status</th>
		</tr>
		<?php include "listProduct.php" ?>
	
		</tr>
	</table>
	
</div>

<div id='clear'></div>
<?php
	if(isset($_POST['save'])) {
		echo "<script>productAdded()</script>";
	}
?>