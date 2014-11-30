<?php

if(isset($_GET['categoryID'])){
  $catID = $_GET['categoryID'];
  $isEmpty = NULL;
  
  $query_by_id = mysql_query("SELECT * FROM product p, brand b
where b.brandID=p.brandID AND p.categoryID = $catID");
  while($row = mysql_fetch_assoc($query_by_id)){
    $check = new VerifyModel();
  $isAdded = $check->isAddedToCart($row['productID'],$_SESSION['accountID']);
  if($isAdded){
    
  }else{
?>
	<tr>
      <?php $isEmpty = $row['categoryID']; ?>
    <td class='list' id='productname'><?php echo $row['brandName']." ".$row['productName']; 
    if($row['productType'] == 1){
      $model = $check->checkModel($row['productID']);
      echo " ".$model;
    }else{
      
    }
?></td>
									    <td class='list' id='price'>  <?php 
    //setlocale(LC_MONETARY, 'en_US');
    //    echo money_format('%(#10n', $row['price']);
    echo  number_format($row['price'], 2, '.', ',');

?></td>
   <td class='list stock'><?php echo $row['stock']; ?></td>
	   <td class='list'>
<?php if($row['stock'] > 0){ ?>
<a class='addtocart' href='javascript:popUpShow("cont<?php echo $row['productID']?>","popUpInnerContainer","bg<?php echo $row['productID']?>");'><em>Add to cart</em></a>
			     <?php }else { echo "no stock."; } ?>
</td>	
<?php
include('addToCartpopUp.php');																								  
  }
  }
 if(isset($isEmpty)){

}else{ echo "<tr><td class='list' id='productname'>
          <b> No product in this category. </b> </td></tr>"; }
  
?>
<?php
  
}else{
  if(isset($_POST['search'])){
    $key = $_POST['searchKey'];
    $query = mysql_query("SELECT * FROM product p, brand b WHERE b.brandID=p.brandID 
                         AND p.productName LIKE '%$key%' ");
  }else if(isset($_POST['sort'])){
    if($_POST['filter'] == 1){      
    $query = mysql_query("SELECT * FROM product p, brand b 
    where b.brandID=p.brandID ORDER BY p.productName ASC");
    }else{
          $query = mysql_query("SELECT * FROM product p, brand b 
    where b.brandID=p.brandID ORDER BY p.price desc");

    }
  }else{
    $query = mysql_query("SELECT * FROM product p, brand b 
    where b.brandID=p.brandID");
  }

while($row = mysql_fetch_assoc($query)){

  $check = new VerifyModel();
  $isAdded = $check->isAddedToCart($row['productID'],$_SESSION['accountID']);
  if($isAdded){
  }else{
?>
	<tr>
      <td class='list' id='productname'><?php 
      echo $row['brandName']." ".$row['productName'];
   if($row['productType'] == 1){
     $model = $check->checkModel($row['productID']);
     echo " ".$model;
    }else{
      
    } ?>
    <td class='list' id='price'> <?php 
        setlocale(LC_MONETARY, 'en_US');
    //echo money_format('%(#10n', $row['price']);
    echo  number_format($row['price'], 2, '.', ',');?>
</td>
   <td class='list stock'><?php echo $row['stock'];?></td>
  <td class='list'><?php if($row['stock'] > 0){ ?>
<a class='addtocart' href='javascript:popUpShow("cont<?php echo $row['productID']?>","popUpInnerContainer<?php echo $row['productID']?>","bg<?php echo $row['productID']?>");'><em>Add to cart</em></a>
<?php }else { echo "no stock."; } ?>
</td>
      </tr>
<?php 
    include('addToCartpopUp.php');			
  }
}
}
?>