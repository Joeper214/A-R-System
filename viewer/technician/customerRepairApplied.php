<div id='adminleft'>
	<header id='accounttitle'>
		<p>Customer Information</p>
	</header>
	<form method='POST'>
		<table>
			<tr>
				<td>First name</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' style='width: 255px;' type='text' name='fname' value='Zahra Fatma' autofocus/></td>
			</tr>
			<tr>
				<td>Middle name</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' style='width: 255px;' type='text' name='mname' value='Mohammad' autofocus/></td>
			</tr>
			<tr>
				<td>Last name</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' style='width: 255px;' type='text' name='lname' value='Alsharief' autofocus/></td>
			</tr>
			<tr>
				<td>Address</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' style='width: 255px;' type='text' name='address' value='005-Fishville, MSU-Marawi City' autofocus/></td>
			</tr>
			<tr>
				<td>Contact number</td>
			</tr>
			<tr>
				<td><input class='input' disabled='true' style='width: 255px;' type='text' name='contact' value='09359360836' autofocus/></td>
			</tr>
			<tr>
				<td>Device Repaired</td>
			</tr>
			<tr>
				<td><textarea class='textarea2' name='deviceserviced' autofocus required/>Acer Aspire 4736Z</textarea></td>
			</tr>
		</table>
		<table id='serviceacquired'>
			<tr>
				<th id='serviceacquiredname'>Service acquired</th>
				<th id='removeservice'>Remove</th>
			</tr>
			<tr>
				<td id='serviceacquiredname'>Format / Reformat</td>
				<td><a class='remove' href='#'></a></td>
			</tr>
			<tr class='serviceacquiredtotal'>
				<td class='amountdue'>TOTAL &nbsp; :</td>
				<td style='width: 40%;'>P 400.00</td>
			</tr>
		</table>
		<table id='repairbuttons'>
			<tr>
				<td colspan='2' style='float: right;' >
					<input type='submit' class='inputbutton' name='cancel' value='CANCEL' formnovalidate />
					<input type='submit' class='inputbutton' name='save' value='SAVE' />
				</td>
			</tr>
		</table>
	</form>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all services</p>
		<ul id='search'>
			<li><input type='text' name='search' value="Search Service" onfocus="if (this.value == &#39;Search Service&#39;) {this.value = &#39;&#39;;}" onblur="if (this.value == &#39;&#39;) {this.value = &#39;Search Service&#39;;}"/></li>
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

	<table id='emplisttable'>
		<tr>
			<th class='listtitle servicetabletitle' id='tabletitle' style='width: 80%'>Service name</th>
			<th class='listtitle'>Rate</th>
			<th class='listtitle'>Applied</th>
		</tr>
		<tr>
			<td class='list' id='servicename'>Check up</td>
			<td class='list' id='rate'>P 195.00</td>
			<td class='list'><a class='serviceapplied' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Apply repair</em></a></td>
		</tr>
		<tr>
			<td class='list' id='servicename'>General repair</td>
			<td class='list' id='rate'>P 300.00</td>
			<td class='list'><a class='serviceapplied' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Apply repair</em></a></td>
		</tr>
		<tr>
			<td class='list' id='servicename'>Format / Reformat</td>
			<td class='list' id='rate'>P 400.00</td>
			<td class='list'><a class='serviceapplied' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Apply repair</em></a></td>
		</tr>
		<tr>
			<td class='list' id='servicename'>Laptop No Display</td>
			<td class='list' id='rate'>P 300.00</td>
			<td class='list'><a class='serviceapplied' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Apply repair</em></a></td>
		</tr>
		<tr>
			<td class='list' id='servicename'>Laptop Charger</td>
			<td class='list' id='rate'>P 250.00</td>
			<td class='list'><a class='serviceapplied' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Apply repair</em></a></td>
		</tr>
		<tr>
			<td class='list' id='servicename'>Installation</td>
			<td class='list' id='rate'>P 300.00</td>
			<td class='list'><a class='serviceapplied' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Apply repair</em></a></td>
		</tr>
		<tr>
			<td class='list' id='servicename'>Monitor below 15 inch</td>
			<td class='list' id='rate'>P 550.00</td>
			<td class='list'><a class='serviceapplied' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Apply repair</em></a></td>
		</tr>
		<tr>
			<td class='list' id='servicename'>Monitor above 16 inch</td>
			<td class='list' id='rate'>P 750.00</td>
			<td class='list'><a class='serviceapplied' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Apply repair</em></a></td>
		</tr>
		<tr>
			<td class='list' id='servicename'>Printer cleaning</td>
			<td class='list' id='rate'>P 200.00</td>
			<td class='list'><a class='serviceapplied' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Apply repair</em></a></td>
		</tr>
		<tr>
			<td class='list' id='servicename'>Printer reset</td>
			<td class='list' id='rate'>P 350.00</td>
			<td class='list'><a class='serviceapplied' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Apply repair</em></a></td>
		</tr>
		<tr>
			<td class='list' id='servicename'>Printer Continuous ink supply system installation</td>
			<td class='list' id='rate'>P 200.00</td>
			<td class='list'><a class='serviceapplied' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Apply repair</em></a></td>
		</tr>
		<tr>
			<td class='list' id='servicename'>Printer paper jam</td>
			<td class='list' id='rate'>P 450.00</td>
			<td class='list'><a class='serviceapplied' href='javascript:popUpShow("popUpContainer","popUpInnerContainer","popUpBackground");'><em>Apply repair</em></a></td>
		</tr>
	</table>
	
	<?php
		require_once('customerRepairAppliedPopUp.php');
	?>
	
</div>
<div id='clear'></div>
<?php
	if(isset($_POST['save'])) {
		echo "<script>customerRepairSaved()</script>";
	} else if(isset($_POST['cancel'])) {
		echo "<script>customerRepair()</script>";
	}
?>