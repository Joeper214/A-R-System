<div id='adminleft'>
	<header id='accounttitle'>
		<p>Product Information</p>
	</header>
	<table>
		<form method='POST'>
			<tr>
				<td>Product</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' type='text' name='product_name' value='IMEI Keychain' autofocus required/></td>
			</tr>
			<tr>
				<td>Product type</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' type='text' name='productType' value='Consumables' autofocus required/></td>
			</tr>
			<tr>
				<td>Description</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' type='text' name='description' value='Plastic Keychain' autofocus required/></td>
			</tr>
			<tr>
				<td>Category</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' type='text' name='category' value='Consumables' autofocus required/></td>
			</tr>
			<tr>
				<td>Brand</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' type='text' name='brand' value='IMEI' autofocus required/></td>
			</tr>
			<tr>
				<td>Price</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' type='text' name='price' value='25.00' autofocus required/></td>
			</tr>
			<tr>
				<td>Stock</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' type='text' name='stock' value='15' autofocus required/></td>
			</tr>
			<tr>
				<td colspan='2'>
					<a class='buttonlink' style='text-align: center; line-height: 30px;' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'>DISPOSE DAMAGED CONSUMABLE</a>
				</td>
			</tr>
		</form>
	</table>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all products</p>
		<ul id='search'>
			<li><input type='text' name='search' placeholder="Search Product" onfocus="if (this.placeholder == &#39;Search Product&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Search Product&#39;;}"/></li>
			<li><a href='#' name='search'/></a></li>
		</ul>
		<ul id='addproduct'>
			<li><a href='admin.php?option=manageproduct'/>&nbsp; ADD PRODUCT</a></li>
		</ul>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle producttabletitle' id='tabletitle'>Product Name</th>
			<th class='listtitle'>Stock</th>
			<th class='listtitle'>Add-Stock</th>
			<th class='listtitle'>Replace</th>
			<th class='listtitle'>Edit-Serial</th>
			<th class='listtitle'>Edit</th>
			<th class='listtitle'>View</th>
			<th class='listtitle'>Status</th>
		</tr>
		<tr class='trlist'>	
			<td class='list' id='productname'>ACER aspire Laptop</td>
		<td class='list stock'>15</td>
		<td class='list'><a class='addstock' href='admin.php?option=addstock'><em>Add-stock<em></a></td>
		<td class='list'><a href='#'><em>Replace Damaged<em></a></td>
		<td class='list'><a class='edit' href='admin.php?option=editserial'><em>Edit-Serial<em></a></td>
		<td class='list'><a class='edit' href='admin.php?option=editProduct'><em>Edit</em></a></td>
		<td class='list'><a class='view' href='admin.php?option=viewProduct'><em>View</em></a></td>
			<td class='list'><a class='enabled' href='#'><em>Enabled</em></a></td>
		</tr>
		<tr>	
			<td class='list' id='productname'>SAMSUNG 500GB sata HD</td>
			<td class='list stock'>10</td>
			<td class='list'><a class='addstock' href='admin.php?option=addstock'><em>Add-stock<em></a></td>
			<td class='list'><a class='replace' href='admin.php?option=replaceDamaged'><em>Replace Damaged<em></a></td>
			<td class='list'><a class='edit' href='admin.php?option=editserial'><em>Edit-Serial<em></a></td>
			<td class='list'><a class='edit' href='admin.php?option=editProduct'><em>Edit</em></a></td>
			<td class='list'><a class='view' href='admin.php?option=viewProduct'><em>View</em></a></td>
			<td class='list'><a class='enabled' href='#'><em>Enabled</em></a></td>
		</tr>
		<tr>	
			<td class='list' id='productname'>Kingston 32GB Thumb Drive</td>
			<td class='list stock'>20</td>
			<td class='list'><a class='addstock' href='admin.php?option=addstock'><em>Add-stock<em></a></td>
			<td class='list'><a class='replace' href='admin.php?option=replaceDamaged'><em>Replace Damaged<em></a></td>
			<td class='list'><a class='edit' href='admin.php?option=editserial'><em>Edit-Serial<em></a></td>
			<td class='list'><a class='edit' href='admin.php?option=editProduct'><em>Edit</em></a></td>
			<td class='list'><a class='view' href='admin.php?option=viewProduct'><em>View</em></a></td>
			<td class='list'><a class='disabled' href='#'><em>Disabled</em></a></td>
		</tr>
		<tr>	
			<td class='list' id='productname'>NEO External DVD</td>
			<td class='list stock'>10</td>
			<td class='list'><a class='addstock' href='admin.php?option=addstock'><em>Add-stock<em></a></td>
			<td class='list'><a href='#'><em>Replace Damaged<em></a></td>
			<td class='list'><a class='edit' href='admin.php?option=editserial'><em>Edit-Serial<em></a></td>
			<td class='list'><a class='edit' href='admin.php?option=editProduct'><em>Edit</em></a></td>
			<td class='list'><a class='view' href='admin.php?option=viewProduct'><em>View</em></a></td>
			<td class='list'><a class='enabled' href='#'><em>Enabled</em></a></td>
		</tr>
		<tr>	
			<td class='list' id='productname'>HITACHI 320sata HD</td>
			<td class='list stock'>15</td>
			<td class='list'><a class='addstock' href='admin.php?option=addstock'><em>Add-stock<em></a></td>
			<td class='list'><a href='#'><em>Replace Damaged<em></a></td>
			<td class='list'><a class='edit' href='admin.php?option=editserial'><em>Edit-Serial<em></a></td>
			<td class='list'><a class='edit' href='admin.php?option=editProduct'><em>Edit</em></a></td>
			<td class='list'><a class='view' href='admin.php?option=viewProduct'><em>View</em></a></td>
			<td class='list'><a class='enabled' href='#'><em>Enabled</em></a></td>
		</tr>
		<tr>	
			<td class='list' id='productname'>TOMADE computer case</td>
			<td class='list stock'>15</td>
			<td class='list'><a class='addstock' href='admin.php?option=addstock'><em>Add-stock<em></a></td>
			<td class='list'><a class='replace' href='admin.php?option=replaceDamaged'><em>Replace Damaged<em></a></td>
			<td class='list'><a class='edit' href='admin.php?option=editserial'><em>Edit-Serial<em></a></td>
			<td class='list'><a class='edit' href='admin.php?option=editProduct'><em>Edit</em></a></td>
			<td class='list'><a class='view' href='admin.php?option=viewProduct'><em>View</em></a></td>
			<td class='list'><a class='enabled' href='#'><em>Enabled</em></a></td>
		</tr>
		<tr>	
			<td class='list' id='productname'>ASUS PL-MVS II</td>
			<td class='list stock'>25</td>
			<td class='list'><a class='addstock' href='admin.php?option=addstock'><em>Add-stock<em></a></td>
			<td class='list'><a class='replace' href='admin.php?option=replaceDamaged'><em>Replace Damaged<em></a></td>
			<td class='list'><a class='edit' href='admin.php?option=editserial'><em>Edit-Serial<em></a></td>
			<td class='list'><a class='edit' href='admin.php?option=editProduct'><em>Edit</em></a></td>
			<td class='list'><a class='view' href='admin.php?option=viewProduct'><em>View</em></a></td>
			<td class='list'><a class='disabled' href='#'><em>Disabled</em></a></td>
		</tr>
		<tr>	
			<td class='list' id='productname'>IMEI plastic Keychain</td>
			<td class='list stock'>15</td>
			<td class='list'><a class='addstock' href='admin.php?option=addConsumableStock'><em>Add-stock<em></a></td>
			<td class='list'><a href='#'><em>Replace Damaged<em></a></td>
			<td class='list'><a href='#'><em>Edit-Serial<em></a></td>
			<td class='list'><a class='edit' href='admin.php?option=editConsumable'><em>Edit</em></a></td>
			<td class='list'><a class='view' href='admin.php?option=viewConsumable'><em>View</em></a></td>
			<td class='list'><a class='disabled' href='#'><em>Disabled</em></a></td>
		</tr>
	</table>
	
	<?php
		require_once('disposePopUp.php');
	?>
	
</div>
<div id='clear'></div>