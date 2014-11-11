<?php
require_once "../database/pdo/sanitizer.php";
require_once "../database/pdo/db_connect.php";

class Brand{
  protected $db_connect;
  protected $query;
  
  public function __construct(){
    $this->db_connector = new DBConnector();
    $this->db_connector->connect();
  }

  public function addBrand($params,$brandName) {
    
      $this->query = "INSERT INTO brand(brandName,brandStatus)
                     VALUES(:brandName,:brandStatus);";
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


  public function updateBrand($params){

       $query = "UPDATE brand
              SET brandName=?
              WHERE brandID=?";
    
    return $this->db_connector->update($query, $params);
  }

 public function updateNoncosumable($params){

       $query = "UPDATE nonconsumable
              SET model=?,
              warranty=?
              WHERE productID=?";
    
    return $this->db_connector->update($query, $params);
  }


  public function is_addBrandExist($prodName){

    
    $this->query = "SELECT COUNT(*) FROM brand
                 WHERE brandName='{$prodName}'";

    return $this->db_connector->doesExist($this->query);
    
  }


  public function isBrandExist($prodName,$id){

    
    $this->query = "SELECT COUNT(*) FROM brand
                 WHERE brandName='{$prodName}'
                 AND brandID = $id";

    return $this->db_connector->doesExist($this->query);
    
  }
    
    public function getLatest(){

      $this->query = "SELECT max(productID)
                      FROM product";

      return $this->db_connector->selectAll($this->query)->fetchAll();
  }
}


?>