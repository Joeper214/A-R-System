<?php
require_once "database/pdo/sanitizer.php";
require_once "database/pdo/db_connect.php";

class Warranty{
  protected $db_connect;
  protected $query;
  
  public function __construct(){
    $this->db_connector = new DBConnector();
    $this->db_connector->connect();
  }
  public function searchWarranty($params){
    $this->query = "SELECT * from serial s, selectedserial a, 
                          warranty w, product b, person p,category cat,nonconsumable n
                     WHERE s.serialNumber = '$params'
                     AND s.serialID=a.serialID
                     AND w.selectedSerialID = a.selectedSerialID
                     AND p.personID=w.personID
                     AND b.productID=s.productID
                     AND cat.categoryID=b.categoryID
                     AND n.productID=b.productID
                     ";
      $row = $this->db_connector->selectAll($this->query);
      if($row){
	return $row->fetchAll();
      }else{
	return false;
      }
  }
  public function getAvailableSerial($id){
    $this->query = "SELECT * FROM serial WHERE productID=$id
                    AND serialStatus = 1
                    AND isTaken = 0";
    
    $row = $this->db_connector->selectAll($this->query);
    if($row){
      return $row->fetchAll();
    }else{
      return false;
    }
  }
  public function addCategory($params) {
    
      $this->query = "INSERT INTO category(categoryName,categoryDescription,categoryStatus)
                     VALUES(:categoryName,:categoryDesc,:categoryStatus);";
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
  public function addNonconsumable($productID, $model, $warranty){
    echo $productID;
    echo $model;
    echo $warranty;
    echo $this->query = "INSERT INTO nonconsumable(productID,model,warranty)
           VALUES($productID,'$model','$warranty');";
    try{
      $this->db_connector->insert($this->query);
      return true;
    }catch(Exception $ex){
      return false;
    }
    
  }



 public function updateNoncosumable($params){

       $query = "UPDATE nonconsumable
              SET model=?,
              warranty=?
              WHERE productID=?";
    
    return $this->db_connector->update($query, $params);
  }



 public function isCategoryExist($prodName,$id){

    
    $this->query = "SELECT COUNT(*) FROM category
                 WHERE categoryName='{$prodName}'
                 AND categoryID != $id";

    return $this->db_connector->doesExist($this->query);
    
  }
    
    public function getLatest(){

      $this->query = "SELECT max(productID)
                      FROM product";

      return $this->db_connector->selectAll($this->query)->fetchAll();
  }
}


?>