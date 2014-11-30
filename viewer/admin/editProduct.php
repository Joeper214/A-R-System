<?php
ob_start();
$access = new GetModel();
$productID = NULL;

if(isset($_GET['productID'])){
  $productID = $_GET['productID'];
  $listProducts = $access ->getProductInfo($productID);
?>


<div id='adminleft'>
	<header id='accounttitle'>
		<p>Edit Product</p>
	</header>
	<table>
<?php 
  foreach ($listProducts as $product){
    include "editProductForm.php";
  }
      } ?>


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
   <li><button  type='submit' style="height: 30px;  width: 40px;" name='searchConsume' autofocus/><a></a></button></li>
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
		<p>List of all non-consumable products</p>

		<form method='POST'>
   <ul id='search'>
   <li><input type='text' class='searchinput' name='searchKey2' placeholder='Search Non-Consumable'/></li>
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

	} else if(isset($_POST['cancel'])) {
		echo "<script>manageProduct()</script>";
	}
?>