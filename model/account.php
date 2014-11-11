<?php
require_once "../database/pdo/sanitizer.php";
require_once "../database/pdo/db_connect.php";

class Account{
  protected $db_connect;
  protected $query;
  
  public function __construct(){
    $this->db_connector = new DBConnector();
    $this->db_connector->connect();
  }
  
  public function addPerson($params) {
    /*if($this->isPersonExist($names)) {
      return false;
      }else{*/
      echo $this->query = "INSERT INTO person(fname,mname,lname,address,contactNumber,personType)
                     VALUES(:fname,:mname,:lname,:address,:number,:type);";
      try{
	print_r($params);
	$this->db_connector->insert($this->query,$params);
	return true;
      }catch(Exception $ex){
	//redirect to system error page
	return false;
      }
  }
  
  public function addEmployee($params){
    if($this->uploadAttachment()){
      $file_info  = pathinfo($_FILES["f_attach"]["name"]);
	$params[":im"] = $_FILES["f_attach"]["name"];
      print_r($params);
      $this->query = "INSERT INTO employee(personID,
gender,birthDate,
birthPlace,religion,
dateRegistered,position,
photo)
                     VALUES(:personID,:gender,:bday,:birthPlace,:religion,:dateReg,:position,:im);";
      try{
	print_r($params);
	$this->db_connector->insert($this->query,$params);
	return true;
      }catch(Exception $ex){
	//redirect to system error page
	return false;
      }
    }else{
      return false;
    }
  }

  public function editPerson($params){
   $query = "UPDATE person
             SET fname=?,
             mname=?,
             lname=?,
             address=?,
             contactNumber=?
             WHERE personID=?";
   return $this->db_connector->update($query,$params);
  }

  public function updateEmployee($params){
    if($this->uploadAttachment()){
      $file_info  = pathinfo($_FILES["f_attach"]["name"]);
      $params[":img"] = $_FILES["f_attach"]["name"];
    $query = "UPDATE employee
              SET gender =:gender,
              birthDate = :bday,
              birthPlace =:birthPlace,
              religion =:religion,
              dateRegistered=:dateReg,
              position=:position,
              photo = :img
              WHERE personID=:personID";

    return $this->db_connector->update($query,$params);

      }else{
      return false;
    }
    
  }

  public function isPersonExist($params){
    $fname = $params['fname'];
    $mname = $params['mname'];
    $lname = $params['lname'];

    
    $this->query = "SELECT COUNT(*) FROM person
                 WHERE fname='{$fname}' 
                 AND mname='{$mname}'
                 AND lname='{$lname}'";

    return $this->db_connector->doesExist($this->query);
    
  }
public function checkPerson_getID($params){
    $fname = $params['fname'];
    $mname = $params['mname'];
    $lname = $params['lname'];

    
    $this->query = "SELECT * FROM person
                 WHERE fname='{$fname}' 
                 AND mname='{$mname}'
                 AND lname='{$lname}'";

    $row = $this->db_connector->selectAll($this->query);
    foreach($row as $person){
      return $person['personID'];
    }
    
  }
    
    public function getLatest(){

      $this->query = "SELECT max(personID)
                      FROM person";

      return $this->db_connector->selectAll($this->query)->fetchAll();
  }
    private function uploadAttachment(){
      require_once  "../model/file_upload_download.php";
      $base_dir = "../images/photos/";
      $fud = new FileUploadDownload();

      if($fud->isValidFileType('f_attach')){
	$fud->uploadFile($base_dir, 'f_attach');
	return true;
      }else{
	return false;
      }
    }
}






?>