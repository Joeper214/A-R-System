<?php 

$month = null;
$year = null;
$ttype = null;
$transactions = null;
    $get = new GetModel();
if(isset($_POST['search'])){
  $key = $_POST['searchKey'];
  
  $personID = $get->searchCustomerID($key);

  if($personID){
    $transactions = $get->getTech_by_id($personID);
  }else{
    
  }


}else if(isset($_POST['sort'])){
  if($_POST['sortkey'] == 1){
    $transactions = $get->getTech_ord_name();
  }else if($_POST['sortkey'] == 3){
    $transactions = $get->getTech_ord_price();
  }
}else if(isset($_POST['bmonth'])||(isset($_GET['month']))||isset($_POST['month'])){
  if(isset($_POST['month'])){
    $month = $_POST['month'];
  }else if(isset($_GET['month'])){
    $month = $_GET['month'];
  }else{
    $month = 0;
  }
  
  if(isset($_POST['year'])){
    $year = $_POST['year'];  
  }else if(isset($_GET['year'])){
    $year = $_GET['year'];    
  }else{
    $year = 0;
  }

  if($month == 0){
      $transactions = $get->getOnlyTechtoday();
  }else{
    //echo $month." ".$year;
    $transactions = $get->browseby_month_tech($month,$year);
  }
}else{
      $transactions = $get->getOnlyTechtoday();
}

if($transactions){
    foreach($transactions as $transaction){
      //      print_r($transaction);
      $date = new DateTime($transaction['dateRecorded']);

      $amount = number_format($transaction['amountDue'], 2, '.', ',');

?>

     
		<tr>	
		   <td class='list' id='reportdate'><?php echo $date->format('F j, Y'); ?></td>
<td class='list salesreportscustomername'><?php echo $transaction['lname']." ,"
                                .$transaction['fname']; ?> </td>
							      <td class='list bold'><?php if($transaction['transactionType'] == 1){
	echo "Sales";
      }else{
	echo "Technical";
      }
							      ?></td>
			<td class='list salesreportsattendant'><?php 
			   $attendant = $get->getAttendant($transaction['accountID']);
                            echo $attendant;
                           ?></td>
			<td class='list transactionpayment'><?php 
			   echo $amount;
?>
			   </td>

		
		</tr>
		<tr>	
		    <?php }
    }else{ ?>
      <tr><td></td><td>No Transactions yet.</td></tr>
  <?php  }
 ?><!-- End list -->