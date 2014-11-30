
<?php
$listEmployees = NULL;
$access = new GetModel();

if(isset($_POST['search'])){
  $key = $_POST['searchKey'];
  $personID = $access -> searchPersonID($key);
     if($personID){
       $listEmployees = $access -> getPersonby_id($personID);
     }
  
}else if(isset($_POST['sort'])){
  $key = $_POST['sortkey'];
     $listEmployees = $access -> sortPerson($key);
  
}
else{
  $listEmployees = $access -> getAllPerson();
}

if($listEmployees){
?>
          <?php foreach($listEmployees as $employee) 
  //  echo $employee['employeeID'];
{?>



<tr class='trlist'>	
    
	<td class='list' id='employeename'><?php echo $employee['lname'].', '.$employee['fname'].' '.$employee['mname']; ?></td>
	<td class='list'>
 <?php 
 $personID = $employee['personID'];
 $empID = $access -> checkAccount($employee['employeeID']);

 $accountID = $employee['employeeID'];
 
       if($empID == 1){
         echo 'Admin';
       }else if($empID == 2){
	 echo 'Cashier';
       }else if($empID == 3){
	 echo 'Techinician';
       }
       else{
	 if($employee['position'] == 'Utility'){
	   echo $employee['position'];
	     }else{
         echo "   <a class='createaccount' href='admin.php?option=createaccount&personID=$personID'><em>
               Create
             </em></a>";
	 }
       }
 ?>
</td>
     <?php 
     $acctStatus = $access->checkAccounStatus($employee['employeeID']);
     ?>
       <td class='list'>
	  <a <?php 
	  if($acctStatus == 1){
	    echo "class='enabled' onclick='javascript:disableUser({$accountID})' href='#' ><em>Enabled</em></a>";
	    
	  }else if($acctStatus == 2){
	    echo "class='disabled' onclick='javascript:enableUser({$accountID})' href='#' ><em>Disabled</em></a>";
	  }else if($acctStatus == 3){
	    echo "> Unemployed " ;
	  }else{
	    echo "> No account" ;
	  }
       ?>

       </td>
 	<td class='list'><a class='edit' href="admin.php?option=editEmployee&personID=<?php echo $personID?>"><em>Edit</em></a></td>
	<td class='list'><a class='view' href='admin.php?option=viewEmployee&personID=<?php echo $personID?>'><em>View</em></a></td>

<td class='list'><a <?php  
if($employee['employmentStatus'] == 1){ 
 echo "class='enabled'   onclick='javascript:disableEmployee({$accountID})'  "; 
             }
else{
 echo  "class='disabled'   onclick='javascript:enableEmployee({$accountID})'  ";
 }
                             ?>
 ><em></em></a></td>



     <?php }}else{
  echo "<h3 style='color:red'> not Found! </h3>";
} ?>
</tr>