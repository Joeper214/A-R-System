<?php
require_once "../database/pdo/sanitizer.php";
require_once "../database/pdo/db_connect.php";

class Cart{
  protected $db_connect;
  protected $query;
  
  public function __construct(){
    $this->db_connector = new DBConnector();
    $this->db_connector->connect();
  }

  public function addToCart($params) {
    
      $this->query = "INSERT INTO cartdetail(productID,quantity,price,processStatus,accountID)
                     VALUES(:productID,:quantity,:price,:processStatus,:accountID);";
      try{
	print_r($params);
	$this->db_connector->insert($this->query,$params);
	return true;
      }catch(Exception $ex){
	//redirect to system error page
	return false;
      }
    //else
  }
  public function addWarranty($params){
    $this->query = "INSERT INTO warranty(selectedSerialID,purchaseDate,warrantyEnds,personID)
                   VALUES(:selectedSerial,:purchaseDate,:warrantyEnds,:personID)";
    try{
      print_r($params);
      $this->db_connector->insert($this->query,$params);
      return true;
    }catch(Exception $ex){
      //redirect to system error page
      return false;
    }
  }




  public function selectSerials($params){
    print_r($params);
    echo $this->query = "INSERT INTO selectedserial(cartDetailID,serialID)
           VALUES(?,?);";
    try{
      $this->db_connector->insert($this->query,$params);
      return true;
    }catch(Exception $ex){
      return false;
    }
    
  }
  public function addTransaction($params){

    echo $this->query = "INSERT INTO 
`transaction`(accountID,personID,transactionType,dateRecorded,amountDue) 
     VALUES(:accountID,:personID,:transType,:date,:amount)";
    try{
      print_r($params);
      $this->db_connector->insert($this->query,$params);
      return true;
    }catch(Exception $ex){
      return false;
    }
  }

public function addTransaction_tech($params){

  echo $this->query = "INSERT INTO 
`transaction`(accountID,personID,transactionType,dateRecorded,amountDue) 
     VALUES(?,?,?,?,?)";
  try{
    print_r($params);
    $this->db_connector->insert($this->query,$params);
    return true;
  }catch(Exception $ex){
    return false;
  }
}

  
  public function getWarranty($id){
    $this->query = "SELECT * FROM nonconsumable WHERE productID = $id";
    $row = $this->db_connector->selectAll($this->query);
    foreach($row as $warranty){
      return $warranty['warranty'];
    }
  }
  public function removeCart($id){

       $query = "DELETE from cartdetail
              WHERE cartDetailID=$id";
       if($this->db_connector->delete($query)){
	 return true;
       }else{
	 return false;
       }
  }
public function removeSelected($id){

       $query = "DELETE from selectedserial
              WHERE cartDetailID=?";
       if($this->db_connector->delete($query, array($id))){
	 return true;
       }else{
	 return false;
       }
  }

  public function changeQuantity($params){

    $query = "UPDATE cartdetail
              SET quantity=?
              WHERE cartDetailID=?";
    
    return $this->db_connector->update($query,$params);
  }


  public function is_addBrandExist($prodName){

    
    $this->query = "SELECT COUNT(*) FROM brand
                 WHERE brandName='{$prodName}'";

    return $this->db_connector->doesExist($this->query);
    
  }


  public function isSelected($params){

    
    $this->query = "SELECT COUNT(*) FROM selectedSerialID
                 WHERE cartDetailID=?
                 AND serialID=?";

    return $this->db_connector->doesExist($this->query,$params);
    
  }

  public function getSelectedSerials($id){
 
    $this->query = "SELECT * FROM selectedserial s, product p, serial a, nonconsumable n
                 WHERE s.cartDetailID=$id
                 AND a.serialID = s.serialID
                 AND p.productID = a.productID
                 AND p.productID = n.productID";

    return $this->db_connector->selectAll($this->query)->fetchAll();
    
  }
  
  

  public function newSelected($params){
    $this->query = "SELECT COUNT(*) FROM selectedSerialID
                 WHERE cartDetailID=?
                 AND serialID=?";

    return $this->db_connector->doesExist($this->query,$params);
    
  }
    
  public function getLatestCart(){

      $this->query = "SELECT max(cartDetailID)
                      FROM `cartdetail`";

      return $this->db_connector->selectAll($this->query)->fetchAll();
  }

    public function getLatest(){

      $this->query = "SELECT max(transactionID)
                      FROM `transaction`";

      return $this->db_connector->selectAll($this->query)->fetchAll();
  }
    public function setTransactionID($params){
      $query = "UPDATE cartdetail
              SET transactionID=?,
              processStatus=1
              WHERE cartDetailID=?";
      
      return $this->db_connector->update($query,$params);
    }


    public function setTrans_tech_id($params){
      $query = "UPDATE technical
              SET transactionID=?,
              techStatus=1
              WHERE technicalID=?";
      
      return $this->db_connector->update($query,$params);
    }


    public function updateStock($params){
      $query = "UPDATE product SET stock=? WHERE productID=?";
	return $this->db_connector->update($query,$params);
      
    }
}


?>