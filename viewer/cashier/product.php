<?php
if(isset($_GET['id'])){
  $_SESSION['customerID'] = $_GET['id'];
}


$query = mysql_query("select * from category where categoryStatus = 1");



if(isset($_GET['fail'])){
    echo "<p style='color:red'><b>".$_GET['fail']."</b></p>";
}else if(isset($_GET['success'])){
    echo "<p style='color:green'><b>".$_GET['success']."</b></p>";
}
?>

<div id='productleft'>
	<header id='accounttitle'>
		<p>Product Category</p>
	</header>
	<table>
		<form method='POST'>
			<ul>
				<li><a href="cashier.php?option=product">View All</a></li>
    <?php while($row = mysql_fetch_assoc($query)){ ?>
    <li><a href="cashier.php?option=filter_product_by_catID&categoryID=<?php echo $row['categoryID']; ?>"><?php echo $row['categoryName']; ?></a></li>
     <?php
    }
  ?>
			</ul>
		</form>
	</table>
</div>

<div id='productright'>
	<header id='accounttitle'>
		<p>Cart</p>
	</header>

 <?php
   $cartQuery = mysql_query("select *, (c.quantity*c.price) AS 'subtotal' 
                             from cartdetail c, product p   
                             where processStatus = 0
                             AND  c.accountID = {$_SESSION['accountID']}
                             and c.productID = p.productID");
  ?>

	<table id='productlisttable'>
		<tr>
			<th class='listtitle producttabletitle' id='tabletitle' style='width: 35%;'>Product name</th>
			<th class='listtitle'>Quantity</th>
			<th class='listtitle'>Change-Quantity</th>
			<th class='listtitle'>Price</th>
			<th class='listtitle'>Sub Total</th>
  <th class='listtitle'>Remove</th>
		</tr>

  <?php if(isset($cartQuery)){ ?>
 
<?php
      $tot = NULL;
  while($cart = mysql_fetch_assoc($cartQuery)){
    $_SESSION['prodID'] = $cart['productID'];

    $cartID = $cart['cartDetailID'];
    setlocale(LC_MONETARY, 'en_US');
    $number = $cart['price'];
    $tot += $cart['subtotal'];
    $sub = $cart['subtotal'];
    $price = number_format($number, 2, '.', ',');
    $subtotal = number_format($sub, 2, '.', ',');
    $total = number_format($tot, 2, '.', ',');

    echo "   <tr class='serviceacquiredtotal'><td class='listtitle'> {$cart['productName']} </td>"; 
    echo "<td class='listtitle'> {$cart['quantity']} </td>"; 
    echo "<td class='listtitle'>";
    /*if($cart['productType'] == 1){
      echo "<a href='cashier.php?removeCart&cartID={$cart['cartDetailID']}' class='inputbutton' >Reset</a></td>";
      }else{ echo "*/
    echo " <a class='changequantity' href='javascript:popUpShow(\"change{$cartID}\",\"popUpInnerContainer\",\"bg{$cartID}\");'><em>Change quantity</em></a> </td>"; 
  
    echo "<td class='price'>  {$price} </td>"; 
    echo "<td class='price'> {$subtotal} </td>"; 
    echo "<td class='listtitle'><a class='remove' href='#' onclick='removeCart({$cart['cartDetailID']})'><em>Remove</em></td></tr>"; 
    
    include "changeQuantity.php";
  }
      if(isset($total)){

    echo "<tr class='serviceacquiredtotal'>

           <td colspan='4' class='list amountdue'>TOTAL &nbsp; :</td>
           <td class='list'> {$total}</td>
           <td class='list amountdue'></td>
          </tr>"; ?>
	</table>
    <?php if(isset($_SESSION['customerID'])){ ?>
<form method='POST' action="cashier.php?option=customerprocesspayment" style='margin: 0 0 20px 0;'>
    <?php }else{?>
<form method='POST' style='margin: 0 0 20px 0;'>
    <?php } ?>
		<input style='width: 165px; border: none; float: right; margin: 5px 1px 5px 0px; border: 1px solid #fff; box-shadow: 0px 0px 1px #000;' type='submit' class='inputbutton' name='customerprocesspayment' value='PROCESS PAYMENT'/>
	</form>


<?php 
  }else{
	echo "<tr class='serviceacquiredtotal'><td colspan='6' class='list'>No item on Cart</td></tr>	</table>";
      }
}else{?>
  
     <?php }?>
	</br>
	<header id='accounttitle'>
		<p>List of all products</p>

		<ul id='search'>
	          <form method='POST'>
			<li><input type='text' class='searchinput' name='searchKey' placeholder='Search Product'/ required="true"></li>
			<li><button  type='submit' name='search' autofocus/><a></a></button></li>
		</form>
		</ul>

		<ul id='productfilter'>
                 <form method="POST">
			<li>Sort by &nbsp; </li>
			<li>
				<select name='filter' class='inputselectproductfilter'>
					<option value="1" >Name</option>
					<option value="2" >Price</option>
				</select>
			</li>
			<li><button type="submit" name="sort"><a></a></button></li>
                 </form>
		</ul>
	</header>

	<table id='productlisttable'>
		<tr>
			<th class='listtitle producttabletitle' id='tabletitle' style='width: 70%;'>Product name</th>
		
			<th class='listtitle'>Price</th>
			<th class='listtitle'>Stock</th>
			<th class='listtitle'>Buy</th>
		</tr>
		
         <?php 
  include "listProduct.php";
         ?>
	
	</table>
	
	<?php
	  //require_once('addToCartpopUp.php');
	?>
	
</div>
<div id='clear'></div>
<?php
	if(isset($_POST['customerprocesspayment'])) {
		echo "<script>processPayment()</script>";
	}
?>
