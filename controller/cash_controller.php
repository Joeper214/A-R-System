<?php 
ob_start();
session_start();
include "../database/pdo/sanitizer.php";
include "../database/pdo/db_connect.php";



class Commit{
  private $connector;
  
  public function __construct(){
    $this->connector = new DBConnector();
    $this->connector->connect();
  }

  public function commitAction($action, $target){
    if($action=="add"){      
      $this->commitAddAction($target);      
    }if($action=="edit"){
      $this->commitEditAction($target);
    }else if($action=="replace"){
      $this->commitReplaceAction($target);
    }else{
      echo "No ACTION!";
    }
  }

  private function commitAddAction($target){
    if($target=="cart"){
      $quantity = NULL;
      $prodType = NULL;
      
      require_once "../model/cart.php";
      $cart = new Cart();
      if(isset($_POST['cartDetailID'])){
	$cart->removeCart($_POST['cartDetailID']);
      }
      if($_POST['productType'] == 1){//Non-Consumable
	if(isset($_POST['serials'])){
	  $serials = $_POST['serials'];
	  //Get Quantity
	  foreach($serials as $serial){
	    $quantity++;
	  }
	  $cart_params = array(":productID"=>$_POST['productID'],
			       ":quantity"=>$quantity,
			       ":price"=>$_POST['price'],
			       ":processStatus"=>0,
			       ":accountID"=>$_POST['accountID']
			       );

	  $addCart = $cart->addToCart($cart_params);
	  $cartIDS = $cart->getLatestCart();//get Latest ID added to cart
	  foreach($cartIDS as $cartID){
	    $cartDetailID = $cartID['max(cartDetailID)'];
	  }
	  
	  foreach($serials as $serial){
	    $serial_params = array($cartDetailID,$serial);
	    $cart->selectSerials($serial_params);
	  }

	    if($addCart){
	       $msg = "successfully added to cart!";
	       header("location: ../cashier.php?option=product&success={$msg}");
	      //}
	    }else{
	      $msg = "add to cart failed!";
	      header("location: ../cashier.php?option=product&fail={$msg}");
	    }
	  
	}else{
	  //$msg = "Please Select a serial!";
	  //header("location: ../cashier.php?option=product&fail={$msg}");
	}
     
      }else{//Consumable
	if(isset($_POST['quantity'])&&($_POST['quantity']<=$_POST['stock'])&&($_POST['quantity']>0)){
	  $cart_params = array(":productID"=>$_POST['productID'],
			       ":quantity"=>sanitize($_POST['quantity']),
			       ":price"=>$_POST['price'],
			       ":processStatus"=>0,
			       ":accountID"=>$_POST['accountID']
			       );
	  $isAdded = $cart->addToCart($cart_params);
	  if($isAdded){
          $msg = "Product addded to cart!";
	  //print_r($cart_params);
	  header("location: ../cashier.php?option=product&success={$msg}");
	  }else{
          $msg = "Add failed!";
	  header("location: ../cashier.php?option=product&success={$msg}");
	  }
	}else{
	  $msg = "Invalid Quantity!";
	  header("location: ../cashier.php?option=product&fail={$msg}");
	}
      }
    }else if($target == "transaction"){
      $today = new DateTime();
      if(isset($_POST['carts'])){
	$cartDetails = $_POST['carts'];
      
         $names = array("fname"=>sanitize($_POST['fname']),
		       "mname"=>sanitize($_POST['mname']),
		       "lname"=>sanitize($_POST['lname']));

	$person_params = array(":fname"=>sanitize($_POST['fname']),
			       ":mname"=>sanitize($_POST['mname']),
			       ":lname"=>sanitize($_POST['lname']),
			       ":address"=>sanitize($_POST['address']),
			       ":number"=>sanitize($_POST['contact']),
			       ":type"=>1
			       );

	require_once "../model/account.php";
	$account = new Account();
	$personID = $account->checkPerson_getID($names);
	if($personID){
	  require_once "../model/cart.php";
	  $cart = new Cart();
	    $cart_params = array(":accountID"=>$_POST['attendant'],
				 ":personID"=>$personID,
				 ":transType"=>1,
				 ":date"=>$today->format('Y-m-d'),
				 ":amount"=>$_POST['total']);
	    print_r($cart_params);
	    $addtoCart = $cart->addTransaction($cart_params);
	    
	    $rows = $cart->getLatest();
	    foreach($rows as $row){
	      $transactionID = $row['max(transactionID)'];
	    }

    
	  foreach($cartDetails as $row){
	    //print_r($row);
	    echo $cartID = $row;
	    
	    $doesExists = $cart->getSelectedSerials($cartID);
	    
	    if($doesExists){//Waranty Operations add
	      foreach($doesExists as $selected){
		$warranty = $selected['warranty'];
		$date = new DateTime();
		$date->add(new DateInterval('P'.$warranty.'D'));
		echo $date->format('Y-m-d') . "\n";	
		
		$warranty_params = array(":selectedSerial"=>$selected['selectedSerialID'],
					 ":purchaseDate"=>$today->format('Y-m-d'),
					 ":warrantyEnds"=>$date->format('Y-m-d'),
					 ":personID"=>$personID
					 );
		$cart->addWarranty($warranty_params);
	      }
	      
	    }else{
	      
	    }
	    $update_params = array($transactionID,$cartID);
	    $updateCart = $cart->setTransactionID($update_params);
	  }

	    
	  
	  $msg = "Transaction Successful!";
	  header("location: ../cashier.php?option=product&success={$msg}");
	}else{
	  //insert new person
	  $newPerson = $account->addPerson($person_params);
	  if($newPerson){
	    $rows = $account->getLatest();
	    foreach($rows as $row){
	      $newpersonID = $row['max(personID)'];
	    }
	    $cart_params = array(":accountID"=>$_POST['attendant'],
				 ":personID"=>$newpersonID,
				 ":transType"=>1,
				 ":date"=>$today->format('Y-m-d'),
				 ":amount"=>$_POST['total']);
	    
	    require_once "../model/cart.php";
	    $cart = new Cart();
	    $addtoCart = $cart->addTransaction($cart_params);

	    $rows = $cart->getLatest();
	    foreach($rows as $row){
	      $transactionID = $row['max(transactionID)'];
	    }
	    
	    
	    foreach($cartDetails as $row){
	    //print_r($row);
	    echo $cartID = $row;
	    
	    $doesExists = $cart->getSelectedSerials($cartID);
	    
	    if($doesExists){//Waranty Operations add
	      foreach($doesExists as $selected){
		$warranty = $selected['warranty'];
		$date = new DateTime();
		$date->add(new DateInterval('P'.$warranty.'D'));
		echo $date->format('Y-m-d') . "\n";	
		
		$warranty_params = array(":selectedSerial"=>$selected['selectedSerialID'],
					 ":purchaseDate"=>$today->format('Y-m-d'),
					 ":warrantyEnds"=>$date->format('Y-m-d'),
					 ":personID"=>$newpersonID
					 );
		$cart->addWarranty($warranty_params);
	      }
	      
	    }else{
	      
	    }
	    $update_params = array($transactionID,$cartID);
	    $updateCart = $cart->setTransactionID($update_params);
	    }
	    
	  
	    $msg = "Transaction Successful!";
	    header("location: ../cashier.php?option=managecustomer&success={$msg}");
	  }
	  $msg = "Add Person Failed!";
	  header("location: ../cashier.php?option=managecustomer&fail={$msg}");
	}
      }
      $msg = "Transaction Successful!";
      header("location: ../cashier.php?option=product&success={$msg}");
    
    }else if($target == "technical"){
      $today = new DateTime();
      $tech_params = array($_POST['accountID'],$_POST['personID'],
			   2,$today->format('Y-m-d'),$_POST['total']); // add transaction
      require_once "../model/cart.php";
      $cart = new Cart();
      $addtoCart = $cart->addTransaction_tech($tech_params);
      
      $rows = $cart->getLatest();
      foreach($rows as $row){
	$transactionID = $row['max(transactionID)'];
      }
      $techs = $_POST['technicalID'];
      foreach($techs as $tech){
	$transac_params = array($transactionID,$tech);
	$updateTech = $cart->setTrans_tech_id($transac_params);
      }
      $msg = "Transaction Successful!";
      header("location: ../cashier.php?option=transactions&success={$msg}");
      
    }//else
  }
  
