<?php
	# Class Connect:
	Class ConnectModel {
	
	  public function connectToDatabase() {
		
			$host = 'localhost';
			$root = 'root';
			$pass = '';

			$connected = mysql_connect($host, $root, $pass);
	
			if($connected) {
				$selected = mysql_select_db("mysystem");
			}
		}
	}
	
	# Class Verify:
	Class VerifyModel {

        public function isUsernameValid($username) {
		
	  $query = mysql_query("SELECT * FROM account WHERE username = '$username'");
	  
	  if(mysql_num_rows($query) != 0) {
	    
	    return false;
	  } else {
			
	    return true;
	  }
	}
	
	public function isPasswordValid($password) {
	  
	  $query = mysql_query("SELECT * FROM account WHERE password = '$password'");
	  
	  if(mysql_num_rows($query) != 0) {
	    
	    return false;
			} else {
	    
	    return true;
	  }
	}

	public function isAddedToCart($p_id,$a_id){
	  $query = mysql_query("SELECT * FROM cartdetail
                                  WHERE productID = {$p_id}
                                  AND accountID = {$a_id}
                                  AND processStatus != 1
                                  ");
	      if(mysql_num_rows($query) != 0){
		return true;
	      }else{
		return false;
	      }
	    
	  }
	public function isSerialExist($serialNumber) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
			
			$query = mysql_query("SELECT * FROM serial 
WHERE serialNumber = '$serialNumber'");
			
			if(mysql_num_rows($query) != 0) {
				return false;
			} else {
				return true;
			}
			mysql_close();
		}	

	public function setLogin($id,$set){
	  $query = mysql_query("UPDATE account SET 
isLogin = '".mysql_real_escape_string($set)."' 
WHERE accountID = '$id'");
			if($query){
			  return true;
			}else{
			  return false;
			}
	  
	}



		public function verifyIfCategoryNameIsNotBeingUsed($categoryName) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
			
			$query = mysql_query("SELECT * FROM category WHERE categoryName = '$categoryName'");
			
			if(mysql_num_rows($query) != 0) {
				return false;
			} else {
				return true;
			}
			mysql_close();
		}
		
		public function verifyIfBrandNameIsNotBeingUsed($brandName) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
			
			$query = mysql_query("SELECT * FROM category WHERE categoryName = '$brandName'");
			
			if(mysql_num_rows($query) != 0) {
				return false;
			} else {
				return true;
			}
			mysql_close();
		}
		
		public function verifyIfProductNameIsNotBeingUsed($productName) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
			
			$query = mysql_query("SELECT * FROM product WHERE productName = '$productName'");
			
			if(mysql_num_rows($query) != 0) {
				return false;
			} else {
				return true;
			}
			mysql_close();
		}
		
		public function verify_if_password_is_not_being_used($password) {
		
			$query = mysql_query("SELECT * FROM account WHERE password = '$password'");
			
			if(mysql_num_rows($query) != 0) {
			
				return false;
			} else {
			
				return true;
			}
		}
		
		public function verify_if_username_is_not_being_used($username) {
		
			$query = mysql_query("SELECT * FROM account WHERE username = '$username'");
			
			if(mysql_num_rows($query) != 0) {
			
				return false;
			} else {
			
				return true;
			}
		}
	}
	
	# Class Insert:
	Class InsertModel {

public function insertSerial($serialNumber, $productID, $availability) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
			
			$query = mysql_query("INSERT INTO serial(productID, serialNumber, serialStatus)
								  VALUES('".mysql_real_escape_string($productID)."',
										 '".mysql_real_escape_string($serialNumber)."',
										 '".mysql_real_escape_string($availability)."')");
			if($query) {
				return true;
			} else {
				return false;
			}
			mysql_close();
		}




	
		public function insertIntoCategory($categoryName, $description, $categoryStatus) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
			
			$query = mysql_query("INSERT INTO category(categoryName, categoryDescription, categoryStatus)
								  VALUES('".mysql_real_escape_string($categoryName)."',
										 '".mysql_real_escape_string($description)."',
										 '".mysql_real_escape_string($categoryStatus)."')");
			if($query) {
				return true;
			} else {
				return false;
			}
			mysql_close();
		}
	
		public function insertIntoBrand($brandName) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
			
			$query = mysql_query("INSERT INTO brand(brand_name)
								  VALUES('".mysql_real_escape_string($brandName)."')");
			if($query) {
				return true;
			} else {
				return false;
			}
			mysql_close();
		}
		
		public function insertIntoProduct($productName, $price, $quantity, $model, $serial, $category_id, $brand_id, $availability) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
			
			$query = mysql_query("INSERT INTO product(product_name, price, quantity, model, serial_number, category_id, brand_id, availability)
								  VALUES('".mysql_real_escape_string($productName)."',
										 '".mysql_real_escape_string($price)."',
										 '".mysql_real_escape_string($quantity)."',
										 '".mysql_real_escape_string($model)."',
										 '".mysql_real_escape_string($serial)."',
										 '".mysql_real_escape_string($category_id)."',
										 '".mysql_real_escape_string($brand_id)."',
										 '".mysql_real_escape_string($availability)."')");
			if($query) {
				return true;
			} else {
				return false;
			}
			mysql_close();
		}
	}
	
	# Class Get:
	Class GetModel {
	  public function getNoteInfo($noteID){
	    $rs = NULL;
	    $query = mysql_query("SELECT * from note WHERE noteID={$noteID}");
	    while($row = mysql_fetch_assoc($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }
	  public function getTechnicals(){
	    $rs = NULL;
	    $query = mysql_query("SELECT *, sum(t.serviceRate) as subtotal from technical t, service s, device d, person p 
                      WHERE p.personID = d.personID 
                      AND t.serviceID = s.serviceID 
                      AND d.deviceID = t.deviceID 
                      AND techStatus = 0 GROUP BY p.personID ");

	    while($row = mysql_fetch_assoc($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }
	    
	

	  public function getServicesApplied($person,$account){
	    $rs = NULL;
	    $query = mysql_query("SELECT * from technical t, service s, device d,
                                  person p
                                 WHERE p.personID = {$person}
                                 AND t.accountID = {$account}
                                 AND p.personID = d.personID
                                 AND t.serviceID = s.serviceID
                                 AND d.deviceID = t.deviceID
                                 AND techStatus = 0
                                 ");


	    while($row = mysql_fetch_assoc($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }


	  public function getPaidServices($transID){
	    $rs = NULL;
	    $query = mysql_query("SELECT * from technical t, service s, device d,
                                  person p
                                 WHERE t.transactionID = $transID
                                 AND p.personID = d.personID
                                 AND t.serviceID = s.serviceID
                                 AND d.deviceID = t.deviceID
                                 AND techStatus = 1
                                 ");


	    while($row = mysql_fetch_assoc($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  

	  public function getDevices($id){
	    $rs = NULL;
	    $query = mysql_query("SELECT * from device WHERE personID=$id");

	    while ($row = mysql_fetch_assoc($query)){
	      $rs[] = $row;
	    }
	    if($rs){
	      return $rs;
	    }else{
	      return false;
	    }
	  }


	  public function isApplied($id,$service){
	    $rs = NULL;
	    $query = mysql_query("SELECT * from technical WHERE deviceID=$id 
                                 AND serviceID = $service");

	    while($rs = mysql_fetch_assoc($query)){
	      return $rs['serviceID'];
	    }
	  }

	  //get CartINfo by transactionID
	  public function getAllWarranty(){
	    $rs = NULL;
	    $query = mysql_query("SELECT * from warranty w, selectedserial s, serial a,person p
                                  WHERE w.selectedSerialID = s.selectedSerialID
                                  AND w.personID = p.personID
                                  AND s.serialID = a.serialID
                                 ");
	    while ($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  public function getWarranty_sort_serial(){
	    $rs = NULL;
	    $query = mysql_query("SELECT * from warranty w, selectedserial s, serial a,person p
                                  WHERE w.selectedSerialID = s.selectedSerialID
                                  AND w.personID = p.personID
                                  AND s.serialID = a.serialID
                                  ORDER BY a.serialNumber
                                 ");
	    while ($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  public function getWarranty_sort_status(){
	    $rs = NULL;
	    $query = mysql_query("SELECT * from warranty w, selectedserial s, serial a,person p
                                  WHERE w.selectedSerialID = s.selectedSerialID
                                  AND w.personID = p.personID
                                  AND s.serialID = a.serialID
                                  ORDER BY w.isVoid ASC
                                 ");
	    while ($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }


	  public function getWarranty_sort_pDate(){
	    $rs = NULL;
	    $query = mysql_query("SELECT * from warranty w, selectedserial s, serial a,person p
                                  WHERE w.selectedSerialID = s.selectedSerialID
                                  AND w.personID = p.personID
                                  AND s.serialID = a.serialID
                                  ORDER BY w.purchaseDate ASC
                                 ");
	    while ($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  public function getWarranty_fname($key){
	    $rs = NULL;
	    $query = mysql_query("SELECT * from warranty w, selectedserial s, serial a,person p
                                  WHERE p.fname LIKE '%$key%'
                                  AND w.selectedSerialID = s.selectedSerialID
                                  AND w.personID = p.personID
                                  AND s.serialID = a.serialID
                                 ");
	    while ($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  public function getWarranty_mname($key){
	    $rs = NULL;
	    $query = mysql_query("SELECT * from warranty w, selectedserial s, serial a,person p
                                  WHERE p.mname LIKE '%$key%'
                                  AND w.selectedSerialID = s.selectedSerialID
                                  AND w.personID = p.personID
                                  AND s.serialID = a.serialID
                                 ");
	    while ($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  public function getWarranty_lname($key){
	    $rs = NULL;
	    $query = mysql_query("SELECT * from warranty w, selectedserial s, serial a,person p
                                  WHERE p.lname LIKE '%$key%'
                                  AND w.selectedSerialID = s.selectedSerialID
                                  AND w.personID = p.personID
                                  AND s.serialID = a.serialID
                                 ");
	    while ($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }


	  public function getCart_by_id($id){
	     $query = mysql_query("SELECT *, (c.quantity*c.price) AS subtotal 
                     from cartdetail c, product p 
                     WHERE c.transactionID = $id
                     AND c.productID = p.productID");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return  $rs;
	  }
	  //Get transactions
	  public function getSalesTransactions(){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM `transaction` t, person p
                                  WHERE t.personID = p.personID
                                  ORDER BY dateRecorded
                                  ");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }
	  public function getTransaction_by_fname($key){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM `transaction` t, person p
                                  WHERE t.personID = p.personID
                                  AND p.fname LIKE '%$key%'
                                  ORDER BY dateRecorded
                                  ");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  public function getTech_by_fname($key){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM `transaction` t, person p
                                  WHERE t.personID = p.personID
                                  AND p.fname LIKE '%$key%'
                                  AND transactionType = 2
                                  ORDER BY dateRecorded
                                  ");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }
	  public function getTransaction_by_mname($key){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM `transaction` t, person p
                                  WHERE t.personID = p.personID
                                  AND p.mname LIKE '%$key%'
                                  ORDER BY dateRecorded
                                  ");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }
	  public function getTech_by_mname($key){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM `transaction` t, person p
                                  WHERE t.personID = p.personID
                                  AND p.mname LIKE '%$key%'
                                  AND transactionType = 2
                                  ORDER BY dateRecorded
                                  ");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }
	  public function getTransaction_by_lname($key){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM `transaction` t, person p
                                  WHERE t.personID = p.personID
                                  AND p.lname LIKE '%$key%'
                                  ORDER BY dateRecorded
                                  ");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }
	  public function getTech_by_lname($key){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM `transaction` t, person p
                                  WHERE t.personID = p.personID
                                  AND p.lname LIKE '%$key%'
                                  AND transactionType = 2
                                  ORDER BY dateRecorded
                                  ");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }
	  public function getTransaction_ord_name(){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM `transaction` t, person p
                                  WHERE t.personID = p.personID
                                  ORDER BY p.lname ASC
                                  ");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }
	  public function getTech_ord_name(){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM `transaction` t, person p
                                  WHERE t.personID = p.personID
                                  AND transactionType = 2
                                  ORDER BY p.lname ASC
                                  ");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  public function getTransaction_ord_type(){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM `transaction` t, person p
                                  WHERE t.personID = p.personID
                                  ORDER BY t.transactionType ASC
                                  ");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }
	  public function getTransaction_ord_price(){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM `transaction` t, person p
                                  WHERE t.personID = p.personID
                                  ORDER BY t.amountDue DESC
                                  ");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  public function getTech_ord_price(){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM `transaction` t, person p
                                  WHERE t.personID = p.personID
                                  AND transactionType = 2
                                  ORDER BY t.amountDue DESC
                                  ");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  public function getOnlySales(){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM `transaction` t, person p
                                  WHERE t.personID = p.personID
                                  AND t.transactionType=1
                                  ORDER BY dateRecorded
                                  ");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }
	  public function getOnlyTech(){
	    
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM `transaction` t, person p
                                  WHERE t.personID = p.personID
                                  AND t.transactionType=2
                                  ORDER BY dateRecorded
                                  ");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }


	  public function getTransInfo($id){
	    $query = mysql_query("SELECT * FROM `transaction` t, person p
                                  WHERE t.personID = p.personID
                                  AND transactionID = $id
                                  ");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  //get Selected serial
	  public function getSelSerial($serial,$id){
	    $query = mysql_query("SELECT * from selectedserial
                                  WHERE cartDetailID = $id
                                  AND serialID = $serial;
                                 ");
	    while($rs = mysql_fetch_assoc($query)){
	      return $rs['serialID'];
	    } 
	    
	  }
	  public function check_if_used($id){
	    $query = mysql_query("SELECT * from selectedserial
                                  WHERE serialID = $id");
	    while($rs = mysql_fetch_assoc($query)){
	      return $rs['serialID'];
	    }
	  }
	  public function getWarranty($id){
	    $query= mysql_query("SELECT * from nonconsumable WHERE productID=$id");
	    while($rs = mysql_fetch_assoc($query)){
	      return $rs['warranty'];
	    }
	  }

	  //List emplyoees
	  
	  public function getAllEmployees(){
           


	    $query = mysql_query("SELECT *
                 FROM account a,
                      employee e,
                      person p
                 WHERE e.employeeID = a.employeeID
                 AND   p.personID = e.personID
                 ORDER BY p.lname;");

	    while($row = mysql_fetch_array($query)) {
	      $rs[] = $row;
	    }
	    return $rs;

	  }
	  //List persons
	  public function getAllPerson(){
	    $query = mysql_query("SELECT *
                 FROM employee e,
                      person p
                 WHERE p.personID = e.personID
                 ORDER BY p.lname;");

	    while($row = mysql_fetch_array($query)) {
	      $rs[] = $row;
	    }
	    return $rs;
	  }
	  public function searchPerson_fname($key){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM person p, employee e 
WHERE p.personType=0 AND p.fname LIKE '%$key%' AND p.personID=e.personID");
	    
	    while($row = mysql_fetch_array($query)) {
	      $rs[] = $row;
	    }
	    return $rs;
	  }


	  public function searchPerson_mname($key){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM person p, employee e 
WHERE p.personType=0 AND p.mname LIKE '%$key%' AND p.personID=e.personID");
	    
	    while($row = mysql_fetch_array($query)) {
	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  public function searchPerson_lname($key){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM person p, employee e 
WHERE p.personType=0 AND p.lname LIKE '%$key%' AND p.personID=e.personID");
	    
	    while($row = mysql_fetch_array($query)) {
	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  
	  //Person Information
	  public function getPersonInfo($personID){
	    $query = mysql_query("SELECT * FROM employee e,
                                      person p
                                  WHERE e.personID = $personID
                                  AND p.personID = e.personID");
	    while ($row = mysql_fetch_array($query)){
      	      $rs[] = $row;
	    }
	    return $rs;
	  }
	  public function getCustomerInfo($personID){
	    $query = mysql_query("SELECT * FROM person
                                  WHERE personID = $personID
                                  AND personType=1");
	    while ($row = mysql_fetch_assoc($query)){
      	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  


	  //UserInformation 
	  public function getUserInfo_by_id($id){
	    $query = mysql_query("SELECT * FROM account a,
                                  employee e, person p
                                  WHERE a.accountID = $id
                                  AND e.employeeID = a.employeeID
                                  AND e.personID = p.personID");
	    while($row = mysql_fetch_array($query)){
	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  public function getAttendant($id){
	    $query = mysql_query("SELECT * FROM account a,
                                  employee e, person p
                                  WHERE a.accountID = $id
                                  AND e.employeeID = a.employeeID
                                  AND e.personID = p.personID");
	    while($row = mysql_fetch_assoc($query)){
	      return $rs = $row['lname'].", ".$row['fname']." ".$row['mname'];
	    }

	  }

	  public function getAccountInfo($id){
	    $rs = NULL;
	    $query = mysql_query("SELECT * FROM account a,
                                  employee e, person p
                                  WHERE a.accountID = $id
                                  AND e.employeeID = a.employeeID
                                  AND e.personID = p.personID");
	    while($row = mysql_fetch_assoc($query)){
	      $rs[]  = $row;
	    }
	    return $rs;
	  }

	  //CHeck if account exists
	  public function checkAccount($id){
	    $query = mysql_query("SELECT accountType FROM account
                                  WHERE employeeID='$id'");
	    while($rs = mysql_fetch_assoc($query)){
	      return $rs['accountType'];
	    }

	    }
	  public function checkAccounStatus($id){
	    $query = mysql_query("SELECT accountStatus FROM account
                                  WHERE employeeID='$id'");
	    while($rs = mysql_fetch_assoc($query)){
	      return $rs['accountStatus'];
	    }

	    }
	  //Check brand if exists
	  public function checkBrand($brandName){
	    $query = mysql_query("SELECT brandName from brand
                                  WHERE brandName=$brandName");
	    if($query){
	      return true;
	    }else{
	      return false;
	    }
	    
	  }

 //Check service if exists
	  public function checkService($serviceName){
	    $query = mysql_query("SELECT serviceName from service
                                  WHERE serviceName='{$serviceName}'");
	    if($query){
	      return true;
	    }else{
	      return false;
	    }
	    
	  }


	  //get Service Info
	  public function getServiceInfo($id){
	   $query = mysql_query("SELECT * FROM service
                                  WHERE serviceID = $id");
	    while ($row = mysql_fetch_array($query)){
      	      $rs[] = $row;
	    }
	    return $rs;
	  
	  }



	  //add person
	  public function addPerson($fname,$mname,$lname,$address,$contact){
	    $query = mysql_query("insert into person(
           fname,mname,lname,address,contactNumber)
                 VALUES(".$_POST['fname'].","
                         .$_POST['mname'].","
                         .$_POST['lname'].","
                         .$_POST['address'].","
                         .$_POST['number']."");
	  }
	  public function addEmployee($personID,$gender,$bday,$bplace,$religion,$position,$dateReg){
	    $query = mysql_query("insert into employee(
                     personID,employmentStatus,
                     gender,birthDate,birthPlace,
                     religion, position,dateRegistered
                     )
                     VALUES($personID,
                                       1,'"
                              .$gender."','"
                              .$bday."','"
                              .$bplace."','"
                              .$religion."','"
                              .$position."','"
                              .$dateReg."');");
	    if($query){
	      return true;
	    }else{
	      return false;
	    }
	  }

	  //Product Operations

	  public function getProductInfo($productID){
	    $query = mysql_query("SELECT * FROM product p,
                                   brand b, category c
                                   WHERE p.productID = $productID
                                   AND p.brandID = b.brandID
                                   AND p.categoryID = c.categoryID
                                   ");
	    while ($row = mysql_fetch_array($query)){
      	      $rs[] = $row;
	    }
	    return $rs;
	  }

	  //Get nonconsumableInfo
	  public function getnonconsumableInfo($productID){

	    $query = mysql_query("SELECT * FROM nonconsumable
                                   WHERE productID = {$productID}
                                   ");
	    while ($row = mysql_fetch_array($query)){
      	      $rs[] = $row;
	    }
	    
	    if(isset($rs)){
	    return $rs;	    
	    }else
	      return null;
	  }
	  //Get Serials
	  public function getSerials($productID){

	    $query = mysql_query("SELECT * FROM serial
                                   WHERE productID = {$productID}
                                   ");

	    while ($row = mysql_fetch_array($query)){
      	      $rs[] = $row;
	    }
	    if(isset($rs)){
	    return $rs;	    
	    }else
	      return null;
	  }



	   public function getAllUserInfo(){
	     //	    $query = mysql_query("SELECT ");
	   }


		public function getAdminIDByUsernameAndPassword($username, $password) {
		
			$query = mysql_query("SELECT * FROM account WHERE username = '$username' AND password = '$password'");
			
			while($row = mysql_fetch_assoc($query)) {
			
				return $row['accountID'];
			}
		}
	
		public function getPersonIDByEmployeeID($employeeID) {
		
			$query = mysql_query("SELECT * FROM employee WHERE employeeID = '$employeeID'");
			
			while($row = mysql_fetch_assoc($query)) {
			
				return $row['personID'];
			}
		}
	
		public function getPersonAttributes($option, $personID) {
		
			$query = mysql_query("SELECT * FROM person WHERE personID = '$personID'");
		
			while($row = mysql_fetch_assoc($query)) {
			
				switch($option) {
					case 1:
						return $row['fname'];
					break;
					
					case 2:
						return $row['mname'];
					break;
					
					case 3:
						return $row['lname'];
					break;
					
					case 9:
						return $row['address'];
					break;
					
					default:
						return $row['contactNumber'];
					break;
				}
			}
		}
	
		public function getEmployeeAttributes($option, $employeeID) {
		
			$query = mysql_query("SELECT * FROM employee WHERE employeeID = '$employeeID'");
		
			while($row = mysql_fetch_assoc($query)) {
			
				switch($option) {
					case 4:
						return $row['gender'];
					break;
					
					case 5:
						return $row['birthDate'];
					break;
					
					case 6:
						return $row['birthPlace'];
					break;
					
					case 7:
						return $row['religion'];
				case 10:
				  return $row['photo'];
				  break;
					
					default:
						return $row['position'];
					break;
				}
			}
		}
	
		public function get_account_id($username, $password) {
		
			$query = mysql_query("SELECT * FROM account WHERE username = '$username' AND password = '$password'");
			
			while($i = mysql_fetch_assoc($query)) {
			
				return $i['accountID'];
			}
		}
		
		




		public function get_user_id($accountID) {
		
			$query = mysql_query("SELECT * FROM account WHERE accountID = '$accountID'");
			
			while($row = mysql_fetch_assoc($query)) {
			
				return $row['employeeID'];
			}
		}
		
		public function getAccountAttribute($option, $accountID) {
		
			$query = mysql_query("SELECT * FROM account WHERE accountID = '$accountID'");
			
			while($row = mysql_fetch_assoc($query)) {
			
				switch($option) {
				
					case 1:
						return $row['username'];
					break;
					
					case 2:
					
						return $row['employeeID'];
					break;
					
					default:
						return $row['password'];
					break;
				}
			}
		}
		public function get_brand_id($brandName) {
		
			$query = mysql_query("SELECT * FROM brand WHERE brandName = '$brandName'");
			
			while($row = mysql_fetch_assoc($query)) {
			
				return $row['brandID'];
			}
		}
		
		public function get_category_id($categoryName) {
		
			$query = mysql_query("SELECT * FROM category WHERE categoryName = '$categoryName'");
			
			while($row = mysql_fetch_assoc($query)) {
			
				return $row['categoryID'];
			}
		}
		
		public function getCategoryName($categoryID) {
		
			$query = mysql_query("SELECT * FROM category WHERE categoryID = '$categoryID'");
			
			while($row = mysql_fetch_assoc($query)) {
			
				return $row['categoryName'];
			}
		}
		
		public function getBrandName($brandID) {
		
			$query = mysql_query("SELECT * FROM brand WHERE brandID = '$brandID'");
			
			while($row = mysql_fetch_assoc($query)) {
			
				return $row['brandName'];
			}
		}
	
		public function getCategoryAttributes($option, $categoryID) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
			
			$query = mysql_query("SELECT * FROM category WHERE categoryID = '$categoryID'");
			
			while($row = mysql_fetch_assoc($query)) {
			
				switch($option) {
				
					case 1:
						return $row['categoryName'];
					break;
					case 2:
						return $row['categoryDescription'];
					break;
				case 3:
				  return $row['categoryStatus'];
				  break;
					default:
						
					break;
				}
			}
			mysql_close();
		}
	
		public function getBrandInfo($option, $brandID) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
			
			$query = mysql_query("SELECT * FROM brand WHERE brandID = '$brandID'");
			
			while($row = mysql_fetch_assoc($query)) {
			
				switch($option) {
				
					case 1:
						return $row['brandName'];
					break;
					default:
						return $row['brandStatus'];
					break;
				}
			}
			mysql_close();
		}
		
		public function getProductAttributes($option, $productID) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
			
			$query = mysql_query("SELECT * FROM product WHERE productID = '$productID'");
			
			while($row = mysql_fetch_assoc($query)) {
			
				switch($option) {
				
					case 1:
						return $row['productName'];
					break;
					case 2:
						return $row['price'];
					break;
					case 3:
						return $row['quantity'];
					break;
					case 4:
						return $row['model'];
					break;
					case 5:
						return $row['serialNumber'];
					break;
					case 6:
						return $row['categoryID'];
					break;
					case 7:
						return $row['brandID'];
					break;
					default:
						return $row['productStatus'];
					break;
				}
			}
			mysql_close();
		}
	}
	
	# Class Update:
	Class UpdateModel {

	  public function setLogin($id,$set){
	    $query = mysql_query("UPDATE account SET 
isLogin = '".mysql_real_escape_string($set)."' 
WHERE accountID = '$id'");
	    if($query){
	      return true;
	    }else{
	      return false;
	    }
	    
	  }
	  
//employee photo

	  private function uploadAttachment(){
				  require_once  "model/file_upload_download.php";
				  $base_dir = "images/photos/";
				  $fud = new FileUploadDownload();

				  if($fud->isValidFileType('f_attach')){
				$fud->uploadFile($base_dir, 'f_attach');
				return true;
				  }else{
				return false;
				  }
		}


	  public function updateEmployeePhoto($employeeID) {
	    
	    $goTo = new ConnectModel();
	    $goTo -> connectToDatabase();
			 if($this->uploadAttachment()){
			   $file_info  = pathinfo($_FILES["f_attach"]["name"]);
			   $params = $_FILES["f_attach"]["name"];
			   print_r($params);
			   $query = mysql_query("UPDATE employee SET photo = '".mysql_real_escape_string($params)."' WHERE employeeID = '$employeeID'");
			   
			   if($query) {
						return true;
			   }else{
			     return false;
			   }
			 }else{
			   return false;
			 }
			 mysql_close();
	  }


	  public function editPerson($fname,$mname,$lname,$address,$number,$personID){
	    
	    
	    $query = mysql_query("update person SET 
                      fname ='".$fname."',
                      mname ='".$mname."',
                      lname ='".$lname."',
                      address ='".$address."',
                      contactNumber ='".$number."'
                WHERE personID= ".$personID."
                      ");
	    if($query){
	      return true;
	    }else{
	      return false;
	    }

	  }	
  public function editEmployee($gender,$da,$bPlace,$religion,$pos,$personID){
            $bday = new DateTime($da);;
           	    
	    $query = mysql_query("update employee SET 
                      gender ='".$gender."',
                      birthDate= '".$bday->format('Y-m-d')."',
                      birthPlace ='".$bPlace."',
                      religion ='".$religion."',
                      position ='".$pos."'
                WHERE personID= ".$personID."
                      ");
	    if($query){
	      return true;
	    }else{
	      return false;
	    }
			mysql_close();
	  }	
  public function updateAccountStatus($id,$stat){
			$query = mysql_query("UPDATE employee SET 
employmentStatus = '".mysql_real_escape_string($stat)."' 
WHERE employeeID = '$id'");
			if($query){
			  return true;
			}else{
			  return false;
			}
    
  }


public function updateUserStatus($id,$stat){
			$query = mysql_query("UPDATE account SET 
accountStatus = '".mysql_real_escape_string($stat)."' 
WHERE employeeID = '$id'");
			if($query){
			  return true;
			}else{
			  return false;
			}
    
  }





  
public function updateStock($productID){
  $query = mysql_query("UPDATE product SET stock=stock+1
                        WHERE productID = {$productID}");
  
  if($query){
			  return true;
			}else{
			  return false;
			}
}


public function updateSerial($old,$new){
  $query = mysql_query("UPDATE serial SET serialNumber='$new',
                        serialStatus = 1, isTaken = 0
                        WHERE serialNumber = '{$old}'");
  
  if($query){
			  return true;
			}else{
			  return false;
			}
}




  //service update
public function updateService($id,$newName,$rate){
    $query = mysql_query("UPDATE service SET 
serviceName = '".mysql_real_escape_string($newName)."',
serviceRate = '$rate' 
WHERE serviceID = '$id'");
    if($query){
      return true;
    }else{
      return false;
    }
    
  }

  //servicebrand update

public function updateBrandName($id,$newName){
    $query = mysql_query("UPDATE brand SET 
brandName = '".mysql_real_escape_string($newName)."' 
WHERE brandID = '$id'");
    if($query){
      return true;
    }else{
      return false;
    }
    
  }



		public function updateCategory($categoryId, $categoryName, $description) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
			
			$query = mysql_query("UPDATE category SET category_name = '".mysql_real_escape_string($categoryName)."',
													  category_description = '".mysql_real_escape_string($description)."' WHERE category_id = '$categoryId'");
			
			if($query) {
				return true;
			}
			mysql_close();
		}
		
		public function updateCategoryAvailability($categoryID, $categoryStatus) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
		
			$query = mysql_query("UPDATE category SET categoryStatus = '".mysql_real_escape_string($categoryStatus)."' WHERE categoryID = '$categoryID'");
			
			if($query) {
				return true;
			}
			mysql_close();
		}
		
		public function updateBrandStatus($brandID, $brandStatus) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
		
			$query = mysql_query("UPDATE brand SET brandStatus = '".mysql_real_escape_string($brandStatus)."' WHERE brandID = '$brandID'");
			
			if($query) {
				return true;
			}
			mysql_close();
		}
		
		public function update_non_consumable($productID, $productName, $productDescription,$categoryID,$brandID,$price) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
			
	$query = mysql_query("UPDATE product SET 

productName = '".mysql_real_escape_string($productName)."',
productDescription = '".mysql_real_escape_string($productDescription)."',
categoryID = '".mysql_real_escape_string($quantity)."',
brandID = '".mysql_real_escape_string($brandID)."',
price = '".mysql_real_escape_string($price)."',
WHERE productID = '$productID'");
			
			if($query) {
				return true;
			}
			mysql_close();
		}


		public function editnonconsumable($productID, $model,$warranty) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
			
	$query = mysql_query("UPDATE nonconsumable SET 

model = '".mysql_real_escape_string($model)."',
warranty = '".mysql_real_escape_string($warranty)."',
WHERE productID = '$productID'");
			
			if($query) {
				return true;
			}
			mysql_close();
		}







		public function updateconsumable($productID, $productName, $productDescription,$categoryID,$brandID,$price,$stock) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
			
	$query = mysql_query("UPDATE product SET 

productName = '".mysql_real_escape_string($productName)."',
productDescription = '".mysql_real_escape_string($productDescription)."',
categoryID = '".mysql_real_escape_string($categoryID)."',
brandID = '".mysql_real_escape_string($brandID)."',
price = '".mysql_real_escape_string($price)."',
stock = '".mysql_real_escape_string($stock)."',
WHERE product_id = '$productID'");
			
			if($query) {
				return true;
			}
			mysql_close();
		}







		
	       public function updateProductAvailability($productId, $availability) {
		
			$goTo = new ConnectModel();
			$goTo -> connectToDatabase();
		
			$query = mysql_query("UPDATE product SET productStatus = '".mysql_real_escape_string($availability)."' WHERE productID = '$productId'");
			
			if($query) {
				return true;
			}
			mysql_close();
	       }

	       public function updateSerialAvailability($serialID, $productID, $availability) {
		 
		 $goTo = new ConnectModel();
		 $goTo -> connectToDatabase();
		 
		 $query = mysql_query("UPDATE serial SET serialStatus = 
'".mysql_real_escape_string($availability)."' WHERE serialID = '$serialID'");
		 if($availability == 1){//Add Stock
		   $addquery = mysql_query("UPDATE product SET stock=stock+1
                                         WHERE productID = $productID");
		 }else{//Remove Stock
		   $remquery = mysql_query("UPDATE product SET stock=stock-1
                                         WHERE productID = $productID");
		 }

		 if($query) {
		   return true;
		 }
		 mysql_close();
	       }
	


	       public function updateServiceAvailability($serviceId, $availability) {
		 
		 $goTo = new ConnectModel();
		 $goTo -> connectToDatabase();
		 
		 $query = mysql_query("UPDATE service SET serviceStatus = 
'".mysql_real_escape_string($availability)."' WHERE serviceID = '$serviceId'");

		 if($query) {
		   return true;
		 }
		 mysql_close();
	       }

	       public function deleteService($id){
		 $goTo = new ConnectModel();
		 $goTo -> connectToDatabase();
		 
		 $query = mysql_query("DELETE FROM technical WHERE technicalID = '$id'");
		 
		 if($query) {
		   return true;
		 }
		 mysql_close();
	       }
	       public function removeCart($id){
		 $goTo = new ConnectModel();
		 $goTo -> connectToDatabase();
		 
		 $query = mysql_query("DELETE FROM cartdetail WHERE cartDetailID = '$id'");
		 
		 if($query) {
		   return true;
		 }
		 mysql_close();
	       }

	}





?>