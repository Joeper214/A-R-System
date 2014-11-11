<?php
require_once "../database/pdo/sanitizer.php";
require_once "../database/pdo/db_connect.php";

class Category{
  protected $db_connect;
  protected $query;
  
  public function __construct(){
    $this->db_connector = new DBConnector();
    $this->db_connector->connect();
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


  public function updateCategory($params){

       $query = "UPDATE category
              SET categoryName=?,
              categoryDescription=?
              WHERE categoryID=?";
    
    return $this->db_connector->update($query, $params);
  }

 public function updateNoncosumable($params){

       $query = "UPDATE nonconsumable
              SET model=?,
              warranty=?
              WHERE productID=?";
    
    return $this->db_connector->update($query, $params);
  }

public function is_addCategoryExist($prodName){

    
    $this->query = "SELECT COUNT(*) FROM category
                 WHERE categoryName='{$prodName}'";

    return $this->db_connector->doesExist($this->query);
    
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