  private function commitEditAction($target){
    if($target == "cart"){
      require_once "../model/cart.php";
      $cart = new Cart();
      $prodType = NULL;
      $quantity = NULL;
     	if($_POST['productType'] == 1){//Non-Consumable
	
	  //$cart->removeCart($_POST['cartDetailID']);
	
	  if(isset($_POST['serials'])){
	    $serials = $_POST['serials'];
	    //Get Quantity
	    
	    foreach($serials as $serial){
	      $quantity++;
	      echo $serial."\n";
	    }
	    
	      $qnty = array($quantity,$_POST['cartDetailID']);
	      $isChanged = $cart->changeQuantity($qnty);
	      $reset = $cart->removeSelected($_POST['cartDetailID']);
	      
	      if($reset){
	      foreach($serials as $serial){
	      echo $serial_par = array($_POST['cartDetailID'],$serial);
	      echo $cart->selectSerials($serial_par);
	      }
	      $msg = "successfully updated  cart!";
	      header("location: ../cashier.php?option=product&success={$msg}");
	      }
	  
	}else{
	  $msg = "Please Select a serial!";
	  header("location: ../cashier.php?option=product&fail={$msg}");
	}
	
	}else{//Consumable
	  if(isset($_POST['quantity'])&&($_POST['quantity']<=$_POST['stock'])&&($_POST['quantity']>0)){
	    $qnty = array(sanitize($_POST['quantity']),$_POST['cartDetailID']);
	    $isChanged = $cart->changeQuantity($qnty);
	    if($isChanged){
	      $msg = "successfully change quantity!";
	      header("location: ../cashier.php?option=product&success={$msg}");
	    }else{
	      $msg = "change Failed!";
	      header("location: ../cashier.php?option=product&fail={$msg}");
	    }
	  }else{
	    $msg = "Invalid Quantity Entered!";
	    header("location: ../cashier.php?option=product&fail={$msg}");
	  }
	}
    }
  }//end edit
  
