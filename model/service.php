<?php
require_once "../database/pdo/sanitizer.php";
require_once "../database/pdo/db_connect.php";

class Service{
  protected $db_connect;
  protected $query;
  
  public function __construct(){
    $this->db_connector = new DBConnector();
    $this->db_connector->connect();
  }

  public function addService($params) {
    
      $this->query = "INSERT INTO service(serviceName,serviceRate,
                  serviceStatus)
                     VALUES(:serviceName,:serviceRate,:serviceStatus);";
      try{
	print_r($params);
	$this->db_connector->insert($this->query,$params);
	return true;
      }catch(Exception $ex){
	//redirect to system error page
	return false;
      }
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

  public function addDevice($params){
    $this->query = "INSERT INTO device(deviceName,personID)
           VALUES(?,?);";
    try{
      $this->db_connector->insert($this->query,$params);
      return true;
    }catch(Exception $ex){
      return false;
    }
  }

  public function addTech_transaction($params){
    $this->query = "INSERT INTO technical(serviceID,deviceID,serviceRate,accountID,serviceDate)
                    VALUES(?,?,?,?,?);";
    try{
      $this->db_connector->insert($this->query,$params);
      return true;
    }catch(Exception $ex){
      return false;
    }
  }

  public function addNote($params){
    $this->query = "INSERT INTO note(device,problemCategory,problemDescription,
                    obviousIssues,quickSolution,gatheredData,evaluatedProblem,problemSolution,accountID)
                    VALUES(?,?,?,?,?,?,?,?,?);";
    try{
      $this->db_connector->insert($this->query,$params);
      return true;
    }catch(Exception $ex){
      return false;
    }
  }

  public function updateNote($params){

       $query = "UPDATE note
              SET device=?,problemCategory=?,problemDescription=?,
                 obviousIssues=?,quickSolution=?,gatheredData=?,
                 evaluatedProblem=?,problemSolution=?,accountID=? WHERE noteID=?";
    
    return $this->db_connector->update($query, $params);
  }
  public function updateService($params){

       $query = "UPDATE service
              SET serviceName=?,
              serviceRate=?
              WHERE serviceID=?";
    
    return $this->db_connector->update($query, $params);
  }
  

 public function updateNoncosumable($params){

       $query = "UPDATE nonconsumable
              SET model=?,
              warranty=?
              WHERE productID=?";
    
    return $this->db_connector->update($query, $params);
  }


 public function isServiceExist($prodName){

    
    $this->query = "SELECT COUNT(*) FROM service
                 WHERE serviceName= '{$prodName}'";

    return $this->db_connector->doesExist($this->query,$prodName);
    
  }
    
    public function getLatest(){

      $this->query = "SELECT max(productID)
                      FROM product";

      return $this->db_connector->selectAll($this->query)->fetchAll();
  }
}


?>