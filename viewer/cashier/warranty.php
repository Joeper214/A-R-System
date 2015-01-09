<?php 
if(isset($_GET['msg'])){
  echo "<h4 style='color:red'>".$_GET['msg']."</h4>";
}
?>

<div id='adminleft'>
	<header id='accounttitle'>
		<p>Search product</p>
	</header>
  <form method="POST" action="cashier.php?option=productreplacement">
 <!-- //  <input type="hidden" name="action" value="search">
  //<input type="hidden" name="target" value="warranty"> -->
  
		<table>
			<tr>
				<td>Serial Number</td>
			</tr>
			<tr>
				<td><input id="serialN" class='input' type='text' name="serialNumber" placeholder="Product serial" onfocus="if (this.placeholder == &#39;Product serial&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Product serial&#39;;}" required="true" /></td>
			</tr>
			<tr>	
				<td colspan='2'><input type="submit" onclick="productReplacement();" class='fullinputbutton' name='searchwarranty' value='SEARCH' /></td>
			</tr>
		</table>
	</form>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>Sold products</p>
	        <ul id='search'>
		<form method='POST'>
    <li>Search by: </li>
   <li><input type='text' class='searchinput' name='searchKey' placeholder='Search Customer'/></li>
   <li><button  type='submit' name='search' style="height: 30px;  width: 40px;" autofocus/><a></a></button></li>
   </form>
   </ul>
	        <ul id='productfilter'>
			<li>Sort by &nbsp; </li>

			<li>
                  <form method="POST">
				<select name='sortkey' class='inputselectproductfilter'>
					<option value="1">SerialNumber</option>
					<option value="2">Status</option>
					<option value="3">PurchaseDate</option>
				</select>
			</li>
    <li><button style="height: 30px;  width: 40px;" type="submit" name="sort"><a></a></button></form></li>

		</ul>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle warrantyproducttitle' id='tabletitle'>Serial Number</th>
			<th class='listtitle warrantybuyertitle left'>Buyer</th>
			<th class='listtitle'>Purchase Date</th>
			<th class='listtitle'>Warranty Ends</th>
			<th class='listtitle'>Status</th>
		</tr>
   <?php include "listWarranty.php";?>
	</table>
	
</div>
<div id='clear'></div>

<?php

	if (isset($_POST['searchwarranty'])){
	  if(isset($_POST['serialNumber'])){
	    //ob_start();
	    // header("cashier.php?option=productreplacement&id={$_POST['serialNumber']}");
	    }
	  //echo "<script>productReplacement({$_POST['serialNumber']})</script>";
	}
?>