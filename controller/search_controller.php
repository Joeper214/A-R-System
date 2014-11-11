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
    }else{
      echo "No ACTION!";
    }
  }


