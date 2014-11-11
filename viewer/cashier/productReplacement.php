<?php 

    require_once "model/warranty.php";
    if(isset($_POST['serialNumber'])){
      $search = new Warranty();
      $info = $search->searchWarranty(sanitize($_POST['serialNumber']));
      $all =NULL;
      if($info){
	$all = $info;
      }else{
	$msg = "Not Found!";
	header("location: cashier.php?option=warranty&msg={$msg}");
      }
    }else{
	$msg = "Enter Seriall Number!";
	header("location: cashier.php?option=warranty&msg={$msg}");
    }


?>

<div id='adminleft'>
	<header id='accounttitle'>
		<p>Search product</p>
	</header>
	<table>
  <form method="POST" action="cashier.php?option=productreplacement">
		<tr>
			<td>Product serial</td>
		</tr>
		<tr>
			<td><input class='input' type='text' name='serialNumber' placeholder='Product serial' onfocus="if (this.placeholder == &#39;Product serial&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Product serial&#39;;}" autofocus required/></td>
		</tr>
		<tr>
		
				<td colspan='2'><input type='submit' class='fullinputbutton' name='openfilter' value='SEARCH' /></td>
			</form>
		</tr>
	</table>
	<header id='accounttitle'>
		<p>Product Info</p>
	</header>
<form method="POST" action="../mysystem/controller/cash_controller.php">>

	<table>
      <?php 
      if(isset($all)){
      foreach($all as $info){
      $date = new DateTime($info['purchaseDate']);
      ?>
      
<input type="hidden" name="action" value="replace">
<input type="hidden" name="target" value="serial">
<input type="hidden" name="productID" value="<?php echo $info['productID']; ?>">
<input type="hidden" name="oldserial" value="<?php echo $info['serialID']; ?>">
<input type="hidden" name="oldserialNum" value="<?php echo $info['serialNumber']; ?>">
<input type="hidden" name="selectedSerialID" value="<?php echo $info['selectedSerialID']; ?>">
		<tr>
      <td>Serial Number</td>
      </tr>
      <tr>
      <td><input class='input' disabled='true' type='text' name='f_name' value='<?php echo $info['productName']?>' autofocus required/></td>
      </tr>
      <tr>
			<td>Category</td>
      </tr>
      <tr>
      <td><input class='input' disabled='true' type='text' name='f_name' value='<?php echo $info['categoryName']?>' autofocus required/></td>
      </tr>
      <tr>
      <td>Model</td>
		</tr>
      <tr>
      <td><input class='input' disabled='true' type='text' name='f_name' value='<?php echo $info['model']?>' autofocus required/></td>
      </tr>
      <tr>
      <td>Serial</td>
      </tr>
		<tr>
      <td><input class='input' disabled='true' type='text' name='f_name' value='<?php echo $info['serialNumber']?>' autofocus required/></td>
      </tr>
      <tr>
      <td>Transaction Date</td>
      </tr>
      <tr>
      <td><input class='input' disabled='true' type='text' name='f_name' value='<?php echo $date->format('F j, Y'); ?>' autofocus required/></td>
      </tr>
      <tr>
      <td>Warranty</td>
      </tr>
      <tr>
      <td><input class='input' disabled='true' type='text' name='f_name' value='<?php echo $info['warranty']?> days' autofocus required/></td>
      </tr>
      <tr>
			<td>Available item on stock</td>
      </tr>
      <tr>
      <td>
      <?php $serials = $search->getAvailableSerial($info['productID']); ?>
      
      
      <select class='inputselect' name="newserialID">
      <?php if($serials){
	foreach($serials as $serial){
	  print_r($serial);
	  echo "<option value='{$serial['serialID']}'>{$serial['serialNumber']}</option>";
	}
      }else{
	echo "<option>No avaible serials on stock.</option>";
      } ?>
      </select>
      </td>
      </tr>
		<tr>
      <?php if($serials){
	if($info['isVoid'] ==1 ){?>
<td colspan='2'><input type='submit' disabled="true" class='fullinputbutton' name='replaceproduct' value='Warranty is Already Void!' /></td>	  
	<?php }else{?>
<td colspan='2'><input type='submit' class='fullinputbutton' name='replaceproduct' value='REPLACE PRODUCT' /></td>
	      <?php }} ?>
      <?php }}?>


      
      </form>
      </tr>
      </table>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>Sold products</p>
		<ul id='search'>
			<li><input type='text' name='search' value="Search Customer" onfocus="if (this.value == &#39;Search Customer&#39;) {this.value = &#39;&#39;;}" onblur="if (this.value == &#39;&#39;) {this.value = &#39;Search Customer&#39;;}"/></li>
			<li><a href='#' name='search'/></a></li>
		</ul>
		<ul id='productfilter'>
			<li>Sort by &nbsp; </li>
			<li>
				<select name='productfilter' class='inputselectproductfilter'>
					<option>Date</option>
					<option>Name</option>
				</select>
			</li>
			<li><a href='#' name='view'/></a></li>
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
      <?php include "listWarranty.php"; ?>
	</table>
	
</div>
<div id='clear'></div>

<?php
	if (isset($_POST['replaceproduct'])){
		echo "<script>replaceProduct()</script>";
	}
?>