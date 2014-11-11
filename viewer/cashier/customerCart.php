<div id='productleft'>
	<header id='accounttitle'>
		<p>Product Category</p>
	</header>
	<table>
		<form method='POST'>
			<ul>
				<li><a href='#'>View All</a></li>
				<li><a href='#'>Monitor</a></li>
				<li><a href='#'>Internal</a></li>
				<li><a href='#'>External</a></li>
				<li><a href='#'>Printer</a></li>
				<li><a href='#'>Computer Case</a></li>
				<li><a href='#'>UPS</a></li>
				<li><a href='#'>Laptop</a></li>
				<li><a href='#'>Notebook</a></li>
				<li><a href='#'>Tablets</a></li>
				<li><a href='#'>Consumables</a></li>
			</ul>
		</form>
	</table>
</div>

<div id='productright'>
	<header id='accounttitle'>
		<p>Cart</p>
	</header>
	<table id='productlisttable'>
		<tr>
			<th class='listtitle producttabletitle' id='tabletitle' style='width: 35%;'>Product name</th>
			<th class='listtitle'>Quantity</th>
			<th class='listtitle'>Change-Quantity</th>
			<th class='listtitle'>Price</th>
			<th class='listtitle'>Sub Total</th>
			<th class='listtitle'>Remove</th>
		</tr>
		
		<tr>
			<td class='list' id='productname'>ACER aspire Laptop</td>
			<td class='list stock'>1</td>
			<td class='list'><a class='changequantity' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Change quantity</em></a></td>
			<td class='list' id='price'>P 23,000.00</td>
			<td class='list' id='price'>P 23,000.00</td>
			<td class='list'><a class='remove' href='#'><em>Remove</em></a></td>
		</tr>
		<tr>
			<td class='list' id='productname'>Kingston 32GB Thumb Drive</td>
			<td class='list stock'>2</td>
			<td class='list'><a class='changequantity' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Change quantity</em></a></td>
			<td class='list' id='price'>P 1,250.00</td>
			<td class='list' id='price'>P 2,500.00</td>
			<td class='list'><a class='remove' href='#'><em>Remove</em></a></td>
		</tr>
		<tr>
			<td class='list' id='productname'>Canon Photo Paper</td>
			<td class='list stock'>3</td>
			<td class='list'><a class='changequantity' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Change quantity</em></a></td>
			<td class='list' id='price'>P 180.00</td>
			<td class='list' id='price'>P 540.00</td>
			<td class='list'><a class='remove' href='#'><em>Remove</em></a></td>
		</tr>
		<tr class='serviceacquiredtotal'>	
			<td colspan='4' class='list amountdue'>TOTAL</td>
			<td colspan='2' class='list'>: &nbsp; P 26,040.00</td>
		</tr>
	</table>
	
	<form method='POST' style='margin: 0 0 20px 0;'>
		<input style='width: 165px; border: none; float: right; margin: 5px 1px 5px 0px; border: 1px solid #fff; box-shadow: 0px 0px 1px #000;' type='submit' class='inputbutton' name='customerprocesspayment' value='PROCESS PAYMENT'/>
	</form>
	
	</br>
	<header id='accounttitle'>
		<p>List of all products</p>
		<ul id='search'>
			<li><input type='text' name='search' placeholder="Search Product" onfocus="if (this.placeholder == &#39;Search Product&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Search Product&#39;;}"/></li>
			<li><a href='#' name='search'/></a></li>
		</ul>
		<ul id='productfilter'>
			<li>Sort by &nbsp; </li>
			<li>
				<select name='productfilter' class='inputselectproductfilter'>
					<option>Name</option>
					<option>Rate</option>
				</select>
			</li>
			<li><a href='#' name='view'/></a></li>
		</ul>
	</header>

	<table id='productlisttable'>
		<tr>
			<th class='listtitle producttabletitle' id='tabletitle' style='width: 70%;'>Product name</th>
			<th class='listtitle'>Price</th>
			<th class='listtitle'>Stock</th>
			<th class='listtitle'>Buy</th>
		</tr>
		
		<tr>
			<td class='list' id='productname'>ACER aspire Laptop</td>
			<td class='list' id='price'>P 23,000.00</td>
			<td class='list stock'>15</td>
			<td class='list'><a class='addtocart' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Add to cart</em></a></td>
		</tr>
		<tr>	
			<td class='list' id='productname'>SAMSUNG 500GB sata HD</td>
			<td class='list' id='price'>P 3,500.00</td>
			<td class='list stock'>25</td>
			<td class='list'><a class='addtocart' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Add to cart</em></a></td>
		</tr>
		<tr>	
			<td class='list' id='productname'>Kingston 32GB Thumb Drive</td>
			<td class='list' id='price'>P 1,250.00</td>
			<td class='list stock'>35</td>
			<td class='list'><a class='addtocart' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Add to cart</em></a></td>
		</tr>
		<tr>	
			<td class='list' id='productname'>NEO External DVD</td>
			<td class='list' id='price'>P 1,000.00</td>
			<td class='list stock' style='color:red;'>0</td>
			<td class='list'><a disabled='true' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Add to cart</em></a></td>
		</tr>
		<tr>	
			<td class='list' id='productname'>HITACHI 320sata HD</td>
			<td class='list' id='price'>P 1,500.00</td>
			<td class='list stock'>13</td>
			<td class='list'><a class='addtocart' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Add to cart</em></a></td>
		</tr>
		<tr>	
			<td class='list' id='productname'>TOMADE computer case</td>
			<td class='list' id='price'>P 1,500.00</td>
			<td class='list stock'>7</td>
			<td class='list'><a class='addtocart' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Add to cart</em></a></td>
		</tr>
		<tr>	
			<td class='list' id='productname'>ASUS PL-MVS II</td>
			<td class='list' id='price'>P 7,500.00</td>
			<td class='list stock'>5</td>
			<td class='list'><a class='addtocart' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Add to cart</em></a></td>
		</tr>
		<tr>	
			<td class='list' id='productname'>Canon Photo Paper</td>
			<td class='list' id='price'>P 180.00</td>
			<td class='list stock'>35</td>
			<td class='list'><a class='addtocart' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Add to cart</em></a></td>
		</tr>
	</table>
	
	<?php
		require_once('customerAddToCartpopUp.php');
	?>
	
</div>
<div id='clear'></div>
<?php
	if(isset($_POST['customerprocesspayment'])) {
		echo "<script>customerProcessPayment()</script>";
	}
?>