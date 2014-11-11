<?php 
$access = new GetModel();
$personID = NULL;
$listEmployees = NULL;
$fname = NULL; $mname = NULL; $lname=NULL; $gender = NULL;
$bday = NULL;
$position = NULL;
$bPlace = NULL;
$contact = NULL;
$religion = NULL;
$address = NULL;
$employeeStatus = NULL;

if(isset($_GET['personID'])){
  $personID = $_GET['personID'];

  $listEmployees = $access -> getPersonInfo($personID);
  
  foreach($listEmployees as $employee){
    $fname = $employee['fname'];
    $mname = $employee['mname'];
    $lname = $employee['lname'];
    $gender = $employee['gender'];
    $bday = new DateTime ($employee['birthDate']);
    $bPlace = $employee['birthPlace'];
    $contact = $employee['contactNumber'];
    $religion = $employee['religion'];
    $employeeStatus = $employee['employmentStatus'];
    $position = $employee['position'];
    $address = $employee['address'];
    $photo = $employee['photo'];
  }
}

?>