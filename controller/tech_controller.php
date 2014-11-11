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

  public function commitAddAction($target){
    if($target == "customer"){
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
	  //$msg = " {$_POST['lname']} Already Exists!";
	  require_once "../model/service.php";
	  $device = new Service();
	  $device_params = array(sanitize($_POST['device']),$personID);
	  $add = $device->addDevice($device_params);
	  if($add){
	    echo $msg = "customer already exists and device add success!";
	      header("Location: ../technician.php?option=customerrepair&id={$msg}&id={$personID}");
	  }else{
	    echo $msg = "customer already exists  but device add failed!";
	      header("Location: ../technician.php?option=customerrepair&msg={$msg}&id={$personID}");
	  }
	}else{
	  $success = $account->addPerson($person_params);
	  $row = $account->getLatest();
	  foreach($row as $ID){
	    $personID = $ID['max(personID)'];
	  }
	  if($success&&$personID){
	    require_once "../model/service.php";
	    $device = new Service();
	    $device_params = array(sanitize($_POST['device']),$personID);
	    $add = $device->addDevice($device_params);
	    if($add){
	      echo $msg = "customer and device add success!";
	      header("Location: ../technician.php?option=customerrepair&id={$msg}&id={$personID}");
	    }else{
	      echo $msg = "customer add success but device add failed!";
	      header("Location: ../technician.php?option=customerrepair&id={$msg}&id={$personID}");
	    }
	  }
	
	}
    }else if($target == "device"){
      if(isset($_POST['personID'])){
	    require_once "../model/service.php";
	    $device = new Service();
	    $device_params = array(sanitize($_POST['device']),$_POST['personID']);
	    $add = $device->addDevice($device_params);
	    if($add){
	      echo $msg = "device add success!";
	      header("Location: ../technician.php?option=customerrepair&id={$msg}&id={$_POST['personID']}");
	    }else{
	      echo $msg = "device add failed!";
	      header("Location: ../technician.php?option=customerrepair&id={$msg}&id={$_POST['personID']}");
	    }
      }
    }else if($target == "technical"){
      if(isset($_POST['devices'])){
	require_once "../model/service.php";
	$trans = new Service();
	$devices = $_POST['devices'];
	foreach($devices as $device){
	  $date = new DateTime();
	  
	  $tech_params = array($_POST['serviceID'],
			       $device,
			       $_POST['serviceRate'],
			       $_POST['accountID'],
			       $date->format('Y-m-d'));
	  print_r($tech_params);
	 echo  $isAdded = $trans->addTech_transaction($tech_params);
	}
	if($isAdded){
	  //Success
	  echo $msg = "Service added successfully";
	  header("Location: ../technician.php?option=customerrepair&msg={$msg}");
	}else{
	  //Error
	  echo $msg = "Service add fail";
	  header("Location: ../technician.php?option=customerrepair");
	}
	//	header("Location: ../technician.php?option=customerrepair");
      }else{
      echo $msg = "Please select a device";
      header("Location: ../technician.php?option=customerrepair&msg={$msg}");
      }
    }else if($target == "note"){
      require_once "../model/service.php";
      $notes = new Service();
      $notes_params = array($_POST['device'],$_POST['prob'],
		       $_POST['probdesc'],$_POST['obissues'],
		       $_POST['quicksolution'],$_POST['gatdata'],
			    $_POST['evaluation'],$_POST['probsol'],$_POST['accountID']);
      
      $addNote = $notes->addNote($notes_params);
      if($addNote){
	echo $msg = "Add Success!";
	header("Location: ../technician.php?option=managenote&msg={$msg}");
      }else{
	echo $msg = "Add Failed!";
	header("Location: ../technician.php?option=managenote&msg={$msg}");
      }
    }//else
  }public function commitEditAction($target){
      require_once "../model/service.php";
      $notes = new Service();
      $notes_params = array($_POST['device'],$_POST['prob'],
		       $_POST['probdesc'],$_POST['obissues'],
		       $_POST['quicksolution'],$_POST['gatdata'],
			    $_POST['evaluation'],$_POST['probsol'],$_POST['accountID'],$_POST['noteID']);
      
      $addNote = $notes->updateNote($notes_params);
      if($addNote){
	echo $msg = "Edit Success!";
	header("Location: ../technician.php?option=managenote&msg={$msg}");
      }else{
	echo $msg = "Edit Failed!";
	header("Location: ../technician.php?option=managenote&msg={$msg}");
      }
    }//else
}

  $commit = new Commit();
  
  if(count($_POST) > 0){
    $commit->commitAction(($_POST['action']), (($_POST['target'])));
  }else if(count($_GET) >0 ){
    $commit->commitAction(($_GET['action']), ($_GET['target']));
  }