  public function commitReplaceAction($target){
    if($target == "serial"){
      //insert new serial and repace old
      require_once "../model/product.php";
      $warranty = new Product();
      $new_serial = array($_POST['newserialID'],$_POST["selectedSerialID"]);

      $isReplaced = $warranty->replaceSerial($new_serial,$_POST['oldserial']);
      //$reflect_stock = $warranty->
      //$return_serial = $warranty->returnDefective($_POST['oldserial']);
      $isUsed = $warranty->useSerial($_POST['newserialID'],$_POST['productID']);
      $serial_replace = array($_POST['oldserialNum'],$_POST['selectedSerialID']);
      print_r($new_serial);
      print_r($serial_replace);
      if($isReplaced&&$isUsed){
	$isInserted = $warranty->insertReplaced($serial_replace);
	
	if($isInserted){
	  $msg = "Serial Successfully Replaced and warranty status is void!";
	  header("location: ../cashier.php?option=warranty&msg={$msg}");
	}else{
	   $msg = "Serial replace failed!";
	   header("location: ../cashier.php?option=warranty&fail={$msg}");
	}
      }else{
	$msg = "Serial replace failed!";
	header("location: ../cashier.php?option=warranty&fail={$msg}");
      }
    }
  }//end Replace

}//end commit


 
  $commit = new Commit();
  
  if(count($_POST) > 0){
    $commit->commitAction(($_POST['action']), (($_POST['target'])));
  }else if(count($_GET) >0 ){
    $commit->commitAction(($_GET['action']), ($_GET['target']));
  }
  
?>