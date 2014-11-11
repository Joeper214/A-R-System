<?php 
ob_start();
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
    }if($action=="search"){
      $this->commitSearchAction($target);
    }else{
      echo "No ACTION!";
    }
  }
    
    
    private function commitAddAction($target){
      if($target=="account"){
	$names = array("fname"=>sanitize($_POST['fname']),
		       "mname"=>sanitize($_POST['mname']),
		       "lname"=>sanitize($_POST['lname']));

	$person_params = array(":fname"=>sanitize($_POST['fname']),
			       ":mname"=>sanitize($_POST['mname']),
			       ":lname"=>sanitize($_POST['lname']),
			       ":address"=>sanitize($_POST['address']),
			       ":number"=>sanitize($_POST['number']),
			       ":type"=>0
			       );
	
	require_once "../model/account.php";

	$account = new Account();
	$success = $account->addPerson($person_params);

	if($success){
	  $rows = $account->getLatest();

	  foreach($rows as $row){
	    $personID = $row['max(personID)'];
	  }
	  $bday = new DateTime($_POST['da']);
	  $dateReg = new DateTime();
	  $employee_params = array(":personID"=>$personID,
				   ":gender"=>sanitize($_POST['gender']),
				   ":bday"=>$bday->format('Y-m-d'),
				   ":birthPlace"=>sanitize($_POST['birthPlace']),
				   ":religion"=>sanitize($_POST['religion']),
				   ":dateReg"=>$dateReg->format('Y-m-d'),
				   ":position"=>sanitize($_POST['position']));
				   
	  $employee = $account->addEmployee($employee_params);
	  if($employee){	    
	    $msg = "Add Employee Successful!";
	    header("Location: ../admin.php?option=manageemployee&msg={$msg}"); 
	    //echo $msg;
	  }else{
	    $msg = "Add Employee failed!";
	    header("Location: ../admin.php?option=manageemployee&msg={$msg}");
	    //employee failed
	    //echo $msg;
	  }
	}else{
	    $msg = "Add person failed!";
	    header("Location: ../admin.php?option=manageemployee&msg={$msg}");
	    //echo $msg;
	  //person failed
	}

      }else if($target == "product"){//Add product 
	$productName = sanitize($_POST['productName']);
	$product_params = array(":productName"=>$productName,
				":productType"=>sanitize($_POST['productType']),
				":description"=>sanitize($_POST['description']),
				":categoryID"=>sanitize($_POST['categoryID']),
				":brandID"=>sanitize($_POST['brandID']),
				":price"=>sanitize($_POST['price']),
				":stock"=>sanitize($_POST['stock'])
				);
      if($_POST['productType'] == 1){
	require_once "../model/product.php";
	
	$product = new Product();
	$success = $product->addProduct($product_params,$productName);
	$rows = $product->getLatest();
	foreach($rows as $row){
	  $productID = $row['max(productID)'];
	}
	  if($success){
	    $model = sanitize($_POST['model']);
	    $warranty = sanitize($_POST['warranty']);
	    $nonconsumable = $product->addNonconsumable($productID,$model,$warranty);
	      if($nonconsumable){
	     $msg = "Add Non-Consumable Product Successful!";
	     header("Location: ../admin.php?option=manageproduct&msgn={$msg}");
	      }


	  }else{
	    $msg = "Add Non-Consumable Product Failed!";
	    header("Location: ../admin.php?option=manageproduct&msg={$msg}");
	  }
	
      }else{
	require_once "../model/product.php";
	$product = new Product();
	$success = $product->addProduct($product_params,$productName);

	if($success){
	  $msg = "Add Consumable Product Successful!";
	  header("Location: ../admin.php?option=manageproduct&msg={$msg}");
	}else{
	  $msg = "Add Consumable Product Failed!";
	    header("Location: ../admin.php?option=manageproduct&msg={$msg}");
	}

      }
      }else if($target == "service"){
	require_once "../model/service.php";
	if(isset($_POST['serviceName'])){
	  $serviceName =  (sanitize($_POST['serviceName']));
	  
	  $service_params = array(":serviceName"=>$serviceName,
	                          ":serviceRate"=>sanitize($_POST['serviceRate']),
				  ":serviceStatus"=>1
				  );
	  
	  $product = new Service();
	  
	  $doesExists = $product->isServiceExist($serviceName);
	if($doesExists){
	  $msg = "{$serviceName} Already Exists!";
	  header("Location: ../admin.php?option=manageservice&failed={$msg}");
	}else{
	  $success = $product->addService($service_params);
	  if($success){
	    $msg = "{$serviceName} has been successfully added!";
	    header("Location: ../admin.php?option=manageservice&success={$msg}");
	  }
	  
	}
	}
	
      }else if($target=="brand"){
	require_once "../model/brand.php";
	if(isset($_POST['brandName'])){
	  $brandName = sanitize($_POST['brandName']);

	$brand_params = array(":brandName"=>$brandName,
			      ":brandStatus"=>1);

	$brand = new Brand();
	$doesExist = $brand->is_addBrandExist($brandName);
	if($doesExist) {
	  $msg = "{$brandName} Already Exists!";
	  header("Location: ../admin.php?option=managebrand&msg={$msg}");
	}else{
	  $success = $brand->addBrand($brand_params,$brandName);
	  if($success){
	    $msg = "{$brandName} has been successfully added!";
	    header("Location: ../admin.php?option=managebrand&msg={$msg}");
	  }else{
	    $msg = "{$brandName} add failed!";
	    header("Location: ../admin.php?option=managebrand&msg={$msg}");
	  }
	}
	}
      }else if($target == "category"){// Add Category
	require_once "../model/category.php";
	if(isset($_POST['categoryName'])){
	  $catName = sanitize($_POST['categoryName']);
	  
	  $category_params = array(":categoryName"=>$catName,
				":categoryDesc"=>sanitize($_POST['description']),
				":categoryStatus"=>1);
	  
	  $category = new Category();
	  $doesExist = $category->is_addCategoryExist($catName);
	  if($doesExist) {
	    $msg = "{$catName} Already Exists!";
	    header("Location: ../admin.php?option=managecategory&msg={$msg}");
	  }else{
	    $success = $category->addCategory($category_params);
	    if($success){
	      $msg = "{$catName} has added successfuly!";
	      header("Location: ../admin.php?option=managecategory&msg={$msg}");
	    }else{
	      $msg = "{$catName} add failed!";
	      header("Location: ../admin.php?option=managecategory&msg={$msg}"); 
	    }
	  }
	}
      }else if($target == "stock"){
	if(isset($_POST['quantity'])&&isset($_POST['productID'])){
	  require_once "../model/product.php";
	  $product = new Product();
	  $stock_params = array($_POST['quantity'],$_POST['productID']);
	  $success = $product->addStock($stock_params);
	  if($success){
	      $msg = "add success!";
	      header("Location: ../admin.php?option=manageproduct&msg={$msg}"); 
	  }else{
	    $msg = " add failed!";
	    header("Location: ../admin.php?option=manageproduct&msg={$msg}");
	  }
	}else{
	  
	}
      }else if($target == "customer"){
         $names = array("fname"=>sanitize($_POST['fname']),
		       "mname"=>sanitize($_POST['mname']),
		       "lname"=>sanitize($_POST['lname']));

	$person_params = array(":fname"=>sanitize($_POST['fname']),
			       ":mname"=>sanitize($_POST['mname']),
			       ":lname"=>sanitize($_POST['lname']),
			       ":address"=>sanitize($_POST['address']),
			       ":number"=>sanitize($_POST['number']),
			       ":type"=>1
			       );
	
	require_once "../model/account.php";
	$account = new Account();
	$personID = $account->checkPerson_getID($names);
	if($personID){
	  $msg = " {$_POST['lname']} Already Exists!";
	  header("Location: ../cashier.php?option=managecustomer&fail={$msg}");
	}else{
	  $success = $account->addPerson($person_params);
	  if($success){
	    $msg = "{$_POST['lname']} add Success!";
	    header("Location: ../cashier.php?option=managecustomer&msg={$msg}");
	  }else{
	    $msg = "{$_POST['lname']} add failed!";
	    header("Location: ../cashier.php?option=managecustomer&msg={$msg}");
	  }
	}
      
      }//else
      
    }//End Add action

    private function commitEditAction($target){
      if($target == "customer"){ 
	$person_params = array(sanitize($_POST['fname']),
			       sanitize($_POST['mname']),
			       sanitize($_POST['lname']),
			       sanitize($_POST['address']),
			       sanitize($_POST['number']),
			       ($_POST['personID']));
	require_once "../model/account.php";
	$user = new Account();
	print_r($person_params);
	echo $isEdit = $user->editPerson($person_params);

	if($_POST['user'] == "cashier"){
	  $msg="{$_POST['lname']} has been Successfully Edited";
	  header("Location: ../cashier.php?option=managecustomer&msg={$msg}");
	}else if($_POST['user'] == "technician"){
	  $msg="{$_POST['lname']} has been Successfully Edited";
	  header("Location: ../technician.php?option=managecustomer&msg={$msg}");
	}
      }else if($target == "user"){
	$names = array(":fname"=>sanitize($_POST['fname']),
		       ":mname"=>sanitize($_POST['mname']),
		       ":lname"=>sanitize($_POST['lname']));
	
	$person_params = array(sanitize($_POST['fname']),
			       sanitize($_POST['mname']),
			       sanitize($_POST['lname']),
			       sanitize($_POST['address']),
			       sanitize($_POST['number']),
			       ($_POST['pID']));
	


	require_once "../model/account.php";
	$user = new Account();
	$isEdit = $user->editPerson($person_params);

	if($isEdit){
	  $bday = new DateTime($_POST['da']);
	  $dateReg = new DateTime();
	  $employee_params = array(":gender"=>sanitize($_POST['gender']),
				   ":bday"=>$bday->format('Y-m-d'),
				   ":birthPlace"=>sanitize($_POST['birthPlace']),
				   ":religion"=>sanitize($_POST['religion']),
				   ":dateReg"=>$dateReg->format('Y-m-d'),
				   ":position"=>sanitize($_POST['position']),
				   ":personID"=>($_POST['pID'])
				   );

	  $isEditEmployee = $user->updateEmployee($employee_params);
	  if($isEditEmployee){
	    $msg = "edit Employee Successful!";
	    header("Location: ../admin.php?option=manageemployee&msg={$msg}");
	  }else{
	    
	    $msg = "edit Employee Failed!";
	    header("Location: ../admin.php?option=manageemployee&msg={$msg}");
	  }
	}else{
	    $msg = "edit  Person Failed!";
	    header("Location: ../admin.php?option=manageemployee&msg={$msg}");
	  //system error
	}


      }else if($target=="product"){
	require_once "../model/product.php";
	$product = new Product();

	if(isset($_POST['stock'])){
	  $stock = sanitize ($_POST['stock']);
	}
	  $product_params = array(sanitize($_POST['productName']),
				  sanitize($_POST['productDescription']),
				  $_POST['categoryID'],
				  $_POST['brandID'],
				  sanitize($_POST['price']),
				  $stock,
				  $_POST['productID']);

	  $noncomsumable_params = array(sanitize($_POST['model']),
					sanitize($_POST['warranty']),
					$_POST['productID']);
	  
	  $edited = $product -> updateProduct($product_params);
	  if($_POST['productType'] == 1){
	  $non = $product -> updateNoncosumable($noncomsumable_params);
	  }
	  
	  if($edited){
	    $msg = "{$_POST['productName']} has been successfully edited";
	     header("Location: ../admin.php?option=manageproduct&msg={$msg}");
	  }else{
	    $msg = "{$_POST['productName']} edit failed!";
	     header("Location: ../admin.php?option=manageproduct&msg={$msg}");
	  }
      }else if($target == "service"){
	require_once "../model/service.php";
	$service = new Service();
	
	if(isset($_POST['serviceName'])){
	  $isExist  = $service->isServiceExist($_POST['serviceName'],$_POST['serviceID']);
	  $serviceParams = array(sanitize($_POST['serviceName']),
				 sanitize($_POST['serviceRate']),
				 $_POST['serviceID']);
	  if($isExist){
	    $msg = "{$_POST['serviceName']} Already Exists!!";
	     header("Location: ../admin.php?option=manageservice&msg={$msg}");
	  }else{
	    $isUpdated = $service->updateService($serviceParams);
	    if($isUpdated){
	      $msg = "{$_POST['serviceName']} edit success!";
	     header("Location: ../admin.php?option=manageservice&msg={$msg}");
	    }else{
	      $msg = "{$_POST['serviceName']} edit Failed!!";
	     header("Location: ../admin.php?option=manageservice&msg={$msg}");
	    }
	    
	  }
	}

      }else if($target == "brand"){
	
	require_once "../model/brand.php";
	$brand = new Brand();
	
	if(isset($_POST['brandName'])){
	  $isExist  = $brand->isBrandExist($_POST['brandName'],$_POST['brandID']);
	  $brandParams = array(sanitize($_POST['brandName']),
				 $_POST['brandID']);
	  
	  if($isExist){
	    $msg = "{$_POST['brandName']} Already Exists!!";
	        header("Location: ../admin.php?option=managebrand&msg={$msg}");
	  }else{
	    $isUpdated = $brand->updateBrand($brandParams);
	    if($isUpdated){
	      $msg = "{$_POST['brandName']} edit success!";
	      print_r($categoryParams);
	       header("Location: ../admin.php?option=managebrand&msg={$msg}");
	    }else{
	      $msg = "{$_POST['brandName']} edit Failed!!";
	      header("Location: ../admin.php?option=managebrand&msg={$msg}");
	    }
	    
	  }
	}

	
      }else if($target == "category"){
	require_once "../model/category.php";
	$category = new Category();
	
	if(isset($_POST['categoryName'])){
	  $isExist  = $category->isCategoryExist($_POST['categoryName'],$_POST['categoryID']);
	  $categoryParams = array(sanitize($_POST['categoryName']),
				 sanitize($_POST['description']),
				 $_POST['categoryID']);
	  
	  if($isExist){
	    $msg = "{$_POST['categoryName']} Already Exists!!";
	        header("Location: ../admin.php?option=managecategory&msg={$msg}");
	  }else{
	    $isUpdated = $category->updateCategory($categoryParams);
	    if($isUpdated){
	      $msg = "{$_POST['categoryName']} edit success!";
	      print_r($categoryParams);
	       header("Location: ../admin.php?option=managecategory&msg={$msg}");
	    }else{
	      $msg = "{$_POST['categoryName']} edit Failed!!";
	      header("Location: ../admin.php?option=managecategory&msg={$msg}");
	    }
	    
	  }
	}	
      }else if($target == "stock"){
	if(isset($_POST['productID'])){
	  if(isset($_POST['quantity']) && $_POST['quantity'] <= $_POST['curstock']){
	  $date = new DateTime();
	  $disposal_params = array(":productID" => $_POST['productID'],
				   ":quantity" => sanitize($_POST['quantity']),
				   ":date" => $date->format('Y-m-d'),
				   ":reason" => sanitize($_POST['reason'])
				   );
	  require_once "../model/product.php";
	  $product = new Product();
	  $success = $product->disposeProduct($disposal_params);
	  if($success){
	    $msg = "dispose success!";
	      header("location: ../admin.php?option=manageproduct&msg={$msg}");
	  }else{
	    $msg = "dispose failed!";
	      header("location: ../admin.php?option=manageproduct&msg={$msg}");
	    
	  }
	  }else{
	  $msg = "Invalid Quantity!";
	  header("location: ../admin.php?option=manageproduct&msg={$msg}");

	  //invalid quantity
	}
      }
      
      }// Else
    }

private function commitSearchAction($target){

  if($target =="warranty"){
    require_once "../model/warranty.php";
    if(isset($_POST['serialNumber'])){
      $search = new Warranty();
      $info = $search->searchWarranty(sanitize($_POST['serialNumber']));
      if($info){
	header("location: ../cashier.php?option=productreplacement&info={$info}");
      }else{
	$msg = "Not Found!";
	header("location: ../cashier.php?option=warranty&msg={$msg}");
      }
    }
  }
}


    


    
}
  
  $commit = new Commit();
  
  if(count($_POST) > 0){
    $commit->commitAction(($_POST['action']), (($_POST['target'])));
  }else if(count($_GET) >0 ){
    $commit->commitAction(($_GET['action']), ($_GET['target']));
  }
  
?>