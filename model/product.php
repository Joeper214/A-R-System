<?php
require_once "../database/pdo/sanitizer.php";
require_once "../database/pdo/db_connect.php";

class Product{
  protected $db_connect;
  protected $query;
  
  public function __construct(){
    $this->db_connector = new DBConnector();
    $this->db_connector->connect();
  }

  public function addProduct($params,$prodName) {
    if($this->isProductExist($prodName)) {
      return false;
      }else{
      $this->query = "INSERT INTO product(productName,productType,
                  productDescription,categoryID,brandID,price,stock,productStatus)
                     VALUES(:productName,:productType,:description,
                            :categoryID,:brandID,:price,:stock,1);";
      try{
	print_r($params);
	$this->db_connector->insert($this->query,$params);
	return true;
      }catch(Exception $ex){
	//redirect to system error page
	return false;
      }
    }//else
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


  public function updateProduct($params){

       $query = "UPDATE product
              SET productName=?,
              productDescription=?,
              categoryID=?,
              brandID=?,
              price=?,
              stock=?
              WHERE productID=?";
    
    return $this->db_connector->update($query, $params);
  }

 public function updateNoncosumable($params){

       $query = "UPDATE nonconsumable
              SET model=?,
              warranty=?
              WHERE productID=?";
    
    return $this->db_connector->update($query, $params);
  }


  public function isProductExist($prodName){

    
    $this->query = "SELECT COUNT(*) FROM product
                 WHERE productName='{$prodName}'";

    return $this->db_connector->doesExist($this->query);
    
  }
    
    public function getLatest(){

      $this->query = "SELECT max(productID)
                      FROM product";

      return $this->db_connector->selectAll($this->query)->fetchAll();
  }
    public function disposeProduct($params){
      $this->query = "insert into disposed(productID,quantity,date,reason)
                      VALUES(:productID,:quantity,:date,:reason)";

      try{
	$this->db_connector->insert($this->query,$params);
	return true;
      }catch(Exception $ex){
	return false;
      }

    }
    public function addStock($params){
      $query = "UPDATE product
              SET stock=stock+?
              WHERE productID=?";
      
    return $this->db_connector->update($query, $params);
    }

    public function replaceSerial($params,$old){
      if($this->returnDefective($old)){
	$query = "UPDATE selectedserial
              SET serialID=?
              WHERE selectedSerialID=?";
	
	return $this->db_connector->update($query, $params);
      }else{
	return false;
      }
    }
    public function returnDefective($id){
      $query = "UPDATE serial SET serialStatus=2, 
                isTaken = 0 WHERE serialID=?";
      return $this->db_connector->update($query, array($id));
    }
    
  public function useSerial($id,$prodID){
    if($this->reflectStock($prodID)){
    $query = "UPDATE serial SET isTaken=2
              WHERE serialID=?";
      return $this->db_connector->update($query, array($id));
    }else{
      return false;
    }
  }

  public function reflectStock($pid){
    $query = "UPDATE product set stock=stock-1 WHERE productID=?";
    return $this->db_connector->update($query, array($pid));
    
  }
  public function insertReplaced($params){
    echo $this->query = "INSERT INTO serialreplace(serialNumber,selectedSerialID)
           VALUES(?,?);";
    try{
      $this->db_connector->insert($this->query,$params);
      return true;
    }catch(Exception $ex){
      return false;
    }
  }
  //public function 





}


?>